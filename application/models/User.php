<?php defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    private $_table = 'user';

    //select * from kategori
    public function getAll()
    {
        $this->db->select('*');
        return $this->db->get_where($this->_table, ['deleted' => 0]);
    }
    
    //simpan data
    public function save($data)
    {
        //INSERT INTO wilayah
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }

    //edit data
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_user' => $id]);
    }

    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_user', $id);
        $this->db->update($this->_table, $data);
    }

    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_user', $id);
        $this->db->update($this->_table, ['deleted' => 1]);
    }

    // generate id
    public function generateId() 
    {
        $unik = 'U';
        $kode = $this->db->query("SELECT MAX(id_user) LAST_NO FROM user WHERE id_user LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 1, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
