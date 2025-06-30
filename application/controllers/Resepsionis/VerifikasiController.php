<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VerifikasiController extends CI_Controller
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
            'folder'        => 'verifikasi',
            'page'          => 'index',
            'title'         => 'Verifikasi Pasien',
            'verifications' => $this->Pasien->getVerification()->result(),
        ];

        $this->load->view('resepsionis/templates/index', $data);
    }
    //
    public function setujui($id)
    {
        $pasien = $this->Pasien->getById($id)->row();
        $this->Pasien->setujui($id);
        //
        $userkey = 'a859631d94df';
        $passkey = '3f109df052a53eaa3237060a';
        $telpon = $pasien->no_hp;
        $message = 'Hallo ' . $pasien->nama . ', Pendaftaran anda telah disetujui, silahkan login ke aplikasi untuk mengambil antrian anda.'. PHP_EOL;
        $message .= 'Hormat Kami, Klinik Pratama Ben Mari Juwana';
        $url = 'https://console.zenziva.net/wareguler/api/sendWA/';
        $curlHandle = curl_init();
        curl_setopt($curlHandle, CURLOPT_URL, $url);
        curl_setopt($curlHandle, CURLOPT_HEADER, 0);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
        curl_setopt($curlHandle, CURLOPT_POST, 1);
        curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
            'userkey' => $userkey,
            'passkey' => $passkey,
            'to' => $telpon,
            'message' => $message
        ));
        $results = json_decode(curl_exec($curlHandle), true);
        curl_close($curlHandle);
        //
        $this->session->set_flashdata('success', 'Berhasil Disetujui');
        
        redirect('resepsionis/verifikasi');
    }
    //
    public function tolak($id)
    {
        $this->Pasien->tolak($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil ditolak</div>');
        redirect('resepsionis/verifikasi');
    }
}
