<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthPasien extends CI_Controller
{
    //
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Pasien');
        $this->load->library('form_validation');
    }
    //
    public function index()
    {
        //cek jabatan
        $session = $this->session->userdata('id_pasien');
        if ($session == true) {
            redirect('pasien/dashboard');
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required', array('trim' => '', 'required' => 'Username wajib diisi.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required', array('trim' => '', 'required' => 'Password wajib diisi.'));

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('auth/login_pasien', $data);
        } else {
            //validasi sukses
            $this->_login();
        }
    }



    private function _login()
{
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    // SELECT * FROM pasien WHERE username = username AND status = 'aktif'
    $user = $this->db->get_where('pasien', ['username' => $username, 'password' => $password, 'status' => 'aktif'])->row_array();

    if ($user) {
        // jika user ada
        $data = [
            'id_pasien' => $user['id_pasien'],
            'username'  => $user['username'],
            'nama'      => $user['nama'],
            'alamat'    => $user['alamat'],
            'no_hp'     => $user['no_hp']
        ];
        $this->session->set_userdata($data);
        redirect('pasien/dashboard');
    } else {
        $this->session->set_flashdata('belum', 'Username belum terdaftar');
        redirect('/AuthPasien');
    }
}


    public function registerForm()
    {
        $data['title'] = 'Register';
        $this->load->view('auth/register_pasien', $data);
    }
    //
    public function register()
    {
        $post = $this->input->post();
        $id = $this->Pasien->generateId();

        // Validasi NIK harus 16 digit angka
        if (!preg_match('/^\d{16}$/', $post['nik'])) {
            $this->session->set_flashdata('error', 'NIK harus terdiri dari 16 digit angka.');
            return redirect('/AuthPasien/registerForm'); // Ganti dengan route halaman form jika berbeda
        }

        $data = [
            'id_pasien'           => $id,
            'username'            => $post['username'],
            'password'            => $post['password'],
            'nik'                 => $post['nik'],
            'nama'                => ucwords($post['nama']),
            'alamat'              => $post['alamat'],
            'no_hp'               => $post['no_hp'],
            'status'              => 'verifikasi',
            'deleted'             => 0,
        ];

        $this->Pasien->save($data);
        //
        $this->session->set_flashdata('sukses', 'Pendaftaran berhasil, Resepsionis akan memverifikasi akun anda agar bisa login ke aplikasi');
        return redirect('/AuthPasien');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }
}
