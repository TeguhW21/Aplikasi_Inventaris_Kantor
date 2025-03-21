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

        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Super Admin')) {
            redirect('Login');
        }

        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['admin_cabang'] = $this->Model_Users->get_all_admin_cabang();
        $data['total_barang'] = $this->Model_Barang->get_total_barang();
        $data['total_barang_rusak'] = $this->Model_Barang->get_total_barang_rusak();
        $data['total_barang_perlu_diperbaiki'] = $this->Model_Barang->get_barang_perlu_diperbaiki();
        $data['total_barang_belum_dialokasikan'] = $this->Model_Barang->get_barang_belum_dialokasikan();
        $data['title'] = 'Dashboard';

        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/super_admin', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);

        $this->load->view('super_admin/dashboard', $data);
    }
}
