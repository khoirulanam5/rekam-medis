<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Model
{
    private $_table = 'pasien';

    //select * from kategori
    public function getAll()
    {
        $this->db->select('*');
        return $this->db->get_where($this->_table, ['deleted' => 0]);
    }
    //
    public function getVerification()
    {
        $this->db->select('*');
        return $this->db->get_where($this->_table, ['deleted' => 0, 'status' => 'verifikasi']);
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
        return $this->db->get_where($this->_table, ['id_pasien' => $id]);
    }
    //
    public function setujui($id)
    {
        $this->db->set('status', 'aktif');
        $this->db->where('id_pasien', $id);
        $this->db->update($this->_table);
    }
    //
    public function tolak($id)
    {
        $this->db->delete($this->_table, ['id_pasien' => $id]);
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

    public function getNoAntrian()
    {
        $this->db->select('*');
        return $this->db->get_where($this->_table, ['deleted' => 0, 'modul' => 'selesai']);
    }
    //
    public function destroyAntrian()
    {
        $this->db->where('modul', 'antrian');
        $this->db->update($this->_table, ['modul' => 'selesai']);
    }
    // generate id
    public function generateId() 
    {
        $unik = 'P';
        $kode = $this->db->query("SELECT MAX(id_pasien) LAST_NO FROM pasien WHERE id_pasien LIKE '".$unik."%'")->row()->LAST_NO;
        $urutan = (int) substr($kode, 1, 3);
        $urutan++;
        $huruf = $unik;
        $kode = $huruf . sprintf("%03s", $urutan);
        return $kode;
    }
}
