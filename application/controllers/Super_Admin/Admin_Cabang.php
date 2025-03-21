<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Cabang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Users');
        $this->load->model('Model_Cabang');
        $this->load->library('form_validation');

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'Super Admin') {
            redirect('Login');
        }
    }

    public function index()
    {
        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['admin_cabang'] = $this->Model_Users->get_all_admin_cabang();
        $data['cabang'] = $this->Model_Cabang->get_all();
        $data['title'] = 'Kelola Admin Cabang';

        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/super_admin', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);

        $this->load->view('super_admin/admin_cabang', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('cabang_id', 'Cabang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan Admin Cabang. Pastikan data sudah benar.');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'Admin Cabang',
                'cabang_id' => $this->input->post('cabang_id'),
            ];
            if ($this->Model_Users->insert($data)) {
                $this->session->set_flashdata('success', 'Admin Cabang berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan Admin Cabang.');
            }
        }
        redirect('Super_Admin/Admin_Cabang');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('cabang_id', 'Cabang', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal memperbarui Admin Cabang. Pastikan data sudah benar.');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'cabang_id' => $this->input->post('cabang_id'),
            ];
            if (!empty($this->input->post('password'))) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            if ($this->Model_Users->update($id, $data)) {
                $this->session->set_flashdata('success', 'Admin Cabang berhasil diperbarui!');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui Admin Cabang.');
            }
        }
        redirect('Super_Admin/Admin_Cabang');
    }

    public function delete($id)
    {
        if ($this->Model_Users->delete($id)) {
            $this->session->set_flashdata('success', 'Admin Cabang berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus Admin Cabang.');
        }
        redirect('Super_Admin/Admin_Cabang');
    }
}
