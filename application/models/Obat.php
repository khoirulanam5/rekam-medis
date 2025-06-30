<?php defined('BASEPATH') or exit('No direct script access allowed');

class Obat extends CI_Model
{
    private $_table = 'obat';

    //select * from kategori
    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori');
        $this->db->order_by('obat.nama_obat', 'asc');
        return $this->db->get_where($this->_table, ['obat.deleted' => 0]);
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
        $this->db->select('*');
        $this->db->join('kategori', 'kategori.id_kategori = obat.id_kategori');
        return $this->db->get_where($this->_table, ['obat.id_obat' => $id]);
    }
    //update data
    public function updateBatch($data, $id)
    {
        // Update data user
        $this->db->where('id_obat', $id);
        $this->db->update_batch($this->_table, $data);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_obat', $id);
        $this->db->update($this->_table, $data);
    }
    //update data
    public function updateAll($update, $id)
    {
        // Update data user
        $this->db->where('id_obat', $id);
        $this->db->update_batch($this->_table, $update);
    }
    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_obat', $id);
        $this->db->update($this->_table, ['deleted' => 1]);
    }
    //get kode
    public function getCode()
    {
        $this->db->select_max('kode_obat');
        return $this->db->get($this->_table);
    }
    //
    public function countData()
    {
        return $this->db->count_all_results($this->_table);
    }
    //
    //select * from kategori
    public function getObat($data)
    {
        $this->db->select('*');
        return $this->db->get_where($this->_table, ['obat.id_obat' => $data]);
    }
    //
    public function getObatLimit()
    {
        $this->db->select('*');
        $this->db->order_by('nama_obat', 'asc');
        $this->db->where('stock <=', 5);
        return $this->db->get_where($this->_table, ['obat.deleted' => 0]);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'OBT';
        $kode = $this->db->query("SELECT MAX(id_obat) LAST_NO FROM obat WHERE id_obat LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 3, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
