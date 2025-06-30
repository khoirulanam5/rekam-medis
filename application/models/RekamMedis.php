<?php defined('BASEPATH') or exit('No direct script access allowed');

class RekamMedis extends CI_Model
{
    private $_table = 'rekam_medis';

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->group_by('rekam_medis.no_rekam');
        $this->db->order_by('no_rekam', 'ASC');
        return $this->db->get($this->_table);
    }
    //
    public function getPembayaran()
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('pemeriksaan', 'pemeriksaan.id_periksa = rekam_medis.id_periksa');
        $this->db->where('rekam_medis.status', 'proses');
        return $this->db->get_where($this->_table, ['pasien.modul' => 'pembayaran']);
    }
    //
    public function getById($id)
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('pemeriksaan', 'pemeriksaan.id_periksa = rekam_medis.id_periksa');
        $this->db->join('keluhan', 'keluhan.id_keluhan = pemeriksaan.id_keluhan');
        $this->db->where('id_rekam_medis', $id);
        return $this->db->get($this->_table);
    }
    //
    public function getByPasien($id)
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->where('rekam_medis.id_pasien', $id);
        return $this->db->get($this->_table);
    }
    //
    public function getByCode($id)
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->join('pemeriksaan', 'pemeriksaan.id_periksa = rekam_medis.id_periksa');
        $this->db->join('keluhan', 'keluhan.id_keluhan = pemeriksaan.id_keluhan');
        $this->db->where('rekam_medis.no_rekam', $id);
        return $this->db->get($this->_table);
    }
    //
    public function save($data)
    {
        //INSERT INTO wilayah
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    //
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_rekam_medis', $id);
        $this->db->update($this->_table, $data);
    }
    //get kode
    public function getCode()
    {
        $this->db->select_max('no_rekam');
        return $this->db->get($this->_table);
    }
    //get antrian
    public function getAntrian()
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = rekam_medis.id_pasien');
        $this->db->where('pasien.modul', 'selesai');
        $this->db->order_by('no_rekam', 'ASC');
        $this->db->group_by('rekam_medis.no_rekam');
        return $this->db->get($this->_table);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'RM';
        $kode = $this->db->query("SELECT MAX(id_rekam_medis) LAST_NO FROM rekam_medis WHERE id_rekam_medis LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
