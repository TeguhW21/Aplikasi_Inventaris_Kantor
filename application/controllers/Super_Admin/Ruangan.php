<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruangan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Ruangan');
        $this->load->model('Model_Cabang');
        $this->load->model('Model_Gedung');
        $this->load->model('Model_lantai');
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
        $lantai = $this->Model_lantai->getLantaiByGedung($gedung_id);

        echo json_encode($lantai);
    }

    public function get_ruangan_by_lantai()
    {

        $lantai_id = $this->input->post('lantai_id');
        $ruangan = $this->Model_Ruangan->get_by_lantai($lantai_id);

        echo json_encode($ruangan);
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Super Admin')) {
            redirect('Login');
        }
        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['ruangan'] = $this->Model_Ruangan->get_all();
        $data['cabang'] = $this->Model_Cabang->get_all();
        $data['gedung'] = $this->Model_Gedung->get_all();
        $data['lantai'] = $this->Model_lantai->get_all();
        $data['title'] = 'Ruangan';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/super_admin', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('super_admin/ruangan', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Gagal menambahkan Data Ruangan. Pastikan data sudah benar.');
            redirect('Super_Admin/Ruangan');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'cabang_id' => $this->input->post('cabang_id'),
                'gedung_id' => $this->input->post('gedung_id'),
                'lantai_id' => $this->input->post('lantai_id'),
            ];
            if ($this->Model_Ruangan->insert($data)) {
                $this->session->set_flashdata('success', 'Data Ruangan berhasil ditambahkan!');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan Data Ruangan.');
            }

            redirect('Super_Admin/Ruangan');
        }
    }


    public function update($id)
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'cabang_id' => $this->input->post('cabang_id'),
            'gedung_id' => $this->input->post('gedung_id'),
            'lantai_id' => $this->input->post('lantai_id'),
        ];


        if ($this->Model_Ruangan->update($id, $data)) {
            $this->session->set_flashdata('success', 'Data Ruangan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Data Ruangan.');
        }

        redirect('Super_Admin/Ruangan');
    }

    public function delete($id)
    {
        if ($this->Model_Ruangan->delete($id)) {
            $this->session->set_flashdata('success', 'Data Ruangan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus Data Ruangan.');
        }

        redirect('Super_Admin/Ruangan');
    }
}
