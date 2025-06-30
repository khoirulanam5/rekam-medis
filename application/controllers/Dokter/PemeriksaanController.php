<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemeriksaanController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pemeriksaan', 'Keluhan', 'Pasien']);
        $this->load->library('form_validation');
        is_login();
        dokter();
    }
    public function index()
    {
        $pemeriksaan = $this->Pemeriksaan->getAll()->result();

        $data = [
            'folder'        => 'pemeriksaan',
            'page'          => 'index',
            'title'         => 'Pemeriksaan',
            'pemeriksaan'   => $pemeriksaan,
        ];
        $this->load->view('dokter/templates/index', $data);
    }
}
