<?php defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Model
{
    private $_table = 'detail';

    public function getByPasien($id)
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = detail.id_pasien');
        $this->db->where('detail.id_pasien', $id);
        return $this->db->get($this->_table);
    }
    //
    public function save($data)
    {
        $this->db->insert($this->_table, $data);
        return $data['id_pasien']; 
    }    
    //edit data
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_pasien' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_pasien', $id);
        $this->db->update($this->_table, $data);
    }

    //delete
    public function delete($id)
    {
        //Soft delete
        $this->db->where('id_pasien', $id);
        $this->db->update($this->_table, ['deleted' => 1]);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'DT';
        $kode = $this->db->query("SELECT MAX(id_detail) LAST_NO FROM detail WHERE id_detail LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 2, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
