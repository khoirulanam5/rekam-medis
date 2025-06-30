<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['HasilPemeriksaan']);
        $this->load->library('form_validation');
        is_login();
        dokter();
    }

    public function index()
    {
        $hasil      = $this->HasilPemeriksaan->getAll()->row();
        $evaluasi   = $this->HasilPemeriksaan->getAll()->result();

        $data = [
            'folder'    => 'dashboard',
            'page'      => 'index',
            'title'     => 'Dashboard',
            'hasil'     => $hasil,
            'evaluasi'  => $evaluasi
        ];

        $this->load->view('dokter/templates/index', $data);
    }
}
