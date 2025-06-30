<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PemeriksaanController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pemeriksaan', 'Keluhan', 'Pasien', 'HasilPemeriksaan']);
        $this->load->library('form_validation');
        is_login();
        asdok();
    }
    public function index()
    {
        $pemeriksaan = $this->Pemeriksaan->getAll()->result();

        $data = [
            'folder'        => 'pemeriksaan',
            'page'          => 'index',
            'title'         => 'Pemeriksaan',
            'pemeriksaan'   => $pemeriksaan,
        ];
        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function create()
    {
        $pasien = $this->Keluhan->getPasienAktif()->result();

        $data = [
            'folder'    => 'pemeriksaan',
            'page'      => 'create',
            'title'     => 'Tambah Data Pemeriksaan',
            'pasien'    => $pasien,
        ];

        $this->load->view('asdok/templates/index', $data);
    }
    //
    public function store()
    {
        $post = $this->input->post();

        $pasien = $this->Keluhan->getById($post['pasien'])->row()->id_pasien;

        if ($post['rawat_inap'] == 'ya') {
            $visit = 0;
            $hari  = 0;
            $update = [
                'modul'        => 'opname'
            ];
        } else {
            $visit = 1;
            $hari  = 0;

            $hasil = $this->HasilPemeriksaan->getById(1)->row();

            if ($post['hasil_pemeriksaan'] == 'sembuh') {
                $total = [
                    'sembuh'    => $hasil->sembuh + 1,
                    'meninggal' => $hasil->meninggal,
                    'dirujuk'   => $hasil->dirujuk,
                ];
            } elseif ($post['hasil_pemeriksaan'] == 'meninggal') {
                $total = [
                    'meninggal' => $hasil->meninggal + 1,
                    'sembuh'    => $hasil->sembuh,
                    'dirujuk'   => $hasil->dirujuk,
                ];
            } else {
                $total = [
                    'dirujuk' => $hasil->dirujuk + 1,
                    'sembuh'    => $hasil->sembuh,
                    'meninggal' => $hasil->meninggal,
                ];
            }

            $this->HasilPemeriksaan->update($total, 1);

            $update = [
                'modul'        => 'periksa'
            ];
        }

        $keluhan = [
            'status'        => 'selesai',
        ];

        $id = $this->Pemeriksaan->generateId();

        $data = [
            'id_periksa'    => $id,
            'id_keluhan'    => $post['pasien'],
            'diagnosa'      => $post['diagnosa'],
            'rawat_inap'    => $post['rawat_inap'],
            'jumlah_visit'  => $visit,
            'jumlah_hari'   => $hari,
            'tindakan_dokter' => $post['tindakan'],
        ];

        $this->Pasien->update($update, $pasien);
        $this->Keluhan->update($keluhan, $post['pasien']);
        $this->Pemeriksaan->save($data);
        $lastId = $data['id_periksa'];

        if ($post['rawat_inap'] == 'ya') {
            $rawat = [
                'id_periksa'        => $lastId,
                'id_kamar'          => $post['kamar'],
                'tgl_masuk'         => date('Y-m-d'),
            ];

            $this->RawatInap->create($rawat);
        }

        if ($post['hasil_pemeriksaan'] == 'dirujuk') {
            return redirect('asdok/surat_rujukan/create/' . $lastId);
        } else {
            return redirect('asdok/pemeriksaan');
        }
    }
}
