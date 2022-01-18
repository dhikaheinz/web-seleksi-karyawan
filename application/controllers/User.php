<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        check_not_login();
        $data['title'] = 'User';
        $data['data_user'] = $this->db->get('user')->result_array();

        $this->template->load('templates/index', 'user/index', $data);
    }

    function tambah()
    {
        $this->db->insert(
            'user',
            [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'nama' => $this->input->post('nama'),
                'address' => $this->input->post('address'),
                'level' => $this->input->post('level'),
            ]
        );
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                User berhasil ditambah</div>');
        redirect('user/index');
    }


    function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            User berhasil diHapus</div>');
        redirect('user/index');
    }

    public function edit($id)
    {
        $this->load->model('user_M');
        $data['edit_user'] = $this->user_M->getId($id);

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('templates/index', 'user/editUser', $data);
        } else {
            $this->user_M->editUser($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Edit Succes</div>');
            redirect('user/index');
        }
    }
}
