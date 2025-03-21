<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gedung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Gedung');
        $this->load->model('Model_Cabang');
        $this->load->model('Model_Users');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Super Admin')) {
            redirect('Login');
        }
        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['gedung'] = $this->Model_Gedung->get_all();
        $data['cabang'] = $this->Model_Cabang->get_all();
        $data['title'] = 'Gedung';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/super_admin', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('super_admin/gedung', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan Gedung. Pastikan data sudah benar.');
            redirect('Super_Admin/Gedung');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'cabang_id' => $this->input->post('cabang_id'),
            ];
            if ($this->Model_Gedung->insert($data)) {
                $this->session->set_flashdata('success', 'Gedung berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan Gedung.');
            }

            redirect('Super_Admin/Gedung');
        }
    }


    public function update($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'cabang_id' => $this->input->post('cabang_id'),
        ];


        if ($this->Model_Gedung->update($id, $data)) {
            $this->session->set_flashdata('success', 'Gedung berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Gedung.');
        }

        redirect('Super_Admin/Gedung');
    }

    public function delete($id)
    {
        if ($this->Model_Gedung->delete($id)) {
            $this->session->set_flashdata('success', 'Gedung berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus Gedung.');
        }

        redirect('Super_Admin/Gedung');
    }
}
