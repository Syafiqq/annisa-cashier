<?php

/**
 * @property M_produk m_produk
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

    function index()
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

    function saji()
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

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect(base_url("Login"));
    }
}
