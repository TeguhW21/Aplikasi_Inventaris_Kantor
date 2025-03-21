<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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
        $data['cabang'] = $this->Model_Cabang->get_all();
        $data['title'] = 'Cabang';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/super_admin', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('super_admin/cabang', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan Cabang. Pastikan data sudah benar.');
            redirect('Super_Admin/Cabang');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'alamat' => $this->input->post('alamat'),
            ];
            if ($this->Model_Cabang->insert($data)) {
                $this->session->set_flashdata('success', 'Cabang berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan Cabang.');
            }

            redirect('Super_Admin/Cabang');
        }
    }


    public function update($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
        ];


        if ($this->Model_Cabang->update($id, $data)) {
            $this->session->set_flashdata('success', 'Cabang berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Cabang.');
        }

        redirect('Super_Admin/Cabang');
    }

    public function delete($id)
    {
        if ($this->Model_Cabang->delete($id)) {
            $this->session->set_flashdata('success', 'Cabang berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus Cabang.');
        }

        redirect('Super_Admin/Cabang');
    }
}
