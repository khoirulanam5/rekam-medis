<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Model
{
    private $_table = 'pembayaran';

    //
    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = pembayaran.id_pasien');
        return $this->db->get($this->_table);
    }

    public function save($data)
    {
        //INSERT INTO wilayah
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    //
    public function getByPasien($id)
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = pembayaran.id_pasien');
        $this->db->join('rekam_medis', 'rekam_medis.id_rekam_medis = pembayaran.id_rekam_medis');
        $this->db->join('pemeriksaan', 'pemeriksaan.id_periksa = rekam_medis.id_periksa');
        $this->db->where('pasien.id_pasien', $id);
        return $this->db->get($this->_table);
    }
    //
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->join('rekam_medis', 'rekam_medis.id_rekam_medis = pembayaran.id_rekam_medis');
        $this->db->join('pemeriksaan', 'pemeriksaan.id_periksa = rekam_medis.id_periksa');
        $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->where('pembayaran.id_pembayaran', $id);
        return $this->db->get($this->_table);
    }
    //get kode
    public function getCode()
    {
        $this->db->select_max('kode_pembayaran');
        return $this->db->get($this->_table);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'BYR';
        $kode = $this->db->query("SELECT MAX(id_pembayaran) LAST_NO FROM pembayaran WHERE id_pembayaran LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 3, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
