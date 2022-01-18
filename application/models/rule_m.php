<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rule_m extends CI_Model
{
    public function get_rule()
    {
        $this->db->from('rule_fuzzy');
        return $this->db->get();
    }
}
