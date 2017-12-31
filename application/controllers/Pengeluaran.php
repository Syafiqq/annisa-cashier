<?php

class Pengeluaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            redirect(base_url("Login"));
        }
        $this->load->helper('url');
        $this->load->model('m_pengeluaran');
    }

    function index()
    {

    }

    function tambahPengeluaran()
    {
        $idPeng    = $this->input->post('idPeng');
        $namaPeng  = $this->input->post('namaPeng');
        $jenis     = $this->input->post('jenis');
        $total     = $this->input->post('total');
        $id_outlet = $this->input->post('outlet');
        $tgl       = $this->input->post('tanggal');
        //$jangka   = $this->input->post('jangka');

        $data = array(
            'id_pengeluaran' => $idPeng,
            'nama_pengeluaran' => $namaPeng,
            'jenis' => $jenis,
            'jumlah' => $total,
            'id_outlet' => $id_outlet,
            'tgl_pengeluaran' => $tgl
            //'jangka_perbulan' => $jangka
        );
        $this->m_pengeluaran->tambahPengeluaran($data);
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

    function hapusPengeluaran()
    {
        $this->load->model('m_pengeluaran');
        $idPeng = $this->input->post('id_pengeluaran');
        $this->m_pengeluaran->hapusPengeluaran($idPeng);
    }


}
