<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ObatKeluarController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['ObatKeluar']);
        $this->load->library('form_validation');
        is_login();
        apoteker();
    }

    public function index()
    {
        $obat   = $this->ObatKeluar->getAll()->result();

        $data = [
            'folder'    => 'obat_keluar',
            'page'      => 'index',
            'title'     => 'Data Obat Keluar',
            'obat'      => $obat,
        ];

        $this->load->view('apoteker/templates/index', $data);
    }
}
