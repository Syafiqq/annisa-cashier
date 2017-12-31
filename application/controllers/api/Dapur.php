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
 * @property M_bahan m_bahan
 * @property M_stok m_stok
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
            $db->order_by('`waktu_saji`', 'DESC');
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

    public function finish()
    {
        /** @noinspection PhpParamsInspection */
        $this->load->model(['m_transaksi_m', 'm_transaksi_d']);
        $this->m_transaksi_m->find(function (CI_DB_query_builder $db) {
            $db->select();
            $db->where('DATE(`tanggal`) = DATE(NOW())', null, false);
            $db->where('`selesai`', 2);
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
            $db->set('`waktu_saji`', 'CURRENT_TIMESTAMP', false);
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

    public function queue_finish()
    {
        $id = $this->input->postOrDefault('id', 0);
        $this->load->model('m_transaksi_m');
        if ($this->m_transaksi_m->update(['selesai' => 2], function (CI_DB_query_builder $db) use ($id) {
            $db->set('`waktu_selesai`', 'CURRENT_TIMESTAMP', false);
            $db->where('`id_tm`', $id);
        }))
        {
            $this->load->library('pusher_library');
            $this->pusher_library->publish('queue', 'finish_updated', []);

            echo json_encode(['n' => ['Pesanan Telah Selesai'], 's' => 1]);
        }
        else
        {
            echo json_encode(['n' => ['Pesanan Gagal Diselesaikan'], 's' => 0]);
        }
    }

    public function stock()
    {
        /** @noinspection PhpParamsInspection */
        $this->load->model(['m_bahan', 'm_stok']);
        $this->m_bahan->find(function (CI_DB_query_builder $db) {
            $db->select('`id_bahan`, `satuan');
        });
        $stocks    = [];
        $id_outlet = $this->session->userdata('outlet');
        foreach ($this->m_bahan->getResult()->result_array() as $material)
        {
            $this->m_stok->find(function (CI_DB_query_builder $db) use ($id_outlet, $material) {
                $db->select(//@formatter:off
                /** @lang MySQL */
                    "(SELECT COALESCE(SUM(`stok`), 0) AS 'g_in' FROM `stok` WHERE `stok`.`id_bahan` = '{$material['id_bahan']}' AND `stok`.`id_outlet` = '{$id_outlet}' AND `stok`.`tipe` = 'masuk') AS 'g_in'"
                    . ",(SELECT COALESCE(SUM(`stok`), 0) AS 'g_out' FROM `stok` WHERE `stok`.`id_bahan` = '{$material['id_bahan']}' AND `stok`.`id_outlet` = '{$id_outlet}' AND `stok`.`tipe` = 'keluar') AS 'g_out'"
                    . ",(SELECT g_in - g_out) AS 'current'"
                    . ",(SELECT COALESCE(SUM(`stok`), 0) AS 'l_in' FROM `stok` WHERE `stok`.`id_bahan` = '{$material['id_bahan']}' AND `stok`.`id_outlet` = '{$id_outlet}' AND DATE(`tanggal`) = DATE(NOW()) AND `stok`.`tipe` = 'masuk') AS 'l_in'"
                    . ",(SELECT COALESCE(SUM(`stok`), 0) AS 'l_out' FROM `stok` WHERE `stok`.`id_bahan` = '{$material['id_bahan']}' AND `stok`.`id_outlet` = '{$id_outlet}' AND DATE(`tanggal`) = DATE(NOW()) AND `stok`.`tipe` = 'keluar') AS 'l_out'"
                    . "", false);
                //@formatter:on
            }, true);
            $material['stok']                     = $this->m_stok->getResult()->row_array();
            $stocks["bk_{$material['id_bahan']}"] = $material;
        }
        echo json_encode(['n' => ['Stok Diperbarui'], 'r' => ['stok' => $stocks], 's' => 1]);
    }
}

?>
