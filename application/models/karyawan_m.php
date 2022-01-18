<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan_m extends CI_Model
{
    public function get()
    {
        $this->db->from('data_karyawan');
        return $this->db->get();
    }

    function getId($id)
    {
        return $this->db->get_where('data_karyawan', ['id_karyawan' => $id])->row_array();
    }

    function editKaryawan($id)
    {
        $data = [
            'nm_karyawan' => $this->input->post('nm_karyawan', true),
            'usia_karyawan' => $this->input->post('usia_karyawan', true),
            'pendidikan' => $this->input->post('pendidikan', true),
            'pengalaman' => $this->input->post('pengalaman', true),
            'nilai_test' => $this->input->post('nilai_test', true)
        ];

        $this->db->where('id_karyawan', $id);
        $this->db->update('data_karyawan', $data);
    }

    function hapusFuzzy($id)
    {
        $tabel = array('nilai_derajat', 'rule_nilai');
        $this->db->where('id_karyawan', $id);
        $this->db->delete($tabel);
    }

    function hapusNilaiFuzzy($id)
    {
        $this->db->where('id_karyawan', $id);
        $this->db->set('nilai_fuzzy', '0');
        $this->db->update('data_karyawan');
    }


    function getExp($id = null)
    {
        $this->db->from('data_karyawan');
        if ($id != null) {
            $this->db->where('id_karyawan', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
