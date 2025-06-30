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
        pasien();
    }

    public function index()
    {
        $id         = $this->session->userdata('id_pasien');
        $antrian    = $this->Antrian->getByPasien($id)->row();
        $cek        = $this->Antrian->getAktif($id)->num_rows();
        if ($cek == NULL) {
            $data = [
                'folder'    => 'antrian',
                'page'      => 'ambil',
                'title'     => 'Ambil Antrian',
            ];

            $this->load->view('pasien/templates/index', $data);
        } else {
            $data = [
                'folder'    => 'antrian',
                'page'      => 'index',
                'title'     => 'Data Antrian',
                'antrian'   => $antrian
            ];

            $this->load->view('pasien/templates/index', $data);
        }
    }
    //
    public function ambilAntrian()
    {
        $id        = $this->session->userdata('id_pasien');

        $kode = $this->Antrian->getCode();
        $urut = (int) substr($kode->no_antrian ?? '', 2, 4);
        $urut++;
        $char = "KP";
        $kode = $char . sprintf("%04s", $urut);

        $data = [
            'id_antrian' => $this->Antrian->generateId(),
            'id_pasien' => $id,
            'status'    => 'tunggu',
            'no_antrian' => $kode,
            'tanggal'   => date('Y-m-d')
        ];

        $update = [
            'modul'    => 'antrian'
        ];

        $this->Antrian->save($data);
        $this->Pasien->update($update, $id);

        return redirect('pasien/antrian');
    }
}
