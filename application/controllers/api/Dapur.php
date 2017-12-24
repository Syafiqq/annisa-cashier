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
 * @property Pusher_library pusher_library
 * @property M_transaksi_m m_transaksi_m
 * @property M_transaksi_d m_transaksi_d
 * @property MY_Input input
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
            $db->where('`selesai`', 0);
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

    public function saji()
    {
        /** @noinspection PhpParamsInspection */
        $this->load->model(['m_transaksi_m', 'm_transaksi_d']);
        $this->m_transaksi_m->find(function (CI_DB_query_builder $db) {
            $db->select();
            $db->where('DATE(`tanggal`) = DATE(NOW())', null, false);
            $db->where('`selesai`', 1);
            $db->order_by('`waktu_selesai`', 'DESC');
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

    public function item_update()
    {
        $id = $this->input->postOrDefault('id', 0);
        $this->load->model('m_transaksi_d');
        if ($this->m_transaksi_d->update([], function (CI_DB_query_builder $db) use ($id) {
            $db->set('`diproses`', '`diproses` + 1', false);
            $db->where('`id_td`', $id);
        }))
        {
            echo json_encode(['n' => ['Item Berhasil Diupdate'], 's' => 1]);
        }
        else
        {
            echo json_encode(['n' => ['Item Gagal Diupdate'], 's' => 0]);
        }
    }

    public function queue_saji()
    {
        $id = $this->input->postOrDefault('id', 0);
        $this->load->model('m_transaksi_m');
        if ($this->m_transaksi_m->update(['selesai' => 1], function (CI_DB_query_builder $db) use ($id) {
            $db->set('`waktu_selesai`', 'CURRENT_TIMESTAMP', false);
            $db->where('`id_tm`', $id);
        }))
        {
            $this->load->library('pusher_library');
            $this->pusher_library->publish('queue', 'saji_updated', []);

            echo json_encode(['n' => ['Pesanan Berhasil Disajikan'], 's' => 1]);
        }
        else
        {
            echo json_encode(['n' => ['Pesanan Gagal Disajikan'], 's' => 0]);
        }
    }


}

?>
