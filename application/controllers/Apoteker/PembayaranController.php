<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['RekamMedis', 'Pembayaran', 'Resep', 'Pasien', 'HargaDokter']);
        $this->load->library('form_validation');
        is_login();
        apoteker();
    }

    public function index()
    {
        $pembayaran = $this->RekamMedis->getPembayaran()->result();

        $data = [
            'folder'    => 'pembayaran',
            'page'      => 'index',
            'title'     => 'Pembayaran',
            'pembayaran' => $pembayaran
        ];

        $this->load->view('apoteker/templates/index', $data);
    }
    //
    public function detail($id)
    {
        $pembayaran = $this->RekamMedis->getById($id)->row();
        $resep      = $this->Resep->getByRekam($pembayaran->id_rekam_medis)->result();
        $dokter     = $this->HargaDokter->getAll()->row();
        //
        $kode = $this->Pembayaran->getCode()->row();
        $urut = (int) substr($kode->kode_pembayaran ?? '', 3, 4);
        $urut++;
        $char = "IS";
        $kode = $char . sprintf("%04s", $urut);
        //
        $data = [
            'folder'    => 'pembayaran',
            'page'      => 'detail',
            'title'     => 'Pembayaran',
            'pembayaran' => $pembayaran,
            'kode'      => $kode,
            'resep'     => $resep,
            'dokter'    => $dokter

        ];
        $this->load->view('apoteker/templates/index', $data);
    }
    //
    public function store()
    {
        $post   = $this->input->post();
        $id     = $this->Pembayaran->generateId();
        $cek    = $this->RekamMedis->getById($post['id'])->row();

        $data = [
            'id_pembayaran'         => $id,
            'id_rekam_medis'        => $post['id'],
            'id_pasien'             => $post['id_pasien'],
            'kode_pembayaran'       => $post['kode'],
            'jumlah_pembayaran'     => preg_replace('/[^0-9]/', '', $post['jumlah_pembayaran']),
            'tanggal'               => date('Y-m-d'),
        ];

        $update = [
            'modul' => 'selesai'
        ];

        $updateRekam = [
            'status' => 'selesai'
        ];

        $this->Pasien->update($update, $post['id_pasien']);
        $this->Pembayaran->save($data);
        $this->RekamMedis->update($updateRekam, $post['id']);
        $this->session->set_flashdata('success', 'Pembayaran berhasil ditambahkan');
        redirect('apoteker/pembayaran');
    }
}
