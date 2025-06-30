<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pasien', 'Keluhan']);
        $this->load->library('form_validation');
        is_login();
        asdok();
    }

    public function index()
    {
        $pasien = $this->Pasien->getAll()->result();

        $data = [
            'folder'    => 'pasien',
            'page'      => 'index',
            'title'     => 'Pasien',
            'pasien'    => $pasien
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function keluhan($id)
    {
        $pasien  = $this->Pasien->getById($id)->row()->id_pasien;
        $keluhan = $this->Keluhan->getByPasien($id)->result();

        $data = [
            'folder'    => 'pasien',
            'page'      => 'keluhan',
            'title'     => 'Keluhan',
            'keluhan'   => $keluhan,
            'pasien'    => $pasien
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function keluhanCreate($id)
    {
        $pasien = $this->Pasien->getById($id)->row();

        $data = [
            'folder'    => 'pasien',
            'page'      => 'create_keluhan',
            'title'     => 'Tambah Keluhan',
            'pasien'    => $pasien
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function keluhanStore()
    {
        $post = $this->input->post();
        $id = $this->Keluhan->generateId();

        $data = [
            'id_keluhan'        => $id,
            'id_pasien'         => $post['id'],
            'keterangan'        => $post['keterangan'],
            'riwayat_penyakit'  => $post['riwayat_penyakit'],
            'tanggal_periksa'   => date('Y-m-d'),
        ];

        $update = [
            'modul'    => 'keluhan'
        ];

        $this->Pasien->update($update, $post['id']);
        $this->Keluhan->save($data);
        return redirect('asdok/pasien');
    }
}
