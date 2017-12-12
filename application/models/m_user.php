<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_user extends CI_Model
{

    function getUser()
    {
        return $this->db->get('vw_pengguna')->result();
    }

    function tambahUser($data)
    {
        $this->db->insert('pengguna', $data);
        redirect('admin/user');
    }


    function ubahUser($id)
    {
        $where = "id_user='$id'";

        return $this->db->get_where('pengguna', $where)->result();
    }

    function editUser($id, $data = array())
    {
        $dataid   = array(
            'id_user' => $id
        );
        $dataedit = array(
            'username' => $data['username'],
            'password' => $data['password'],
            'nama' => $data['nama'],
            'level' => $data['level'],
            'id_outlet' => $data['id_outlet'],
            'telepon' => $data['telepon']
        );
        $this->db->where('id_user', $id);
        $this->db->update('pengguna', $dataedit);
        redirect('admin/user');
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
