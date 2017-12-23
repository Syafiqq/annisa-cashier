<?php

/**
 * This <annisa.com> project created by :
 * Name         : syafiq
 * Date / Time  : 23 December 2017, 1:41 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

/**
 * @property CI_Session session
 * @property CI_Loader load
 * @property M_transaksi_m m_transaksi_m
 * @property M_transaksi_d m_transaksi_d
 */
class Dapur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            echo json_encode(['n' => ['Request Forbidden']]);

            return;
        }
    }

    function load()
    {
        /** @noinspection PhpParamsInspection */
        $this->load->model(['m_transaksi_m', 'm_transaksi_d']);
        $this->m_transaksi_m->find(function (CI_DB_query_builder $db) {
            $db->select();
            $db->where('DATE(`tanggal`) = DATE(NOW())', null, false);
        });
        $queues = $this->m_transaksi_m->getResult()->result_array();
        foreach ($queues as &$queue)
        {
            $this->m_transaksi_d->find(function (CI_DB_query_builder $db) use ($queue) {
                $db->select();
                $db->where('`id_tm`', $queue['id_tm']);
            });
            $queue['pesanan'] = $this->m_transaksi_d->getResult()->result_array();
        }
        echo json_encode(['n' => ['Antrian Ditambahkan'], 'r' => ['pesanan' => $queues]]);
    }
}

?>
