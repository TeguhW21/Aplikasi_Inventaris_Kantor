<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Barang');
        $this->load->model('Model_Users');
    }
    public function index()
    {

        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Admin Cabang')) {
            redirect('Login');
        }

        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['total_barang'] = $this->Model_Barang->get_total_barang($this->session->userdata('cabang_id'));
        $data['total_barang_rusak'] = $this->Model_Barang->get_total_barang_rusak($this->session->userdata('cabang_id'));
        $data['total_barang_perlu_diperbaiki'] = $this->Model_Barang->get_barang_perlu_diperbaiki($this->session->userdata('cabang_id'));
        $data['total_barang_belum_dialokasikan'] = $this->Model_Barang->get_barang_belum_dialokasikan($this->session->userdata('cabang_id'));
        $data['title'] = 'Dashboard';

        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/admin_cabang', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);

        $this->load->view('admin_cabang/dashboard', $data);
    }
}
