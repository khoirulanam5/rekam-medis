<?php defined('BASEPATH') or exit('No direct script access allowed');

class ObatKeluar extends CI_Model
{
    private $_table = 'obat_keluar';

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('obat', 'obat.id_obat = obat_keluar.id_obat');
        $this->db->order_by('obat_keluar.tanggal_keluar', 'DESC');
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
        $unik = 'OK';
        $kode = $this->db->query("SELECT MAX(id_obat_keluar) LAST_NO FROM obat_keluar WHERE id_obat_keluar LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
