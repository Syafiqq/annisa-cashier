<?php
/**
 * This <annisa.com> project created by :
 * Name         : syafiq
 * Date / Time  : 19 December 2017, 5:26 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_DB_query_builder|CI_DB_pdo_driver db
 */
class M_transaksi_d extends MY_Model
{
    public function __construct()
    {
        parent::__construct('`transaksi_d`');
        // Your own constructor code
    }

    /**
     * @param $data
     * @return int
     */
    public function insert($data)
    {
        $this->db->set('id_tm', $data['transaction']);
        $this->db->set('id_produk', $data['product']);
        $this->db->set('tanggal', 'CURRENT_TIMESTAMP', false);
        $this->db->set('jumlah', $data['quantity']);
        $this->db->set('total', $data['total']);

        return parent::insert($data, function () { });
    }
}

?>
