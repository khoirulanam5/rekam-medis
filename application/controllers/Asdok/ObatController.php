<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ObatController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pemeriksaan', 'Obat', 'HargaDokter', 'Pasien', 'RekamMedis', 'Resep', 'ObatKeluar']);
        $this->load->library('form_validation');
        is_login();
        asdok();
    }

    public function index()
    {
        $pasien = $this->Pemeriksaan->getByPeriksa()->result();
        $obat   = $this->Obat->getAll()->result();

        $data = [
            'folder'    => 'resep',
            'page'      => 'index',
            'title'     => 'Buat Resep',
            'pasien'    => $pasien,
            'obat'      => $obat,
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function store()
    {
        $id         = $this->RekamMedis->generateId();
        $post       = $this->input->post();
        $pasien     = $this->Pemeriksaan->getById($post['pasien'])->row();
        //
        $kode = $this->RekamMedis->getCode()->row();
        $urut = (int) substr($kode->no_rekam ?? '', 3, 4);
        $urut++;
        $char = "IBN";
        $kode = $char . sprintf("%04s", $urut);
        //
        $cekRekam = $this->RekamMedis->getByPasien($pasien->id_pasien)->row();
        if ($cekRekam) {
            $kd = $cekRekam->no_rekam;
        } else {
            $kd = $kode;
        }
        //
        $data = [
            'id_rekam_medis' => $id,
            'id_periksa'    => $post['pasien'],
            'id_pasien'     => $pasien->id_pasien,
            'no_rekam'      => $kd,
            'harga_opname'  => 0,
            'harga_dokter'  => $this->HargaDokter->getAll()->row()->harga,
            'harga_obat'    => $post['total_obat'],
            'harga_tindakan' => 0,
        ];

        $this->RekamMedis->save($data);
        $lastid = $this->db->insert_id();

        $count = count($post['obat']);

        for ($i = 0; $i < $count; $i++) {
            $cek = $this->Obat->getById($post['obat'][$i])->row();
            if ($cek->stock < 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok obat ' . $cek->nama_obat . ' kurang</div>');
                redirect('asdok/obat');
            } else {
                $stok = $cek->stock - 1;
                $id_keluar   = $this->ObatKeluar->generateId();
                $id_resep    = $this->Resep->generateId();
                //
                $keluar = [
                    'id_obat_keluar'   => $id_keluar,
                    'id_obat'          => $post['obat'][$i],
                    'jumlah'           => 1,
                    'tanggal_keluar'   => date('Y-m-d'),
                ];

                $this->ObatKeluar->create($keluar);
                //
                $dd = [
                    'id_resep'      => $id_resep,
                    'id_periksa'    => $post['pasien'],
                    'id_rekam_medis' => $lastid,
                    'id_obat'        => $post['obat'][$i],
                    'harga'          => $cek->harga,
                    'takaran'        => $post['takaran'][$i],
                    'jumlah'         => 1,
                ];
                $this->Resep->save($dd);
                $this->Obat->update(['stock' => $stok], $post['obat'][$i]);
            }
        }
        $this->Pasien->update(['modul' => 'pembayaran'], $pasien->id_pasien);
        $this->Pemeriksaan->updatePeriksa(['status' => 'selesai'], $post['pasien']);
        return redirect('asdok/rekam_medis');
    }
}
