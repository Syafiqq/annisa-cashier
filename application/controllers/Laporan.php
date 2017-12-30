<?php

/**
 * @property M_outlet m_outlet
 * @property MY_Input input
 * @property M_transaksi_m m_transaksi_m
 * @property M_pengeluaran m_pengeluaran
 * @property M_user m_user
 * @property M_transaksi_d m_transaksi_d
 * @property M_produk m_produk
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

    function penjualan_transaksi()
    {
        $this->load->model('m_outlet');
        $this->m_outlet->find(function (CI_DB_query_builder $db) { $db->select(); });
        $outlets  = [];
        $reports  = [];
        $products = [];
        foreach ($this->m_outlet->getResult()->result_array() as $outlet)
        {
            $outlets["o_{$outlet['id_outlet']}"] = $outlet;
        }

        $rDate   = $this->input->getOrDefault('tanggal', null);
        $rOutlet = $this->input->getOrDefault('outlet', 0);
        if ((!is_null($rDate) && ($rOutlet > 0)))
        {
            $this->load->model(['m_user', 'm_transaksi_m', 'm_transaksi_d', 'm_produk']);
            $this->m_produk->find(function (CI_DB_query_builder $db) { $db->select(); });
            foreach ($this->m_produk->getResult()->result_array() as $product)
            {
                $products["p_{$product['id_produk']}"] = $product;
            }

            $this->m_user->find(function (CI_DB_query_builder $db) use ($rOutlet) {
                $db->select('`id_user`, `nama`');
                $db->where('`id_outlet`', $rOutlet);
                $db->where('`level`', 'kasir');
            });

            foreach ($_users = $this->m_user->getResult()->result_array() as $_user)
            {
                $this->m_transaksi_m->find(function (CI_DB_query_builder $db) use ($rDate, $_user, $rOutlet) {
                    $db->select('`id_tm`, `tanggal`, `grand_total`');
                    $db->where('`id_outlet`', $rOutlet);
                    $db->where('`id_user`', $_user['id_user']);
                    $db->where('DATE(`tanggal`)', $rDate);
                    $db->order_by('`tanggal`', 'ASC');
                });

                foreach ($_transaksi_ms = $this->m_transaksi_m->getResult()->result_array() as $_transaksi_m)
                {
                    $this->m_transaksi_d->find(function (CI_DB_query_builder $db) use ($_transaksi_m) {
                        $db->select('`id_td`, `id_produk`, `jumlah`, `total`');
                        $db->where('`id_tm`', $_transaksi_m['id_tm']);
                        $db->order_by('`id_produk`', 'ASC');
                    });

                    foreach ($_transaksi_ds = $this->m_transaksi_d->getResult()->result_array() as $_transaksi_d)
                    {
                        $_transaksi_m['transaksi_d']["td_{$_transaksi_d['id_td']}"] = $_transaksi_d;

                    }

                    $_user['transaksi_m']["tm_{$_transaksi_m['id_tm']}"] = $_transaksi_m;
                }

                if (isset($_user['transaksi_m']) && (count($_user['transaksi_m']) > 0))
                {
                    $reports["u_{$_user['id_user']}"] = $_user;
                }
            }
        }

        $this->load->view('v_lpDatatrans', compact('outlets', 'rDate', 'products', 'reports', 'rOutlet'));
    }

    public function produk()
    {
        $this->load->model('m_outlet');
        $this->m_outlet->find(function (CI_DB_query_builder $db) { $db->select(); });
        $outlets = [];
        $reports = [];
        foreach ($this->m_outlet->getResult()->result_array() as $outlet)
        {
            $outlets["o_{$outlet['id_outlet']}"] = $outlet;
        }

        $rDate   = $this->input->getOrDefault('tanggal', null);
        $rOutlet = $this->input->getOrDefault('outlet', 0);

        if ((!is_null($rDate) && ($rOutlet > 0)))
        {
            $this->load->model(['m_produk', 'm_user', 'm_transaksi_m']);

            $this->m_user->find(function (CI_DB_query_builder $db) use ($rOutlet) {
                $db->select('`id_user`, `nama`');
                $db->where('`id_outlet`', $rOutlet);
                $db->where('`level`', 'kasir');
            });

            foreach ($_users = $this->m_user->getResult()->result_array() as $_user)
            {
                $this->m_produk->find(function (CI_DB_query_builder $db) use ($_user, $rOutlet, $rDate) {
                    //@formatter:off
                    $db->select("`produk`.`id_produk`, `produk`.`nama_produk`, `produk`.`kategori`, COALESCE(SUM(`transaksi_d`.`jumlah`), 0) AS 'jumlah', COALESCE(SUM(`transaksi_d`.`total`), 0) AS 'total'");
                    $db->join('`transaksi_d`', '`transaksi_d`.`id_produk` = `produk`.`id_produk`', 'LEFT OUTER');
                    $db->join('`transaksi_m`', '`transaksi_m`.`id_tm` = `transaksi_d`.`id_tm`', 'LEFT OUTER');
                    $db->group_start();
                        $db->where('DATE(`transaksi_m`.`tanggal`)', $rDate);
                        $db->or_where('DATE(`transaksi_m`.`tanggal`)', null);
                    $db->group_end();
                    $db->group_start();
                        $db->where('`transaksi_m`.`id_outlet`', $rOutlet);
                        $db->or_where('`transaksi_m`.`id_outlet`', null);
                    $db->group_end();
                    $db->group_start();
                        $db->where('`transaksi_m`.`id_user`', $_user['id_user']);
                        $db->or_where('`transaksi_m`.`id_user`', null);
                    $db->group_end();
                    $db->group_by('`produk`.`id_produk`');
                    $db->order_by('`produk`.`id_produk`', 'ASC');
                    $db->order_by('`transaksi_m`.`tanggal`', 'ASC');
                    //@formatter:on
                });

                foreach ($this->m_produk->getResult()->result_array() as $_product)
                {
                    $_user['produk']["p_{$_product['id_produk']}"] = $_product;
                }
                $reports["u_{$_user['id_user']}"] = $_user;
            }
        }

        $this->load->view('v_laporanProduk', compact('outlets', 'rDate', 'reports', 'rOutlet'));
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
