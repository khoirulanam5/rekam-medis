<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['User']);
        $this->load->library('form_validation');
        is_login();
        resepsionis();
    }

    public function index()
    {
        $data = [
            'folder'        => 'user',
            'page'          => 'index',
            'title'         => 'Data User',
            'user'        => $this->User->getAll()->result(),
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function create()
    {
        $data = [
            'folder'        => 'user',
            'page'          => 'create',
            'title'         => 'Tambah User',
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function store()
    {
        $id = $this->User->generateId();
        $post = $this->input->post();

        $data = [
            'id_user'    => $id,
            'username'   => $post['username'],
            'password'   => $post['password'],
            'nama'        => $post['nama'],
            'alamat'     => $post['alamat'],
            'no_hp'      => $post['no_hp'],
            'jabatan'      => $post['jabatan'],
            'avatar'      => '',
            'deleted'    => 0,
        ];

        $this->User->save($data);

        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('resepsionis/user');
    }
    //
    public function edit($id)
    {
        $data = [
            'folder'        => 'user',
            'page'          => 'edit',
            'title'         => 'Edit User',
            'user'        => $this->User->getById($id)->row(),
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function update()
    {
        $post = $this->input->post();

        $data = [
            'username'   => $post['username'],
            'password'   => $post['password'],
            'nama'       => $post['nama'],
            'alamat'     => $post['alamat'],
            'no_hp'      => $post['no_hp'],
            'jabatan'    => $post['jabatan'],
        ];

        $this->User->update($data, $post['id']);
        $this->session->set_flashdata('success', 'Data berhasil diubah');
        redirect('resepsionis/user');
    }
    //
    public function delete($id)
    {
        $this->User->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('resepsionis/user');
    }
}
