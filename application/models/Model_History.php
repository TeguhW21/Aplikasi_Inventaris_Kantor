<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_History extends CI_Model
{
    private $table = 'history_alokasi';

    public function get_all()
    {
        return $this->db->get_where($this->table)->result_array();
    }

    public function get_by_id($id)
    {
        $this->db->select('barang.nama as nama_barang, history_alokasi.*');
        $this->db->from('barang');
        $this->db->join('history_alokasi', 'history_alokasi.barang_id = barang.id', 'left');
        $this->db->where('barang.id', $id);
        $this->db->order_by('history_alokasi.tanggal_alokasi', 'DESC');

        return $this->db->get()->row_array();
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

    public function get_all_by_barangid($barang_id)
    {
        $this->db->select('
        history_alokasi.*,
        users.nama AS nama_user,
        cabang.nama AS nama_cabang,
        gedung.nama AS nama_gedung,
        lantai.nama AS nama_lantai,
        ruangan.nama AS nama_ruangan
    ');
        $this->db->from('history_alokasi');
        $this->db->join('users', 'users.id = history_alokasi.user_id', 'left');
        $this->db->join('cabang', 'cabang.id = history_alokasi.cabang_id', 'left');
        $this->db->join('gedung', 'gedung.id = history_alokasi.gedung_id', 'left');
        $this->db->join('lantai', 'lantai.id = history_alokasi.lantai_id', 'left');
        $this->db->join('ruangan', 'ruangan.id = history_alokasi.ruangan_id', 'left');
        $this->db->where('history_alokasi.barang_id', $barang_id);

        return $this->db->get()->result_array();
    }
}
