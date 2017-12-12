<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_transaksi extends CI_Model
{

    function getTransaksi()
    {
        return $this->db->get('transaksi_m')->result();

        return $this->db->get('transaksi_d')->result();
    }

    function getMakanan()
    {
        $where = "kategori='Makanan'";

        return $this->db->get_where('produk', $where)->result();
    }

    function getMinuman()
    {
        $where = "kategori='Minuman'";

        return $this->db->get_where('produk', $where)->result();
    }

    function getLauk()
    {
        $where = "kategori='Lauk'";

        return $this->db->get_where('produk', $where)->result();
    }

    function hapusUser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('pengguna');
        redirect('admin/user');
    }

    function datacount()
    {
        return $this->db->count_all('pengguna');
    }

}
