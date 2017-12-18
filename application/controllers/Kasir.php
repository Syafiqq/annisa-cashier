<?php

/**
 * @property CI_Session session
 * @property M_transaksi m_transaksi
 * @property CI_Input input
 * @property M_transaksi_m m_transaksi_m
 * @property M_transaksi_d m_transaksi_d
 */
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
            $this->load->model(['m_transaksi_m', 'm_transaksi_d']);
            $data = [];
            if (strcmp($this->input->post('status'), 'ya') === 0)
            {
                $data['no_meja'] = $this->input->post('table');
            }
            if (!is_null($this->input->post('note')))
            {
                $data['keterangan'] = $this->input->post('note');
            }
            $data['grand_total'] = $this->input->post('cost');
            $data['id_user']     = $this->session->userdata('id');
            $data['id_outlet']   = $this->session->userdata('outlet');

            $id = $this->m_transaksi_m->insert($data);
            foreach ($this->input->post('goods') as $item)
            {
                $data                = [];
                $data['transaction'] = $id;
                $data['product']     = $item['i'];
                $data['quantity']    = $item['q'];
                $data['total']       = intval($item['q']) * intval($item['c']);
                $this->m_transaksi_d->insert($data);
            }
            echo json_encode(['m' => ['Transaksi Berhasil'], 's' => 1]);
        }
        else
        {
            echo json_encode(['m' => ['Akses Ditolak'], 's' => 0]);
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
