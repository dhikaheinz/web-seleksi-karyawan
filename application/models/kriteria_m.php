<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kriteria_m extends CI_Model
{
    public function get()
    {
        $this->db->from('kriteria');
        return $this->db->get();
    }
}
