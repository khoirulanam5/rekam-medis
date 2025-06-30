<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HargaDokterController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('HargaDokter');
        $this->load->library('form_validation');
        is_login();
        asdok();
    }

    public function index()
    {
        $harga = $this->HargaDokter->getAll()->row();

        $data = [
            'folder'    => 'harga_dokter',
            'page'      => 'index',
            'title'     => 'Harga Dokter',
            'harga'     => $harga
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function update()
    {
        $post = $this->input->post();

        $data = [
            'harga'    => preg_replace("/[^0-9\,]/", "", $post['harga']),
        ];

        $this->HargaDokter->update($data, $post['id']);
        return redirect('asdok/harga_dokter');
    }
}
