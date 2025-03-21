<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Ruangan extends CI_Model
{
    private $table = 'ruangan';

    public function get_all()
    {
        $this->db->select('ruangan.*, 
                       lantai.nama AS nama_lantai, 
                       gedung.nama AS nama_gedung, 
                       cabang.nama AS nama_cabang');
        $this->db->from('ruangan');
        $this->db->join('lantai', 'lantai.id = ruangan.lantai_id', 'left');
        $this->db->join('gedung', 'gedung.id = lantai.gedung_id', 'left');
        $this->db->join('cabang', 'cabang.id = gedung.cabang_id', 'left');
        return $this->db->get()->result_array();
    }


    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
    public function get_by_lantai($lantai_id)
    {
        return $this->db->get_where($this->table, ['lantai_id' => $lantai_id])->result_array();
    }

    public function get_by_cabang($cabang_id)
    {
        return $this->db->get_where($this->table, ['cabang_id' => $cabang_id])->result_array();
    }
}
