<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RiwayatPemeriksaanController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Pembayaran');
        $this->load->library('form_validation');
        pasien();
    }

    public function index()
    {
        $riwayat = $this->Pembayaran->getByPasien($this->session->userdata('id_pasien'))->result();

        $data = [
            'folder'    => 'riwayat_pemeriksaan',
            'page'      => 'index',
            'title'     => 'Riwayat Pemeriksaan',
            'riwayat'   => $riwayat
        ];

        $this->load->view('pasien/templates/index', $data);
    }
}
