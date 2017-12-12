<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');

    }

    public function index()
    {
        $this->load->view('v_login');
    }

    function auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where    = array(
            'username' => $username,
            'password' => md5($password)
        );

        $cek   = $this->m_login->cek_login("pengguna", $where)->num_rows();
        $akses = $this->m_login->cek_akses("pengguna", $where);

        if ($cek > 0)
        {
            foreach ($akses as $row)
            {
                $data_session = array(
                    'nama' => $username,
                    'status' => "login",
                    'level' => $row->level
                );

                $this->session->set_userdata($data_session);
            }

            if ($this->session->userdata('level') == 'admin')
            {
                redirect(base_url("admin"));
            }
            elseif ($this->session->userdata('level') == 'kasir')
            {
                redirect(base_url("kasir"));
            }
            elseif ($this->session->userdata('level') == 'dapur')
            {
                redirect(base_url("dapur"));
            }

        }
        else
        {
            $this->load->view('v_login');
            ?>
            <script language="JavaScript"> alert("Maaf, kombinasi username dengan password salah.");</script><?php
            //$this->session->set_flashdata('pesan', 'Maaf, ');
            //redirect(base_url('login'));
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("login"));
    }
}
