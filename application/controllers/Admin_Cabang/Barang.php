<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Barang');
        $this->load->model('Model_Kategori');
        $this->load->model('Model_Users');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Admin Cabang')) {
            redirect('Login');
        }
        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['barang'] = $this->Model_Barang->get_all_by_cabang($this->session->userdata('cabang_id'));
        $data['kategori'] = $this->Model_Kategori->get_all();
        $data['title'] = 'Barang Kantor';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/admin_cabang', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('admin_cabang/barang', $data);
    }


    public function update($id)
    {
        $barang = $this->Model_Barang->get_by_id($id);
        $foto_lama = $barang['foto'];

        $data = [
            'nama' => $this->input->post('nama'),
            'kondisi' => $this->input->post('kondisi'),
            'kategori_id' => $this->input->post('kategori_id'),
            'harga' => $this->input->post('harga'),
            'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path'] = './assets/upload/foto_barang/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $upload_data = $this->upload->data();
                $file_name = pathinfo($upload_data['file_name'], PATHINFO_FILENAME);
                $extension = pathinfo($upload_data['file_name'], PATHINFO_EXTENSION);
                $unique_name = $file_name . '_' . uniqid() . '.' . $extension;
                $data['foto'] = $unique_name;

                rename($upload_data['file_path'] . $upload_data['file_name'], $upload_data['file_path'] . $unique_name);

                if (!empty($foto_lama) && file_exists('./assets/upload/foto_barang/' . $foto_lama)) {
                    unlink('./assets/upload/foto_barang/' . $foto_lama);
                }
            } else {
                $this->session->set_flashdata('error', 'Gagal mengunggah foto: ' . $this->upload->display_errors());
                redirect('Admin_Cabang/Barang');
            }
        }

        if ($this->Model_Barang->update($id, $data)) {
            $this->session->set_flashdata('success', 'Barang berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Barang.');
        }

        redirect('Admin_Cabang/Barang');
    }


    public function delete($id)
    {
        $barang = $this->Model_Barang->get_by_id($id);
        if (!empty($barang['foto']) && file_exists('./assets/upload/foto_barang/' . $barang['foto'])) {
            unlink('./assets/upload/foto_barang/' . $barang['foto']);
        }
        if ($this->Model_Barang->delete($id)) {
            $this->session->set_flashdata('success', 'Barang berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus Barang.');
        }

        redirect('Admin_Cabang/Barang');
    }
}
