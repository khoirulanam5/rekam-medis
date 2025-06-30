
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RawatJalanController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pemeriksaan']);
        $this->load->library('form_validation');
        is_login();
        resepsionis();
    }

    public function index()
    {
        $data = [
            'folder'        => 'rawat_jalan',
            'page'          => 'index',
            'title'         => 'Data Rawat Jalan',
            'rawat'         => $this->Pemeriksaan->getRawatJalan()->result(),
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
}
