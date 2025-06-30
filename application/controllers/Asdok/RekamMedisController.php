<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedisController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['RekamMedis', 'Detail', 'Resep']);
        $this->load->library('form_validation');
        is_login();
        asdok();
    }

    public function index()
    {
        $rekam = $this->RekamMedis->getAll()->result();

        $data = [
            'folder'    => 'rekam_medis',
            'page'      => 'index',
            'title'     => 'Rekam Medis',
            'rekam'     => $rekam,
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function detail($id)
    {
        $rekam       = $this->RekamMedis->getByCode($id)->row();
        $detailRekam = $this->RekamMedis->getByCode($id)->result();
        $detail      = $this->Detail->getById($rekam->id_pasien)->row();
        foreach ($detailRekam as $row) {
            $row->obat = $this->Resep->getByRekam($row->id_rekam_medis)->result();
        }

        $data = [
            'folder'    => 'rekam_medis',
            'page'      => 'detail',
            'title'     => 'Rekam Medis',
            'rekam'     => $rekam,
            'detailRekam' => $detailRekam,
            'detail'    => $detail,
        ];
        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function cetak($id)
    {
        $rekam       = $this->RekamMedis->getByCode($id)->row();
        $detailRekam = $this->RekamMedis->getByCode($id)->result();
        $detail      = $this->Detail->getById($rekam->id_pasien)->row();
        foreach ($detailRekam as $row) {
            $row->obat = $this->Resep->getByRekam($row->id_rekam_medis)->result();
        }

        $data = [
            'title'     => 'Rekam Medis',
            'rekam'     => $rekam,
            'detail'    => $detail,
            'detailRekam' => $detailRekam,
        ];

        $this->load->view('asdok/rekam_medis/cetak', $data);
    }
}
