<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_M extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    function getId($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
    function editUser($id)
    {
        $data = [
            'username' => $this->input->post('username', true),
            'password' => $this->input->post('password', true),
            'nama' => $this->input->post('nama', true),
            'address' => $this->input->post('address', true),
            'level' => $this->input->post('level', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
}
