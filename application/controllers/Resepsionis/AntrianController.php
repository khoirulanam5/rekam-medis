<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AntrianController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Antrian', 'Pasien', 'RekamMedis']);
        $this->load->library('form_validation');
        is_login();
        resepsionis();
    }

    public function index()
    {
        $data = [
            'folder'    => 'antrian',
            'page'      => 'index',
            'title'     => 'Data Antrian',
            'antrians'  => $this->Antrian->getData()->result(),
            'belum'     => $this->Antrian->getBelum()->result(),
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function create()
    {
        $pasien = $this->RekamMedis->getAntrian()->result();

        $data = [
            'folder'    => 'antrian',
            'page'      => 'create',
            'title'     => 'Tambah Data Antrian',
            'pasiens'   => $pasien,
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function store()
    {
        $post = $this->input->post();
        $kode = $this->Antrian->getCode();
        $urut = (int) substr($kode->no_antrian ?? '', 3, 4);
        $urut++;
        $char = "IBS";
        $kode = $char . sprintf("%04s", $urut);

        $data = [
            'id_pasien' => $post['pasien'],
            'status'    => 'tunggu',
            'no_antrian' => $kode,
            'tanggal'   => date('Y-m-d')
        ];

        $update = [
            'modul'    => 'antrian'
        ];

        $this->Antrian->save($data);
        $this->Pasien->update($update, $post['pasien']);

        $this->session->set_flashdata('success', 'Data berhasil disimpan');
        redirect('resepsionis/antrian');
    }
    //
    public function destroy($id)
    {
        $pasien = $this->Antrian->getById($id)->row()->id_pasien;
        $this->Pasien->update(['modul' => 'selesai'], $pasien);
        $this->Antrian->destroy($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('resepsionis/antrian');
    }
    //
    public function destroyAll()
    {
        $this->Antrian->destroyAll();
        $this->Pasien->destroyAntrian();
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('resepsionis/antrian');
    }
}
