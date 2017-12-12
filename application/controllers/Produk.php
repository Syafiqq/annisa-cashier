<?php

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            redirect(base_url("Login"));
        }
        $this->load->helper('url');
        $this->load->model('m_produk');
    }

    function index()
    {

    }

    function produkPopuler()
    {
        $this->load->view('v_produkPopuler');
    }

    function tambahProduk()
    {
        $idProduk   = $this->input->post('idProduk');
        $namaProduk = $this->input->post('namaProduk');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $lacak      = $this->input->post('lacak');

        $data = array(
            'id_produk' => $idProduk,
            'nama_produk' => $namaProduk,
            'kategori' => $kategori,
            'harga_jual' => $harga,
            'lacak' => $lacak
        );
        $this->m_produk->tambahProduk($data);
    }

    function editProduk()
    {
        $idProduk   = $this->input->post('idProduk');
        $namaProduk = $this->input->post('namaProduk');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $lacak      = $this->input->post('Lacak');

        $data = array(
            'nama_produk' => $namaProduk,
            'kategori' => $kategori,
            'harga_jual' => $harga,
            'lacak' => $lacak
        );
        $this->m_produk->editProduk($idProduk, $data);
    }

    function hapusProduk()
    {
        $this->load->model('m_produk');
        $idProduk = $this->input->post('id_produk');
        $this->m_produk->hapusProduk($idProduk);
    }


}
