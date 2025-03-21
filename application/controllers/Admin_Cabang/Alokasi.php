<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alokasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Barang');
        $this->load->model('Model_Alokasi');
        $this->load->model('Model_History');
        $this->load->model('Model_Cabang');
        $this->load->model('Model_Gedung');
        $this->load->model('Model_Lantai');
        $this->load->model('Model_Ruangan');
        $this->load->model('Model_Users');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function get_gedung_by_cabang()
    {
        $cabang_id = $this->input->post('cabang_id');
        $gedung = $this->Model_Gedung->get_by_cabang($cabang_id);

        echo json_encode($gedung);
    }

    public function get_lantai_by_gedung()
    {
        $gedung_id = $this->input->post('gedung_id');
        $lantai = $this->Model_Lantai->getLantaiByGedung($gedung_id);

        echo json_encode($lantai);
    }

    public function get_ruangan_by_lantai()
    {

        $lantai_id = $this->input->post('lantai_id');
        $ruangan = $this->Model_Ruangan->get_by_lantai($lantai_id);

        echo json_encode($ruangan);
    }

    public function action($id)
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Admin Cabang')) {
            redirect('Login');
        }

        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['barang'] = $this->Model_Barang->get_by_id($id);
        $data['cabang'] = $this->Model_Cabang->get_all();
        $data['ruangan'] = $this->Model_Ruangan->get_all();
        $data['gedung'] = $this->Model_Gedung->get_all();
        $data['lantai'] = $this->Model_Lantai->get_all();

        // Cek apakah barang sudah dialokasikan
        $alokasi = $this->Model_Alokasi->get_by_barang_id($id);
        $data['alokasi'] = $alokasi;

        $data['title'] = 'Alokasi';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/admin_cabang', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('admin_Cabang/alokasi', $data);
    }

    public function update($id)
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Admin Cabang')) {
            redirect('Login');
        }

        $this->form_validation->set_rules('cabang_id', 'Cabang', 'required');
        $this->form_validation->set_rules('gedung_id', 'Gedung', 'required');
        $this->form_validation->set_rules('lantai_id', 'Lantai', 'required');
        $this->form_validation->set_rules('ruangan_id', 'Ruangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        }


        $update_data = [
            'user_id'   => $this->input->post('user_id'),
            'cabang_id'   => $this->input->post('cabang_id'),
            'gedung_id'   => $this->input->post('gedung_id'),
            'lantai_id'   => $this->input->post('lantai_id'),
            'ruangan_id'  => $this->input->post('ruangan_id')
        ];

        $this->db->where('id', $id);
        $this->db->update('alokasi_barang', $update_data);

        $history = [
            'barang_id'  => $this->input->post('barang_id'),
            'user_id'    => $this->input->post('user_id'),
            'cabang_id'  => $update_data['cabang_id'],
            'gedung_id'  => $update_data['gedung_id'],
            'lantai_id'  => $update_data['lantai_id'],
            'ruangan_id' => $update_data['ruangan_id'],
            'tanggal_alokasi' => date('Y-m-d H:i:s')
        ];
        $this->Model_History->insert($history);

        $this->session->set_flashdata('success', 'Alokasi berhasil diperbarui!');
        redirect('Admin_Cabang/Barang');
    }
}
