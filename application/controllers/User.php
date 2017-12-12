<?php

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            redirect(base_url("Login"));
        }
        $this->load->helper('url');
        $this->load->model('m_user');
    }

    function index()
    {

    }

    function tambahUser()
    {
        $id       = $this->input->post('idUser');
        $username = $this->input->post('username');
        $pass     = md5($this->input->post('password'));
        $nama     = $this->input->post('nama');
        $level    = $this->input->post('level');
        $outlet   = $this->input->post('outlet');
        $telp     = $this->input->post('telepon');

        $data = array(
            'id_user' => $id,
            'username' => $username,
            'password' => $pass,
            'nama' => $nama,
            'level' => $level,
            'id_outlet' => $outlet,
            'telepon' => $telp
        );
        $this->m_user->tambahUser($data);
    }

    function editUser()
    {
        $id       = $this->input->post('id_user');
        $nama     = $this->input->post('nama');
        $level    = $this->input->post('level');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $outlet   = $this->input->post('id_outlet');
        $telepon  = $this->input->post('telepon');

        $data = array(
            'nama' => $nama,
            'level' => $level,
            'username' => $username,
            'password' => $password,
            'id_outlet' => $outlet,
            'telepon' => $telepon
        );
        $this->m_user->editUser($id, $data);
    }

    function hapusUser()
    {
        $this->load->model('m_user');
        $id = $this->input->post('id_user');
        $this->m_user->hapusUser($id);
    }


}
