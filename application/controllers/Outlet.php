<?php

class Outlet extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            redirect(base_url("Login"));
        }
        $this->load->helper('url');
        $this->load->model('m_outlet');
    }

    function index()
    {

    }

    function tambahOutlet()
    {
        $id     = $this->input->post('idOutlet');
        $nama   = $this->input->post('namaOutlet');
        $alamat = $this->input->post('alamat');
        $telp   = $this->input->post('telepon');

        $data = array(
            'id_outlet' => $id,
            'nama_outlet' => $nama,
            'alamat' => $alamat,
            'telepon' => $telp
        );
        $this->m_outlet->tambahOutlet($data);
    }

    function editOutlet()
    {
        $id     = $this->input->post('idOutlet');
        $nama   = $this->input->post('namaOutlet');
        $alamat = $this->input->post('alamat');
        $telp   = $this->input->post('telepon');

        $data = array(
            'id_outlet' => $id,
            'nama_outlet' => $nama,
            'alamat' => $alamat,
            'telepon' => $telp
        );
        $this->m_outlet->editOutlet($id, $data);
    }

    function hapusOutlet()
    {
        $id = $this->input->post('id_outlet');
        $this->m_outlet->hapusOutlet($id);
    }
}
