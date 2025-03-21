<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Kategori');
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
        $data['kategori'] = $this->Model_Kategori->get_all();
        $data['title'] = 'Kategori Barang';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/super_admin', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('super_admin/kategori', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan Data Kategori Barang. Pastikan data sudah benar.');
            redirect('Super_Admin/Kategori');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
            ];
            if ($this->Model_Kategori->insert($data)) {
                $this->session->set_flashdata('success', 'Data Kategori Barang berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan Data Kategori Barang.');
            }

            redirect('Super_Admin/Kategori');
        }
    }


    public function update($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
        ];


        if ($this->Model_Kategori->update($id, $data)) {
            $this->session->set_flashdata('success', 'Data Kategori Barang berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Data Kategori Barang.');
        }

        redirect('Super_Admin/Kategori');
    }

    public function delete($id)
    {
        if ($this->Model_Kategori->delete($id)) {
            $this->session->set_flashdata('success', 'Data Kategori Barang berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus Data Kategori Barang.');
        }

        redirect('Super_Admin/Kategori');
    }
}
