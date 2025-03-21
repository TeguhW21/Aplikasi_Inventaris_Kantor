<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lantai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Gedung');
        $this->load->model('Model_Lantai');
        $this->load->model('Model_Cabang');
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


    public function index()
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Super Admin')) {
            redirect('Login');
        }
        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['lantai'] = $this->Model_Lantai->get_all();
        $data['gedung'] = $this->Model_Gedung->get_all();
        $data['cabang'] = $this->Model_Cabang->get_all();
        $data['title'] = 'Lantai';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/super_admin', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('super_admin/lantai', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan Lantai. Pastikan data sudah benar.');
            redirect('Super_Admin/Lantai');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'gedung_id' => $this->input->post('gedung_id'),
                'cabang_id' => $this->input->post('cabang_id'),
            ];
            if ($this->Model_Lantai->insert($data)) {
                $this->session->set_flashdata('success', 'Lantai berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan Lantai.');
            }

            redirect('Super_Admin/Lantai');
        }
    }


    public function update($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'gedung_id' => $this->input->post('gedung_id'),
            'cabang_id' => $this->input->post('cabang_id'),
        ];


        if ($this->Model_Lantai->update($id, $data)) {
            $this->session->set_flashdata('success', 'Lantai berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Lantai.');
        }

        redirect('Super_Admin/Lantai');
    }

    public function delete($id)
    {
        if ($this->Model_Lantai->delete($id)) {
            $this->session->set_flashdata('success', 'Lantai berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus Lantai.');
        }

        redirect('Super_Admin/Lantai');
    }
}
