<?php

/**
 * @property M_produk m_produk
 * @property M_bahan m_bahan
 * @property M_stok m_stok
 * @property MY_Input input
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

        $materials = [];
        foreach ($this->m_bahan->getResult()->result_array() as $material)
        {
            $materials["bk_{$material['id_bahan']}"] = $material;
        }
        $this->load->view('v_dapurStok', compact('materials'));
    }

    public function stok_masuk($id)
    {
        $this->load->model('m_bahan');
        $this->m_bahan->find(function (CI_DB_query_builder $db) use ($id) {
            $db->select();
            $db->where('`id_bahan`', $id);
        });
        $material = $this->m_bahan->getResult()->row_array();

        $this->load->view('v_dapurSM', compact('material'));
    }

    public function stok_masuk_commit($id)
    {
        $this->load->model('m_stok');
        $data             = [];
        $data['id_bahan'] = $id;
        $data['stok']     = doubleval($this->input->postOrDefault('jumlah', 0));
        $data['harga']    = intval($this->input->postOrDefault('harga', 0));
        $data['tipe']     = 'masuk';
        $this->m_stok->insert($data, function (CI_DB_query_builder $db) {
            $db->set('`tanggal`', 'CURRENT_TIMESTAMP', false);
        });

        echo json_encode(['n' => ['Stok Update'], 'rdr' => site_url("dapur/stok/"), 's' => 1]);
    }

    public function stok_keluar($id)
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
