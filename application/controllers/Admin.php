<?php

class Admin extends CI_Controller
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

        $this->load->view('v_admin');
    }

    function produk()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->model('m_produk');
                $data['produk'] = $this->m_produk->getProduk();
                $this->load->view('v_produk', $data);

            }
            else if ($this->uri->segment(3) == "tambah")
            {
                $this->load->model('m_produk');
                $data['produk'] = $this->m_produk->datacount() + 1;
                $this->load->view('v_produkTambah', $data);

            }
            else if ($this->uri->segment(3) == "edit" and $this->uri->segment(4))
            {
                $this->load->model('m_produk');
                $data['produk'] = $this->m_produk->ubahProduk($this->uri->segment(4));
                $this->load->view('v_produkEdit', $data);

            }
            else if ($this->uri->segment(3) == "hapus")
            {
                $this->load->model('m_produk');
                $data['produk'] = $this->m_produk->hapusProduk($this->uri->segment(4));

            }
            else if ($this->uri->segment(3) == "laporanPenjualan")
            {
                $this->load->model('m_produk');
                $data['produk'] = $this->m_produk->getProduk();
                $this->load->view('v_lpHarian', $data);
            }
            else
            {
                show_404();
            }
        }
        else
        {
            echo "ERROR 401 UNAUTHORIZED";
        }
    }

    function bahanBaku()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->model('m_bahan');
                $data['bahanBaku'] = $this->m_bahan->getBahan();
                $this->load->view('v_bahanbaku', $data);

            }
            else if ($this->uri->segment(3) == "tambah")
            {
                $this->load->model('m_bahan');
                $data['bahanBaku'] = $this->m_bahan->datacount() + 1;
                $this->load->view('v_bahanbakuTambah', $data);

            }
            else if ($this->uri->segment(3) == "edit" and $this->uri->segment(4))
            {
                $this->load->model('m_bahan');
                $data['bahanBaku'] = $this->m_bahan->ubahBahan($this->uri->segment(4));
                $this->load->view('v_bahanbakuEdit', $data);

            }
            else if ($this->uri->segment(3) == "hapus")
            {
                $this->load->model('m_bahan');
                $data['bahanBaku'] = $this->m_bahan->hapusBahan($this->uri->segment(4));

            }
            else if ($this->uri->segment(3) == "tambahSin" and $this->uri->segment(4))
            {
                $this->load->model('m_bahan');
                $data['bahanBaku'] = $this->m_bahan->tambahStokin($this->uri->segment(4));
                $this->load->view('v_stokMasuk', $data);

            }
            else
            {
                show_404();
            }
        }
        else
        {
            echo "ERROR 401 UNAUTHORIZED";
        }
    }

    function stokMasuk()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->model('m_bahan');
                $data['bahanBaku'] = $this->m_bahan->datacount() + 1;
                $this->load->view('v_stokMasuk', $data);
            }
        }
    }

    function laporanPenjualan()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->view('v_laporanPenjualan');
            }
            else if ($this->uri->segment(3) == "lph")
            {
                $this->load->model('m_outlet');
                //$data['bahanBaku']=$this->m_bahan->getBahan();
                $data['outlet'] = $this->m_outlet->getOutlet();
                $this->load->view('v_lpHarian', $data);
            }
            else if ($this->uri->segment(3) == "detharian")
            {
                $this->load->model('m_laporan');
                $data['harian'] = $this->m_laporan->getLph($this->input->post('tanggal1'), $this->input->post('tanggal2'), $this->input->post('nama_outlet'));
                $this->load->view('v_lphDetail', $data);
            }
            else if ($this->uri->segment(3) == "datatp")
            {
                $this->load->model('m_outlet');
                $data['outlet'] = $this->m_outlet->getOutlet();
                $this->load->view('v_lpDatatrans', $data);
            }
            else if ($this->uri->segment(3) == "detdt")
            {
                $this->load->model('m_laporan');
                $data['datatrans'] = $this->m_laporan->getLph($this->input->post('tanggal1'), $this->input->post('tanggal2'), $this->input->post('nama_outlet'));
                $this->load->view('v_lpdDetail', $data);
            }
            else if ($this->uri->segment(3) == "ldo")
            {
                $this->load->model('m_outlet');
                $data['outlet'] = $this->m_outlet->getOutlet();
                $this->load->view('v_lpOmset', $data);
            }
            else if ($this->uri->segment(3) == "dto")
            {
                $this->load->model('m_laporan');
                $data['omset'] = $this->m_laporan->getLph($this->input->post('tanggal1'), $this->input->post('tanggal2'), $this->input->post('nama_outlet'));
                $this->load->view('v_lpoHarian', $data);
            }
        }
    }

    function laporanProduk()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->view('v_laporanProduk');
            }
        }
    }

    function laporanStok()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->model('m_bahan');
                $data['bahanBaku'] = $this->m_bahan->getBahan();
                $this->load->view('v_laporanStok', $data);
            }
        }
    }

    function outlet()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->model('m_outlet');
                $data['outlet'] = $this->m_outlet->getOutlet();
                $this->load->view('v_outlet', $data);

            }
            else if ($this->uri->segment(3) == "tambah")
            {
                $this->load->model('m_outlet');
                $data['outlet'] = $this->m_outlet->datacount() + 1;
                $this->load->view('v_outletTambah', $data);

            }
            else if ($this->uri->segment(3) == "edit" and $this->uri->segment(4))
            {
                $this->load->model('m_outlet');
                $data['outlet'] = $this->m_outlet->ubahOutlet($this->uri->segment(4));
                $this->load->view('v_outletEdit', $data);

            }
            else if ($this->uri->segment(3) == "hapus")
            {
                $this->load->model('m_outlet');
                $data['outlet'] = $this->m_outlet->hapusOutlet($this->uri->segment(4));

            }
            else
            {
                show_404();
            }
        }
        else
        {
            echo "ERROR 401 UNAUTHORIZED";
        }
    }

    function Pengeluaran()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->model('m_pengeluaran');
                $data['pengeluaran'] = $this->m_pengeluaran->getPengeluaran();
                $this->load->view('v_pengeluaran', $data);
            }
            else if ($this->uri->segment(3) == "tambah")
            {
                $this->load->model('m_pengeluaran');
                $data['pengeluaran'] = $this->m_pengeluaran->datacount() + 1;
                $this->load->view('v_pengeluaranTambah', $data);

            }
            else if ($this->uri->segment(3) == "hapus")
            {
                $this->load->model('m_pengeluaran');
                $data['pengeluaran'] = $this->m_pengeluaran->hapusPengeluaran($this->uri->segment(4));

            }
            else
            {
                show_404();
            }
        }
        else
        {
            echo "ERROR 401 UNAUTHORIZED";
        }
    }

    function User()
    {
        if ($this->session->userdata('status') == "login" and $this->session->userdata('level') == "admin")
        {
            if (!$this->uri->segment(3))
            {
                $this->load->model('m_user');
                $data['pengguna'] = $this->m_user->getUser();
                $this->load->view('v_user', $data);

            }
            else if ($this->uri->segment(3) == "tambah")
            {
                $this->load->model('m_user');
                $this->load->model('m_outlet');
                $data['pengguna'] = $this->m_user->datacount() + 1;
                $data['outlet']   = $this->m_outlet->getOutlet();
                $this->load->view('v_userTambah', $data);

            }
            else if ($this->uri->segment(3) == "edit" and $this->uri->segment(4))
            {
                $this->load->model('m_user');
                $this->load->model('m_outlet');
                $data['pengguna'] = $this->m_user->ubahUser($this->uri->segment(4));
                $data['outlet']   = $this->m_outlet->getOutlet();
                $this->load->view('v_userEdit', $data);

            }
            else if ($this->uri->segment(3) == "hapus")
            {
                $this->load->model('m_user');
                $data['pengguna'] = $this->m_user->hapusUser($this->uri->segment(4));

            }
            else
            {
                show_404();
            }
        }
        else
        {
            echo "ERROR 401 UNAUTHORIZED";
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