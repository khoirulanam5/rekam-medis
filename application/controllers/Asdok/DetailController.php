<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DetailController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pasien', 'Detail']);
        $this->load->library('form_validation');
        is_login();
        asdok();
    }

    public function create($id)
    {
        $pasien = $this->Pasien->getById($id)->row();

        $data = [
            'folder'    => 'detail',
            'page'      => 'create',
            'title'     => 'Tambah Data Pasien',
            'pasien'    => $pasien
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function store()
    {
        $post = $this->input->post();
        $id   = $this->Detail->generateId();

        $data = [
            'id_detail'     => $id,
            'id_pasien'     => $post['id'],
            'tgl_lahir'     => $post['tgl_lahir'],
            'jekel'         => $post['jekel'],
            'pekerjaan'     => $post['pekerjaan'],
            'bb'            => $post['bb'],
            'tb'            => $post['tb'],
        ];

        $update = [
            'jenis' => 'lama'
        ];

        $this->Pasien->update($update, $post['id']);
        $this->Detail->save($data);
        return redirect('asdok/pasien/keluhan/create/' . $post['id']);
    }
    //
    public function detail($id)
    {
        $pasien = $this->Detail->getByPasien($id)->row();

        $data = [
            'folder'    => 'detail',
            'page'      => 'detail',
            'title'     => 'Detail Data Pasien',
            'pasien'    => $pasien
        ];

        $this->load->view('asdok/templates/index', $data);
    }
}
