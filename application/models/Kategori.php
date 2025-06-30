<?php defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Model
{
    private $_table = 'kategori';

    //select * from kategori
    public function getAll()
    {
        return $this->db->get_where($this->_table, ['deleted' => 0]);
    }

    public function save($data)
    {
        //INSERT INTO wilayah
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    //edit data
    public function getById($id)
    {
        //GET edit data ke form
        return $this->db->get_where($this->_table, ['id_kategori' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_kategori', $id);
        $this->db->update($this->_table, $data);
    }
    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_kategori', $id);
        $this->db->update($this->_table, ['deleted' => 1]);
    }
    //
    public function countData()
    {
        return $this->db->count_all_results($this->_table);
    }

    // generate id
    public function generateId() 
    {
        $unik = 'K';
        $kode = $this->db->query("SELECT MAX(id_kategori) LAST_NO FROM kategori WHERE id_kategori LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 1, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
