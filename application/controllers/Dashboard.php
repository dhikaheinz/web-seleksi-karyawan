<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller

{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_m');
    }

    public function index()
    {
        if ($this->session->userdata('authenticated')) {
            $data['d_kar'] = $this->Dashboard_m->getDataKaryawan();
            $data['d_cal_kar'] = $this->Dashboard_m->getDataKaryawan();
            $data['d_total_kar'] = $this->Dashboard_m->jmlDataKar();
            $data['d_total_terima'] = $this->Dashboard_m->jmlDataTerima();
            $data['d_total_tolak'] = $this->Dashboard_m->jmlDataDitolak();

            $this->template->load('templates/index', 'dashboard/index', $data);
        } else {
            redirect('auth');
        }
    }
}
