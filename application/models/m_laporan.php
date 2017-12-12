<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_laporan extends CI_Model
{

    function getLHarian()
    {
        return $this->db->get('')->result();
    }

    function getLph($tanggal1, $tanggal2, $idoutlet)
    {
        $where = "tanggal >= '$tanggal1' and tanggal <= '$tanggal2'";

        return $this->db->get_where('transaksi_m', $where)->result();
    }

    function getLomset()
    {

    }

    function getLdtp($tanggal1, $tanggal2, $idoutlet)
    {
        $where = "tanggal >= '$tanggal1' and tanggal <= '$tanggal2'";

        return $this->db->get_where('transaksi_m', $where)->result();

    }


}
