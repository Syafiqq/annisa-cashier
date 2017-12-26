<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends MY_Model
{
    /**
     * M_pengeluaran constructor.
     */
    public function __construct()
    {
        parent::__construct('`pengeluaran`');
    }

    function getPengeluaran()
    {
        return $this->db->get('pengeluaran')->result();
    }

    function tambahPengeluaran($data)
    {
        $this->db->insert('pengeluaran', $data);
        redirect('admin/pengeluaran');
    }

    function ubahProduk($idProduk)
    {
        $where = "id_produk='$idProduk'";

        return $this->db->get_where('produk', $where)->result();
    }

    function editProduk($idProduk, $data = array())
    {
        $dataid   = array(
            'id_produk' => $data['id_produk']
        );
        $dataedit = array(
            'nama_produk' => $data['nama_produk'],
            'kategori' => $data['kategori'],
            'harga_jual' => $data['harga_jual'],
            'lacak' => $data['lacak']
        );
        $this->db->where('id_produk', $idProduk);
        $this->db->update('produk', $dataedit);
        redirect('admin/produk');
    }

    function hapusProduk($idProduk)
    {
        $this->db->where('id_produk', $idProduk);
        $this->db->delete('produk');
        redirect('admin/produk');
    }

    function datacount()
    {
        return $this->db->count_all('pengeluaran');
    }
}
