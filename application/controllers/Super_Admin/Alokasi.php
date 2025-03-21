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
        $lantai = $this->Model_lantai->getLantaiByGedung($gedung_id);

        echo json_encode($lantai);
    }

    public function action($id)
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Super Admin')) {
            redirect('Login');
        }

        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['barang'] = $this->Model_Barang->get_by_id($id);
        $data['ruangan'] = $this->Model_Ruangan->get_all();
        $data['cabang'] = $this->Model_Cabang->get_all();
        $data['gedung'] = $this->Model_Gedung->get_all();
        $data['lantai'] = $this->Model_Lantai->get_all();

        $alokasi = $this->Model_Alokasi->get_by_barang_id($id);
        $data['alokasi'] = $alokasi;

        $data['title'] = 'Alokasi';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/super_admin', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('super_admin/alokasi', $data);
    }

    public function add()
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Super Admin')) {
            redirect('Login');
        }

        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('user_id', 'User', 'required');
        $this->form_validation->set_rules('cabang_id', 'Cabang', 'required');
        $this->form_validation->set_rules('gedung_id', 'Gedung', 'required');
        $this->form_validation->set_rules('lantai_id', 'Lantai', 'required');
        $this->form_validation->set_rules('ruangan_id', 'Ruangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect($_SERVER['HTTP_REFERER']);
        }

        // Ambil data dari form
        $alokasi_data = [
            'barang_id'   => $this->input->post('barang_id'),
            'user_id'     => $this->input->post('user_id'),
            'cabang_id'   => $this->input->post('cabang_id'),
            'gedung_id'   => $this->input->post('gedung_id'),
            'lantai_id'   => $this->input->post('lantai_id'),
            'ruangan_id'  => $this->input->post('ruangan_id'),
        ];


        $this->Model_Alokasi->insert($alokasi_data);

        $history_data = [
            'barang_id'  => $alokasi_data['barang_id'],
            'user_id'    => $alokasi_data['user_id'],
            'cabang_id'  => $alokasi_data['cabang_id'],
            'gedung_id'  => $alokasi_data['gedung_id'],
            'lantai_id'  => $alokasi_data['lantai_id'],
            'ruangan_id' => $alokasi_data['ruangan_id'],
            'tanggal_alokasi' => date('Y-m-d H:i:s')
        ];
        $this->Model_History->insert($history_data);


        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error', 'Gagal melakukan alokasi barang.');
        } else {
            $this->session->set_flashdata('success', 'Barang berhasil dialokasikan!');
        }

        redirect('Super_Admin/Barang');
    }

    public function update($id)
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Super Admin')) {
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
        redirect('Super_Admin/Barang');
    }
}
