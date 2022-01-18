<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
            redirect('dashboard');
        $this->load->view('auth/login');
    }
    function proses()
    {
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {

            $this->load->model('auth_m');
            $query = $this->auth_m->login($post);

            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = [
                    'authenticated' => true,
                    'id'  => $row->username,
                    'nama' => $row->nama
                ];
                $this->session->set_userdata($params);
                echo "<script>
                    alert('Login Berhasil');
                </script>";
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                   Login Gagal!</div>');
                redirect('Auth');
            }
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth');
    }
}
