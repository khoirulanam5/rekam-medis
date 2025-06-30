<?php defined('BASEPATH') or exit('No direct script access allowed');

class SuratRujukan extends CI_Model
{
    private $_table = 'surat_rujukan';

    public function get()
    {
        $this->db->select('*');
        $this->db->join('pemeriksaan', 'surat_rujukan.id_periksa = pemeriksaan.id_periksa');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        return $this->db->get($this->_table);
    }
    //
    public function latest()
    {
        $this->db->select('*');
        $this->db->join('pemeriksaan', 'surat_rujukan.id_periksa = pemeriksaan.id_periksa');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        $this->db->order_by('surat_rujukan.tanggal', 'DESC');
        return $this->db->get($this->_table);
    }
    //
    public function first($id)
    {
        $this->db->select('*');
        $this->db->join('pemeriksaan', 'surat_rujukan.id_periksa = pemeriksaan.id_periksa');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        $this->db->where('surat_rujukan.id_surat', $id);
        return $this->db->get($this->_table);
    }
    //
    public function create($data)
    {
        $this->db->insert($this->_table, $data);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'SR';
        $kode = $this->db->query("SELECT MAX(id_surat) LAST_NO FROM surat_rujukan WHERE id_surat LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
