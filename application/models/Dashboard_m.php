<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{
    public function getDataKaryawan($id = null)
    {
        $this->db->from('data_karyawan');
        if ($id != null) {
            $this->db->where('id_karyawan', $id);
        }
        $this->db->limit(3);
        $query = $this->db->get();
        return $query;
    }

    function jmlDataKar()
    {
        $query = $this->db->query("SELECT * FROM data_karyawan");
        $total = $query->num_rows();
        return $total;
    }

    function jmlDataTerima()
    {
        $query = $this->db->query("SELECT * FROM data_karyawan WHERE nilai_fuzzy >= 60");
        $total = $query->num_rows();
        return $total;
    }

    function jmlDataDitolak()
    {
        $query = $this->db->query("SELECT * FROM data_karyawan WHERE nilai_fuzzy < 60");
        $total = $query->num_rows();
        return $total;
    }
}
