<?php

class bahanBaku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            redirect(base_url("Login"));
        }
        $this->load->helper('url');
        $this->load->model('m_bahan');
    }

    function index()
    {

    }

    function tambahBahan()
    {
        $idBahan   = $this->input->post('idBahan');
        $namaBahan = $this->input->post('namaBahan');
        $satuan    = $this->input->post('satuan');

        $data = array(
            'id_bahan' => $idBahan,
            'nama_bahan' => $namaBahan,
            'satuan' => $satuan,
        );
        $this->m_bahan->tambahBahan($data);
    }

    function editBahan()
    {
        $idBahan   = $this->input->post('idBahan');
        $namaBahan = $this->input->post('namaBahan');
        $satuan    = $this->input->post('satuan');

        $data = array(
            'nama_bahan' => $namaBahan,
            'satuan' => $satuan,
        );
        $this->m_bahan->editBahan($idBahan, $data);
    }

    function hapusBahan()
    {
        $this->load->model('m_bahan');
        $idProduk = $$this->input->post('id_bahan');
        $this->m_bahan->hapusBahan($idBahan);
    }

    function tambahSin()
    {
        $idBahan = $this->input->post('idBahan');
        $stokm   = $this->input->post('stokm');
        $harga   = $this->input->post('harga');

        $data = array(
            'stok_masuk' => $stokm,
            'harga_beli' => $harga
        );
        $this->m_bahan->tambahSmasuk($idBahan, $data);
    }
}
