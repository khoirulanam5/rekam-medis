<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PasienController extends CI_Controller
{
    //global function
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model(['Pasien', 'Antrian']);
        $this->load->library('form_validation');
        is_login();
        resepsionis();
    }

    public function index()
    {
        $data = [
            'folder'        => 'pasien',
            'page'          => 'index',
            'title'         => 'Data Pasien',
            'pasien'        => $this->Pasien->getAll()->result(),
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function create()
    {
        $data = [
            'folder'        => 'pasien',
            'page'          => 'create',
            'title'         => 'Tambah Pasien',
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function store()
    {
        $post = $this->input->post();
        $id   = $this->Pasien->generateId();

        $data = [
            'id_pasien'  => $id,
            'username'   => $post['username'],
            'password'   => $post['password'],
            'nik'        => $post['nik'],
            'nama'       => $post['nama'],
            'alamat'     => $post['alamat'],
            'no_hp'      => $post['no_hp'],
            'status'     => 'aktif',
            'deleted'    => 0,
        ];

        $this->Pasien->save($data);
        $lastId     = $data['id_pasien'];
        $cek        = $this->Antrian->getAktif($lastId)->num_rows();
        if ($cek == NULL) {
            $kode = $this->Antrian->getCode();
            $urut = (int) substr($kode->no_antrian ?? '', 3, 4);
            $urut++;
            $char = "IBS";
            $kode = $char . sprintf("%04s", $urut);

            $data = [
                'id_pasien' => $lastId,
                'status'    => 'tunggu',
                'no_antrian' => $kode,
                'tanggal'   => date('Y-m-d')
            ];

            $update = [
                'modul'    => 'antrian'
            ];

            $this->Antrian->save($data);
            $this->Pasien->update($update, $lastId);
        }
        $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
        redirect('resepsionis/pasien');
    }
    //
    public function edit($id)
    {
        $data = [
            'folder'        => 'pasien',
            'page'          => 'edit',
            'title'         => 'Edit Pasien',
            'pasien'        => $this->Pasien->getById($id)->row(),
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function update()
    {
        $post = $this->input->post();

        $data = [
            'username'   => $post['username'],
            'nik'        => $post['nik'],
            'nama'       => $post['nama'],
            'alamat'     => $post['alamat'],
            'no_hp'      => $post['no_hp'],
        ];

        $this->Pasien->update($data, $post['id']);
        $this->session->set_flashdata('success', 'Data berhasil diubah');
        redirect('resepsionis/pasien');
    }
    //
    public function delete($id)
    {
        $this->Pasien->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('resepsionis/pasien');
    }
}
