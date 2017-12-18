<?php
/**
 * This <annisa.com> project created by :
 * Name         : syafiq
 * Date / Time  : 18 December 2017, 8:15 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder|CI_DB_pdo_driver db
 *
 */
class M_transaksi_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
    }

    /**
     * @param $data
     * @return int
     */
    public function insert($data)
    {
        $this->db->set('tanggal', 'CURRENT_TIMESTAMP', false);
        if ($data['no_meja'])
        {
            $this->db->set('no_meja', $data['no_meja']);
        }
        $this->db->set('keterangan', isset($data['keterangan']) ? $data['keterangan'] : '-');
        $this->db->set('grand_total', $data['grand_total']);
        $this->db->set('id_user', $data['id_user']);
        $this->db->set('id_outlet', $data['id_outlet']);
        $this->db->insert('`transaksi_m`');

        return $this->db->insert_id('transaksi_m_id_seq');
    }
}

?>