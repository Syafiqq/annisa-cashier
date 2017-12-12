<?php

class Kasir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            redirect(base_url("Login"));
        }
        $this->load->model('m_transaksi');
    }

    function index()
    {
        $data['makanan'] = $this->m_transaksi->getMakanan();
        $data['minuman'] = $this->m_transaksi->getMinuman();
        $data['lauk']    = $this->m_transaksi->getLauk();
        $this->load->view('v_kasir', $data);
    }

    function transaksi()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "kasir")
        {

        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect(base_url("Login"));
    }
}
