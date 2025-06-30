<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    //
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    //
    public function index()
    {
        //cek jabatan
        $session = $this->session->userdata('jabatan');
        if ($session == 'resepsionis') {
            redirect('resepsionis/dashboard');
        } elseif ($session == 'apoteker') {
            redirect('apoteker/dashboard');
        } elseif ($session == 'asdok') {
            redirect('asdok/dashboard');
        } elseif ($session == 'dokter') {
            redirect('dokter/dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required', array('trim' => '', 'required' => 'Username wajib diisi.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required', array('trim' => '', 'required' => 'Password wajib diisi.'));

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Internal';
            $this->load->view('auth/login', $data);
        } else {
            //validasi sukses
            $this->_login();
        }
    }
    private function _login()
{
    $username = $this->input->post('username');
    $user = $this->db->get_where('user', ['username' => $username])->row_array();

    if ($user) {
        if ($user['deleted'] == 0) {
            // jika user ada
            $data = [
                'id_user'     => $user['id_user'],
                'username'    => $user['username'],
                'nama'        => $user['nama'],
                'jabatan'     => $user['jabatan'],
                'alamat'      => $user['alamat'],
                'no_hp'       => $user['no_hp'],
                'avatar'      => $user['avatar'],
            ];

            $this->session->set_userdata($data);
            $session = $this->session->userdata('jabatan');
            if ($session == 'resepsionis') {
                redirect('resepsionis/dashboard');
            } elseif ($session == 'apoteker') {
                redirect('apoteker/dashboard');
            } elseif ($session == 'asdok') {
                redirect('asdok/dashboard');
            } elseif ($session == 'dokter') {
                redirect('dokter/dashboard');
            }
        } else {
            $this->session->set_flashdata('tdk', 'Maaf akun anda sudah tidak aktif');
            redirect('/internal');
        }
    } else {
        $this->session->set_flashdata('belum', 'Username belum terdaftar');
        redirect('/internal');
    }
}


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/internal');
    }
}
