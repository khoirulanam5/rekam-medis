<?php defined('BASEPATH') or exit('No direct script access allowed');

class HargaDokter extends CI_Model
{
    private $_table = 'harga_dokter';

    //select * from kategori
    public function getAll()
    {
        return $this->db->get($this->_table);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_harga_dokter', $id);
        $this->db->update($this->_table, $data);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'HD';
        $kode = $this->db->query("SELECT MAX(id_harga_dokter) LAST_NO FROM harga_dokter WHERE id_harga_dokter LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
