<?php

/**
 * @property M_outlet m_outlet
 * @property MY_Input input
 * @property M_transaksi_m m_transaksi_m
 * @property M_pengeluaran m_pengeluaran
 */
class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            redirect(base_url("Login"));
        }
    }

    function index()
    {

    }

    function penjualan_perhari()
    {
        $this->load->model('m_outlet');
        $this->m_outlet->find(function (CI_DB_query_builder $db) { $db->select(); });
        $outlets = [];
        $reports = [];
        foreach ($this->m_outlet->getResult()->result_array() as $outlet)
        {
            $outlets["o_{$outlet['id_outlet']}"] = $outlet;
        }

        $rFrom   = $this->input->getOrDefault('from', null);
        $rTo     = $this->input->getOrDefault('to', null);
        $rOutlet = $this->input->getOrDefault('outlet', 0);
        if ((!is_null($rFrom) && !is_null($rTo) && ($rOutlet >= 0)))
        {
            $this->load->model('m_transaksi_m');
            $this->m_transaksi_m->find(function (CI_DB_query_builder $db) use ($rOutlet, $rTo, $rFrom) {
                $db->select("COUNT(`id_tm`) AS 'transaksi', DATE(`tanggal`) AS 'tanggal', SUM(`grand_total`) AS 'grand_total', `id_outlet`");
                $db->where('DATE(`tanggal`) >=', $rFrom);
                $db->where('DATE(`tanggal`) <=', $rTo);
                if ($rOutlet > 0)
                {
                    $db->where('`id_outlet`', $rOutlet);
                }
                $db->group_by('DATE(`tanggal`)');
                $db->group_by('`id_outlet`');
                $db->order_by('DATE(`tanggal`)', 'ASC');
                $db->order_by('`id_outlet`', 'ASC');
            });

            foreach ($this->m_transaksi_m->getResult()->result_array() as $report)
            {
                $reports["t_{$report['tanggal']}"]["o_${report['id_outlet']}"] = $report;
            }
        }
        $this->load->view('v_lpHarian', compact('outlets', 'reports', 'rFrom', 'rTo', 'rOutlet'));
    }

    function penjualan_omset_bulanan()
    {
        $this->load->model('m_outlet');
        $this->m_outlet->find(function (CI_DB_query_builder $db) { $db->select(); });
        $outlets = [];
        $reports = [];
        foreach ($this->m_outlet->getResult()->result_array() as $outlet)
        {
            $outlets["o_{$outlet['id_outlet']}"] = $outlet;
        }

        $rMonth = $this->input->getOrDefault('month', null);
        if (!is_null($rMonth))
        {
            $this->load->model(['m_transaksi_m', 'm_pengeluaran']);
            $this->m_transaksi_m->find(function (CI_DB_query_builder $db) use ($rMonth) {
                $db->select("YEAR(`tanggal`) AS 'tahun', MONTH(`tanggal`) AS 'bulan', `id_outlet`, SUM(`grand_total`) AS 'pemasukan'");
                if ($rMonth > 0)
                {
                    $db->where('MONTH(`tanggal`)', $rMonth);
                }
                $db->group_by('YEAR(`tanggal`)');
                $db->group_by('MONTH(`tanggal`)');
                $db->group_by('`id_outlet`');
                $db->order_by('YEAR(`tanggal`)', 'ASC');
                $db->order_by('MONTH(`tanggal`)', 'ASC');
                $db->order_by('`id_outlet`', 'ASC');
            });

            foreach ($this->m_transaksi_m->getResult()->result_array() as $report)
            {
                $reports["y_{$report['tahun']}"]["m_{$report['bulan']}"]["o_${report['id_outlet']}"] = $report;
            }

            $this->m_pengeluaran->find(function (CI_DB_query_builder $db) use ($rMonth) {
                $db->select("YEAR(`tgl_pengeluaran`) AS 'tahun', MONTH(`tgl_pengeluaran`) AS 'bulan', `id_outlet`, SUM(`jumlah`) AS 'pengeluaran'");
                if ($rMonth > 0)
                {
                    $db->where('MONTH(`tgl_pengeluaran`)', $rMonth);
                }
                $db->group_by('YEAR(`tgl_pengeluaran`)');
                $db->group_by('MONTH(`tgl_pengeluaran`)');
                $db->group_by('`id_outlet`');
                $db->order_by('YEAR(`tgl_pengeluaran`)', 'ASC');
                $db->order_by('MONTH(`tgl_pengeluaran`)', 'ASC');
                $db->order_by('`id_outlet`', 'ASC');
            });

            foreach ($this->m_pengeluaran->getResult()->result_array() as $report)
            {
                $reports["y_{$report['tahun']}"]["m_{$report['bulan']}"]["o_${report['id_outlet']}"] = array_merge(isset($reports["y_{$report['tahun']}"]["m_{$report['bulan']}"]["o_${report['id_outlet']}"]) ? $reports["y_{$report['tahun']}"]["m_{$report['bulan']}"]["o_${report['id_outlet']}"] : [], $report);
            }
        }

        function __comp($v1, $v2)
        {
            $a = intval(substr($v1, -(strlen($v1) - 2)));
            $b = intval(substr($v2, -(strlen($v2) - 2)));
            if ($a == $b)
            {
                return 0;
            }

            return $a < $b ? -1 : 1;
        }

        uksort($reports, "__comp");
        foreach ($reports as &$r1)
        {
            uksort($r1, "__comp");
            foreach ($r1 as &$r2)
            {
                uksort($r2, "__comp");
            }
        }

        $this->load->view('v_lpOmset', compact('outlets', 'reports', 'rMonth'));
    }

    function laporanPerbulan()
    {
        $this->load->view('v_laporanPerbulan');
    }

    function laporanUang()
    {
        $this->load->view('v_laporanUang');
    }

    function produkPopuler()
    {
        $this->load->view('v_produkPopuler');
    }
}
