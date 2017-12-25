<?php

/**
 * @property M_outlet m_outlet
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
        $outlets = $this->m_outlet->getResult()->result_array();
        $this->load->view('v_lpHarian', compact('outlets'));
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
