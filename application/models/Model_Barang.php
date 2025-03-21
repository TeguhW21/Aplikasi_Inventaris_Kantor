<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Barang extends CI_Model
{
    private $table = 'barang';
    public function get_all_by_cabang($cabang_id = null)
    {
        $this->db->select('
            barang.*, 
            kategori_barang.nama as nama_kategori, 
            cabang.nama as nama_cabang, 
            gedung.nama as nama_gedung, 
            lantai.nama as nama_lantai, 
            ruangan.nama as nama_ruangan, 
            users.nama as nama_user
        ')
            ->from('barang')
            ->join('alokasi_barang', 'barang.id = alokasi_barang.barang_id', 'left')
            ->join('kategori_barang', 'barang.kategori_id = kategori_barang.id', 'left')
            ->join('cabang', 'alokasi_barang.cabang_id = cabang.id', 'left')
            ->join('gedung', 'alokasi_barang.gedung_id = gedung.id', 'left')
            ->join('lantai', 'alokasi_barang.lantai_id = lantai.id', 'left')
            ->join('ruangan', 'alokasi_barang.ruangan_id = ruangan.id', 'left')
            ->join('users', 'alokasi_barang.user_id = users.id', 'left');

        if ($cabang_id) {
            $this->db->where('alokasi_barang.cabang_id', $cabang_id);
        }

        return $this->db->get()->result_array();
    }

    public function get_all()
    {
        return $this->db->select('
            barang.*, 
            kategori_barang.nama as nama_kategori, 
            cabang.nama as nama_cabang, 
            gedung.nama as nama_gedung, 
            lantai.nama as nama_lantai, 
            ruangan.nama as nama_ruangan, 
            users.nama as nama_user
        ')
            ->join('alokasi_barang', 'barang.id = alokasi_barang.barang_id', 'left')
            ->join('kategori_barang', 'barang.kategori_id = kategori_barang.id', 'left')
            ->join('cabang', 'alokasi_barang.cabang_id = cabang.id', 'left')
            ->join('gedung', 'alokasi_barang.gedung_id = gedung.id', 'left')
            ->join('lantai', 'alokasi_barang.lantai_id = lantai.id', 'left')
            ->join('ruangan', 'alokasi_barang.ruangan_id = ruangan.id', 'left')
            ->join('users', 'alokasi_barang.user_id = users.id', 'left')
            ->get('barang')
            ->result_array();
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

    public function get_total_barang($cabang_id = null)
    {
        $this->db->from('barang');

        if ($cabang_id) {
            $this->db->join('alokasi_barang', 'barang.id = alokasi_barang.barang_id', 'left');
            $this->db->where('alokasi_barang.cabang_id', $cabang_id);
        }

        return $this->db->count_all_results();
    }

    public function get_total_barang_rusak($cabang_id = null)
    {
        $this->db->from('barang');
        $this->db->where('kondisi', 'Rusak');

        if ($cabang_id) {
            $this->db->join('alokasi_barang', 'barang.id = alokasi_barang.barang_id', 'left');
            $this->db->where('alokasi_barang.cabang_id', $cabang_id);
        }

        return $this->db->count_all_results();
    }

    public function get_barang_perlu_diperbaiki($cabang_id = null)
    {
        $this->db->from('barang');
        $this->db->where('kondisi', 'Perlu Perbaikan');

        if ($cabang_id) {
            $this->db->join('alokasi_barang', 'barang.id = alokasi_barang.barang_id', 'left');
            $this->db->where('alokasi_barang.cabang_id', $cabang_id);
        }

        return $this->db->count_all_results();
    }

    public function get_barang_belum_dialokasikan($cabang_id = null)
    {
        $this->db->select('COUNT(barang.id) AS jumlah_belum_dialokasikan');
        $this->db->from('barang');
        $this->db->join('alokasi_barang', 'barang.id = alokasi_barang.barang_id', 'left');
        $this->db->where('alokasi_barang.barang_id IS NULL');

        if ($cabang_id) {
            $this->db->where('alokasi_barang.cabang_id', $cabang_id);
        }

        $query = $this->db->get();
        return $query->row()->jumlah_belum_dialokasikan;
    }
}
