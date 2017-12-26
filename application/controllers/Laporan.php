<?php

/**
 * @property M_outlet m_outlet
 * @property MY_Input input
 * @property M_transaksi_m m_transaksi_m
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
