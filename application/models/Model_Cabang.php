<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Cabang extends CI_Model
{
    private $table = 'cabang';

    public function get_all()
    {
        return $this->db->get_where($this->table)->result_array();
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
}
