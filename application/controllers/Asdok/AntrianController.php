<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AntrianController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Antrian', 'Pasien']);
        $this->load->library('form_validation');
        is_login();
        asdok();
    }

    public function index()
    {
        $data = [
            'folder'    => 'antrian',
            'page'      => 'index',
            'title'     => 'Panggil Antrian',
            'antrian'   => $this->Antrian->getAll()->row()
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function panggil($id)
    {
        $antrian = $this->Antrian->getById($id)->row();
        $pasien  = $this->Pasien->getById($antrian->id_pasien)->row();

        $update = [
            'status' => 'selesai'
        ];

        $this->Antrian->update($update, $id);

        if ($pasien->jenis == 'baru') {
            return redirect('asdok/detail/create/' . $antrian->id_pasien);
        } else {
            return redirect('asdok/detail/detail/' . $pasien->id_pasien);
        }
    }
}
