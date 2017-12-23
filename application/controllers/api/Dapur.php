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
 * @property CI_Input input
 */
class Dapur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login")
        {
            echo json_encode(['n' => ['Request Forbidden'], 's' => 0]);

            return;
        }
    }

    public function load()
    {
        /** @noinspection PhpParamsInspection */
        $this->load->model(['m_transaksi_m', 'm_transaksi_d']);
        $this->m_transaksi_m->find(function (CI_DB_query_builder $db) {
            $db->select();
            $db->where('DATE(`tanggal`) = DATE(NOW())', null, false);
            $db->order_by('`tanggal`', 'ASC');
        });
        $queues = [];
        foreach ($this->m_transaksi_m->getResult()->result_array() as $queue)
        {
            $this->m_transaksi_d->find(function (CI_DB_query_builder $db) use ($queue) {
                $db->select();
                $db->where('`id_tm`', $queue['id_tm']);
            });
            $queue['pesanan'] = [];
            foreach ($this->m_transaksi_d->getResult()->result_array() as $request)
            {
                $queue['pesanan']["r_{$request['id_produk']}"] = $request;
            }
            $queues["q_{$queue['id_tm']}"] = $queue;
        }
        echo json_encode(['n' => ['Antrian Ditambahkan'], 'r' => ['pesanan' => $queues], 's' => 1]);
    }


}

?>
