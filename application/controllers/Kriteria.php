<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('authenticated')) {
            $data['data_kriteria'] = $this->db->get('kriteria')->result_array();

            $this->template->load('templates/index', 'kriteria/index', $data);
        } else {
            redirect('auth');
        }
    }
}
