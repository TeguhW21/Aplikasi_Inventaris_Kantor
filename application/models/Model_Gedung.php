<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Gedung extends CI_Model
{
    private $table = 'gedung';

    public function get_all()
    {
        $this->db->select('gedung.*, cabang.nama as nama_cabang');
        $this->db->from('gedung');
        $this->db->join('cabang', 'cabang.id = gedung.cabang_id', 'left'); // LEFT JOIN agar tetap menampilkan data meskipun cabang kosong
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

    public function get_by_cabang($cabang_id)
    {
        return $this->db->get_where($this->table, ['cabang_id' => $cabang_id])->result_array();
    }
}
