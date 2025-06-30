<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuratRujukanController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pemeriksaan', 'SuratRujukan', 'Detail']);
        $this->load->library('form_validation');
        is_login();
        asdok();
    }

    public function index()
    {
        $surat = $this->SuratRujukan->latest()->result();

        $data = [
            'folder'    => 'surat_rujukan',
            'page'      => 'index',
            'title'     => 'Surat Rujukan',
            'surat'     => $surat,
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function create($id)
    {
        $pemeriksaan = $this->Pemeriksaan->getById($id)->row();
        $pasien      = $this->Detail->getById($pemeriksaan->id_pasien)->row();

        $data = [
            'folder'        => 'surat_rujukan',
            'page'          => 'create',
            'title'         => 'Tambah Data Surat Rujukan',
            'pemeriksaan'   => $pemeriksaan,
            'pasien'        => $pasien
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function store()
    {
        $post = $this->input->post();
        $id   = $this->SuratRujukan->generateId();

        $data = [
            'id_surat'      => $id,
            'id_periksa'    => $post['id_periksa'],
            'id_pasien'     => $post['id_pasien'],
            'no_surat'      => $post['no_surat'],
            'rumah_sakit'   => $post['rumah_sakit'],
            'tanggal'       => date('Y-m-d'),
        ];

        $this->SuratRujukan->create($data);

        return redirect('asdok/surat_rujukan');
    }
    //
    public function print($id)
    {
        $surat = $this->SuratRujukan->first($id)->row();

        $data = [
            'surat'     => $surat,
            'title'     => 'Print Surat Rujukan - ' . $surat->no_surat,
        ];

        $this->load->view('asdok/surat_rujukan/print', $data);
    }
}
