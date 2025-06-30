<?php
function is_login()
{
    $get = get_instance();
    //cek
    if (!$get->session->userdata('id_user')) {
        redirect('/internal');
    }
    //
    function resepsionis()
    {
        $get = get_instance();
        //jika jabatan tidak sesuai kembalikan ke login
        if ($get->session->userdata('jabatan') != 'resepsionis') {
            redirect('/internal');
        }
    }
    //
    function apoteker()
    {
        $get = get_instance();
        //jika jabatan tidak sesuai kembalikan ke login
        if ($get->session->userdata('jabatan') != 'apoteker') {
            redirect('/internal');
        }
    }
    //
    function asdok()
    {
        $get = get_instance();
        //jika jabatan tidak sesuai kembalikan ke login
        if ($get->session->userdata('jabatan') != 'asdok') {
            redirect('/internal');
        }
    }
    //
    function dokter()
    {
        $get = get_instance();
        //jika jabatan tidak sesuai kembalikan ke login
        if ($get->session->userdata('jabatan') != 'dokter') {
            redirect('/internal');
        }
    }
}
function pasien()
{
    $get = get_instance();
    if (!$get->session->userdata('id_pasien')) {
        redirect('/');
    }
}
