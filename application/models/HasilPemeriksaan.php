<?php defined('BASEPATH') or exit('No direct script access allowed');

class HasilPemeriksaan extends CI_Model
{
    private $_table = 'hasil_pemeriksaan';

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_hasil_pemeriksaan' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_hasil_pemeriksaan', $id);
        $this->db->update($this->_table, $data);
    }
    //
    public function getAll()
    {
        return $this->db->get($this->_table);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'HP';
        $kode = $this->db->query("SELECT MAX(id_hasil_pemeriksaan) LAST_NO FROM hasil_pemeriksaan WHERE id_hasil_pemeriksaan LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
