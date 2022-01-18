<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('rule_m');
    }

    public function index()
    {
        if ($this->session->userdata('authenticated')) {
            $data['data_rule'] = $this->rule_m->get_rule()->result_array();

            $this->template->load('templates/index', 'rule_fuzzy/index', $data);
        } else {
            redirect('auth');
        }
    }
}
