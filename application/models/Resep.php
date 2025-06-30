<?php defined('BASEPATH') or exit('No direct script access allowed');

class Resep extends CI_Model
{
    private $_table = 'resep';

    public function getbyRekam($id)
    {
        $this->db->select('*');
        $this->db->join('obat', 'obat.id_obat = resep.id_obat');
        $this->db->where('id_rekam_medis', $id);
        return $this->db->get($this->_table);
    }
    //
    public function getByPeriksa($id)
    {
        $this->db->select('*');
        $this->db->join('obat', 'obat.id_obat = resep.id_obat');
        $this->db->where('id_periksa', $id);
        return $this->db->get($this->_table);
    }
    //
    public function save($data)
    {
        $this->db->insert($this->_table, $data);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_resep', $id);
        $this->db->update($this->_table, $data);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'R';
        $kode = $this->db->query("SELECT MAX(id_resep) LAST_NO FROM resep WHERE id_resep LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 1, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
