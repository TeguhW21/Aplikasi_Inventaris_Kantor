<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_History');
        $this->load->model('Model_Users');
        $this->load->library('form_validation');
        $this->load->library('upload');
    }


    public function alokasi($id)
    {
        if (!$this->session->userdata('logged_in') || ($this->session->userdata('role') != 'Admin Cabang')) {
            redirect('Login');
        }
        $data['user'] = $this->Model_Users->getByid($this->session->userdata('session_id'));
        $data['data'] = $this->Model_History->get_by_id($id);
        $data['history'] = $this->Model_History->get_all_by_barangid($id);
        $data['title'] = 'History Alokasi';
        $data['head'] = $this->load->view('partials/head', $data, true);
        $data['sidebar'] = $this->load->view('sidebar/admin_cabang', [], true);
        $data['script'] = $this->load->view('partials/script', [], true);
        $this->load->view('admin_cabang/history', $data);
    }
}
