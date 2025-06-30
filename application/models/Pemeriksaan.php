<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan extends CI_Model
{
    private $_table = 'pemeriksaan';

    public function getAll()
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
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
    public function getByPeriksa()
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        $this->db->where('pasien.modul', 'periksa');
        $this->db->where('pemeriksaan.status', 'proses');
        return $this->db->get($this->_table);
    }
    //opname
    public function getByOpname()
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        $this->db->where('pasien.modul', 'opname');
        $this->db->where('pemeriksaan.status', 'proses');
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
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        return $this->db->get_where($this->_table, ['id_periksa' => $id]);
    }
    //
    public function updatePeriksa($data, $id)
    {
        // Update data user
        $this->db->where('id_periksa', $id);
        $this->db->update($this->_table, $data);
    }
    //
    public function updatePemeriksaan($data, $id)
    {
        // Update data user
        $this->db->where('id_periksa', $id);
        $this->db->update($this->_table, $data);
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

    //rawat inap
    public function getRawatInap()
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        $this->db->where('pemeriksaan.rawat_inap', 'ya');
        return $this->db->get($this->_table);
    }

    //rawat jalan
    public function getRawatJalan()
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        $this->db->where('pemeriksaan.rawat_inap', 'tidak');
        return $this->db->get($this->_table);
    }
    //
    public function withPasien($id)
    {
        $this->db->select('*');
        $this->db->join('keluhan', 'pemeriksaan.id_keluhan = keluhan.id_keluhan');
        $this->db->join('pasien', 'keluhan.id_pasien = pasien.id_pasien');
        $this->db->where('pemeriksaan.id_periksa', $id);
        return $this->db->get($this->_table);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'PMK';
        $kode = $this->db->query("SELECT MAX(id_periksa) LAST_NO FROM pemeriksaan WHERE id_periksa LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 3, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
