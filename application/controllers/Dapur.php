<?php

/**
 * @property M_produk m_produk
 * @property M_bahan m_bahan
 * @property CI_Loader|object load
 * */
class Dapur extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            redirect(base_url("Login"));
        }
    }

    public function index()
    {
        $this->load->model('m_produk');
        $this->m_produk->find(function (CI_DB_query_builder $db) {
            $db->select();
        });

        $products = [];
        foreach ($this->m_produk->getResult()->result_array() as $product)
        {
            $products["p_{$product['id_produk']}"] = $product;
        }

        $this->load->view('v_dapur', compact('products'));
    }

    public function saji()
    {
        $this->load->model('m_produk');
        $this->m_produk->find(function (CI_DB_query_builder $db) {
            $db->select();
        });

        $products = [];
        foreach ($this->m_produk->getResult()->result_array() as $product)
        {
            $products["p_{$product['id_produk']}"] = $product;
        }

        $this->load->view('v_dapur_saji', compact('products'));
    }

    public function stok()
    {
        $this->load->model('m_bahan');
        $this->m_bahan->find(function (CI_DB_query_builder $db) {
            $db->select();
        });

        $materials = $this->m_bahan->getResult()->result_array();
        $this->load->view('v_dapurStok', compact('materials'));
    }

    public function stok_masuk()
    {
        $this->load->view('v_dapurSM');
    }

    public function stok_keluar()
    {
        $this->load->view('v_dapurSK');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect(base_url("Login"));
    }
}
