<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RiwayatPembayaranController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pembayaran', 'Resep']);
        $this->load->library('form_validation');
        is_login();
        apoteker();
    }

    public function index()
    {
        $riwayat = $this->Pembayaran->getAll()->result();

        $data = [
            'folder'    => 'riwayat_pembayaran',
            'page'      => 'index',
            'title'     => 'Riwayat Pembayaran',
            'riwayat'   => $riwayat
        ];

        $this->load->view('apoteker/templates/index', $data);
    }
    //
    public function cetak($id)
    {
        $pembayaran     = $this->Pembayaran->getById($id)->row();
        $idPeriksa      = $pembayaran->id_periksa;
        $resep          = $this->Resep->getByPeriksa($idPeriksa)->result();
        //
        $data = [
            'pembayaran' => $pembayaran,
            'resep'      => $resep,
            'title'      => 'Cetak Pembayaran Pasien',
        ];

        $this->load->view('apoteker/riwayat_pembayaran/cetak', $data);
    }
}
