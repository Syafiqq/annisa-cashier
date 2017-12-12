<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_outlet extends CI_Model
{

    function getOutlet()
    {
        return $this->db->get('outlet')->result();
    }

    function tambahOutlet($data)
    {
        $this->db->insert('outlet', $data);
        redirect('admin/outlet');
    }

    function ubahOutlet($id)
    {
        $where = "id_outlet='$id'";

        return $this->db->get_where('outlet', $where)->result();
    }

    function editOutlet($id, $data = array())
    {
        $dataid   = array(
            'id_outlet' => $data['id_outlet']
        );
        $dataedit = array(
            'nama_outlet' => $data['nama_outlet'],
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon']
        );
        $this->db->where('id_outlet', $id);
        $this->db->update('outlet', $dataedit);
        redirect('admin/outlet');
    }

    function hapusOutlet($id)
    {
        $this->db->where('id_outlet', $id);
        $this->db->delete('outlet');
        redirect('admin/outlet');
    }

    function dd_outlet()
    {
        $this->db->order_by('outlet', 'asc');
        $result = $this->db->get('outlet');

        $dd[''] = 'Silakan Pilih';
        if ($result->num_rows() > 0)
        {
            foreach ($result->result() as $row)
            {
                $dd[$row->id_outlet] = $row->nama_outlet;
            }
        }

        return $dd;
    }

    function datacount()
    {
        return $this->db->count_all('outlet');
    }
}
