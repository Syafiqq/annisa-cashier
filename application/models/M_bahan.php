<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bahan extends MY_Model
{
    /**
     * M_bahan constructor.
     */
    public function __construct()
    {
        parent::__construct('`bahanbaku`');
    }

    function getBahan()
    {
        return $this->db->get('bahanBaku')->result();
    }

    function tambahBahan($data)
    {
        $this->db->insert('bahanBaku', $data);
        redirect('admin/bahanBaku');
    }

    function ubahBahan($idBahan)
    {
        $where = "id_bahan='$idBahan'";

        return $this->db->get_where('bahanBaku', $where)->result();
    }

    function editBahan($idBahan, $data = array())
    {
        $dataid   = array(
            'id_bahan' => $data['id_bahan']
        );
        $dataedit = array(
            'nama_bahan' => $data['nama_bahan'],
            'satuan' => $data['satuan']
        );
        $this->db->where('id_bahan', $idBahan);
        $this->db->update('bahanBaku', $dataedit);
        redirect('admin/bahanBaku');
    }

    function hapusBahan($idBahan)
    {
        $this->db->where('id_bahan', $idBahan);
        $this->db->delete('bahanBaku');
        redirect('admin/bahanBaku');
    }

    function datacount()
    {
        return $this->db->count_all('bahanBaku');
    }

    function viewByNama($nama)
    {

    }

    function tambahStokMasuk($data)
    {
        $this->db->insert('bahanBaku', $data);
        redirect('admin/bahanBaku/tambahStokMasuk');
    }

    function get_option()
    {
        $this->db->select('*');
        $this->db->from('bahanBaku');
        $query = $this->db->get();

        return $query->result();
    }

    function tambahStokin($idBahan)
    {
        $where = "id_bahan='$idBahan'";

        return $this->db->get_where('bahanBaku', $where)->result();
    }

    function tambahSmasuk($idBahan, $data)
    {
        $dataid   = array(
            'id_bahan' => $data['id_bahan']
        );
        $dataedit = array(
            'harga_beli' => $data['harga_beli'],
            'stok_masuk' => $data['stok_masuk']
        );
        $this->db->where('id_bahan', $idBahan);
        $this->db->update('bahanBaku', $dataedit);
        redirect('admin/bahanBaku');
    }
}
