<?php defined('BASEPATH') or exit('No direct script access allowed');

class Keluhan extends CI_Model
{
    private $_table = 'keluhan';

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = keluhan.id_pasien');
        $this->db->group_by('DAY(tanggal)');
        return $this->db->get($this->_table);
    }
    //
    public function getByPasien($id)
    {
        $this->db->select('*');
        $this->db->where('id_pasien', $id);
        $this->db->order_by('tanggal_periksa', 'DESC');
        return $this->db->get($this->_table);
    }
    //
    public function getPasienAktif()
    {
        $this->db->select('*');
        $this->db->join('pasien', 'pasien.id_pasien = keluhan.id_pasien');
        $this->db->where('keluhan.status', 'proses');
        $this->db->where('pasien.modul', 'keluhan');
        return $this->db->get($this->_table);
    }
    //
    public function save($data)
    {
        //INSERT INTO wilayah
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    //edit data
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_keluhan' => $id]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_keluhan', $id);
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
        $unik = 'KLH';
        $kode = $this->db->query("SELECT MAX(id_keluhan) LAST_NO FROM keluhan WHERE id_keluhan LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 3, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
