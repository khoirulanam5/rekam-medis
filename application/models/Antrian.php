<?php defined('BASEPATH') or exit('No direct script access allowed');

class Antrian extends CI_Model
{
    private $_table = 'antrian';
    //
    public function getAll()
    {
        $this->db->select('antrian.*, pasien.nama, pasien.id_pasien');
        $this->db->join('pasien', 'pasien.id_pasien = antrian.id_pasien');
        $this->db->order_by('no_antrian', 'ASC');
        return $this->db->get_where($this->_table, ['antrian.status' => 'tunggu', 'tanggal' => date('Y-m-d')]);
    }
    //
    public function getBelum()
    {
        $this->db->select('antrian.*, pasien.nama, pasien.id_pasien', 'pasien.modul');
        $this->db->join('pasien', 'pasien.id_pasien = antrian.id_pasien');
        $this->db->order_by('no_antrian', 'ASC');
        return $this->db->get_where($this->_table, ['antrian.status' => 'tunggu', 'pasien.modul' => 'antrian']);
    }
    //
    public function getData()
    {
        $this->db->select('*');
        $this->db->select('antrian.status as status_antrian');
        $this->db->join('pasien', 'pasien.id_pasien = antrian.id_pasien');
        $this->db->order_by('antrian.tanggal', 'DESC');
        return $this->db->get($this->_table);
    }
    //
    public function getAktif($id)
    {
        $this->db->select('*');
        $this->db->order_by('no_antrian', 'DESC');
        return $this->db->get_where($this->_table, ['id_pasien' => $id, 'status' => 'tunggu', 'tanggal' => date('Y-m-d')]);
    }
    //
    public function getByPasien($id)
    {
        $this->db->select('*');
        $this->db->select('antrian.status as status_antrian');
        $this->db->join('pasien', 'pasien.id_pasien = antrian.id_pasien');
        $this->db->where('antrian.id_pasien', $id);
        $this->db->order_by('antrian.no_antrian', 'DESC');
        return $this->db->get($this->_table);
    }
    //
    public function getByIdDestroy($id)
    {
        return $this->db->get_where($this->_table, ['id_antrian' => $id]);
    }
    //edit data
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id_antrian' => $id, 'tanggal' => date('Y-m-d')]);
    }
    //update data
    public function update($data, $id)
    {
        // Update data user
        $this->db->where('id_antrian', $id);
        $this->db->update($this->_table, $data);
    }
    //
    public function save($data)
    {
        //INSERT INTO 
        $this->db->insert($this->_table, $data);
        return $this->db->insert_id();
    }
    //
    //get kode
    public function getCode()
    {
        $this->db->select_max('no_antrian');
        return $this->db->get_where($this->_table, ['tanggal' => date('Y-m-d')])->row();
    }
    //destroyAll
    public function destroyAll()
    {
        $this->db->where('status', 'tunggu');
        $this->db->delete($this->_table);
    }
    //
    public function destroy($id)
    {
        $this->db->where('id_antrian', $id);
        $this->db->delete($this->_table);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'A';
        $kode = $this->db->query("SELECT MAX(id_antrian) LAST_NO FROM antrian WHERE id_antrian LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 1, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
