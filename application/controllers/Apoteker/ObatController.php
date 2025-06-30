<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ObatController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Obat', 'Kategori']);
        $this->load->library('form_validation');
        is_login();
        apoteker();
    }
    //
    public function index()
    {
        $obat   = $this->Obat->getAll()->result();
        $notif  = $this->Obat->getObatLimit()->result();

        $data = [
            'folder'    => 'obat',
            'page'      => 'index',
            'title'     => 'Data Obat',
            'obat'      => $obat,
            'notif'     => $notif
        ];

        $this->load->view('apoteker/templates/index', $data);
    }
    //
    public function create()
    {
        $kode = $this->Obat->getCode()->row();
        $urut = (int) substr($kode->kode_obat ?? '', 3, 4);
        $urut++;
        $char = "KD";
        $kode = $char . sprintf("%04s", $urut);
        $kategori     = $this->Kategori->getAll()->result();

        $data = [
            'folder'            => 'obat',
            'page'              => 'create',
            'title'             => 'Tambah Obat',
            'kategori'          => $kategori,
            'kode'              => $kode
        ];

        $this->load->view('apoteker/templates/index', $data);
    }
    //
    public function store()
    {
        $id   = $this->Obat->generateId();
        $post = $this->input->post();
        $data = array(
            'id_obat'          => $id,
            'id_kategori'      => $post['kategori'],
            'kode_obat'        => $post['kode_obat'],
            'merk_obat'        => $post['merk_obat'],
            'nama_obat'        => $post['nama_obat'],
            'harga'            => preg_replace("/[^0-9\,]/", "", $post['harga']),
            'stock'            => $post['stock'],
            'expired'         => $post['expired'],
            'deleted'         => 0,
        );

        $this->Obat->save($data);

        redirect(site_url('apoteker/obat'));
    }
    //
    public function edit($id)
    {

        $data = [
            'obat'      =>  $this->Obat->getById($id)->row(),
            'folder'    => 'obat',
            'page'      => 'edit',
            'title'     => 'Edit Data Kategori',
            'kategori'  => $this->Kategori->getAll()->result(),
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
            'id_kategori'      => $post['kategori'],
            'merk_obat'        => $post['merk_obat'],
            'nama_obat'        => $post['nama_obat'],
            'harga'            => preg_replace("/[^0-9\,]/", "", $post['harga']),
            'stock'            => $post['stock'],
            'expired'          => $post['expired'],
        );
        $this->Obat->update($data, $id);
        redirect(site_url('apoteker/obat'));
    }
    //
    public function delete($id)
    {
        $this->Obat->delete($id);
        redirect(site_url('apoteker/obat'));
    }
}
