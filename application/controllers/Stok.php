<?php

class Stok extends CI_Controller
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

        $this->load->view('v_arsipStok');
    }

    function stokSambel()
    {
        $this->load->view('v_stokSambel');
    }
}
