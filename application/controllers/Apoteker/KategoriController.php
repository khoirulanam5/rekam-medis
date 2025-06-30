<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Kategori');
        $this->load->library('form_validation');
        is_login();
        apoteker();
    }
    //
    public function index()
    {
        $kategori = $this->Kategori->getAll()->result();

        $data = [
            'folder'    => 'kategori',
            'page'      => 'index',
            'title'     => 'Data Kategori',
            'kategori'  => $kategori
        ];

        $this->load->view('apoteker/templates/index', $data);
    }
    //
    public function create()
    {
        $data = [
            'folder'            => 'kategori',
            'page'              => 'create',
            'title'             => 'Tambah Kategori',
        ];

        $this->load->view('apoteker/templates/index', $data);
    }
    //
    public function store()
    {
        $id = $this->Kategori->generateId();
        $post = $this->input->post();
        $data = array(
            'id_kategori'   => $id,
            'nama_kategori' => ucwords($post['nama_kategori']),
            'deleted'       => 0,
        );

        $this->Kategori->save($data);

        redirect(site_url('apoteker/kategori'));
    }
    //
    public function edit($id)
    {
        $data = [
            'kategori'   =>  $this->Kategori->getById($id)->row(),
            'folder'     => 'kategori',
            'page'       => 'edit',
            'title'      => 'Edit Data Kategori'
        ];

        $this->load->view('apoteker/templates/index', $data);
    }
    //
    public function update()
    {
        //ambil data dari form
        $post = $this->input->post();
        $id = $post['id'];
        $data = array(
            'nama_kategori' => ucwords($post['nama_kategori']),
            'deleted'       => 0,
        );
        $this->Kategori->update($data, $id);
        redirect(site_url('apoteker/kategori'));
    }
    //
    public function delete($id)
    {
        $this->Kategori->delete($id);
        redirect(site_url('apoteker/kategori'));
    }
}
