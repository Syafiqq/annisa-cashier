<?php

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

        $this->load->view('v_dapur');
    }

    function transaksi()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "dapur")
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
