<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Users extends CI_Model
{
    private $table = 'users';

    public function cekEmail($user)
    {
        $this->db->where('email', $user);
        return $this->db->get($this->table);
    }

    public function getById($id)
    {
        $this->db->select('
        users.*, 
        cabang.nama as nama_cabang
    ');
        $this->db->from('users');
        $this->db->join('cabang', 'users.cabang_id = cabang.id', 'left');
        $this->db->where('users.id', $id);
        return $this->db->get()->row_array();
    }


    public function get_all()
    {
        return $this->db->get_where($this->table)->result_array();
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

    public function get_all_admin_cabang()
    {
        $this->db->select('users.*, cabang.nama AS nama_cabang');
        $this->db->from('users');
        $this->db->join('cabang', 'cabang.id = users.cabang_id', 'left');
        $this->db->where('users.role', 'Admin Cabang');

        return $this->db->get()->result_array();
    }
}
