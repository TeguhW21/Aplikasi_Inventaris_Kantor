<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Users');
        $this->load->helper('cookie');
    }

    public function login()
    {
        if ($this->session->userdata('logged_in')) {
            $role = $this->session->userdata('role');
            switch ($role) {
                case 'Super Admin':
                    redirect('Super_Admin/Dashboard');
                    break;
                case 'Admin Cabang':
                    redirect('Admin_Cabang/Dashboard');
                    break;
                default:
                    redirect('Login');
            }
        } else {
            $remember_email = get_cookie('remember_me');
            $remember_password = get_cookie('remember_me_password');

            $data = [
                'email' => $remember_email ? $remember_email : '',
                'password' => $remember_password ? $remember_password : '',
            ];
            $this->load->view('login', $data);
        }
    }

    public function auth_user()
    {
        $email = $this->input->post('email', TRUE);
        $pass = $this->input->post('password', TRUE);
        $remember = $this->input->post('remember');

        // Validasi input kosong
        if (empty($email)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center">Email tidak boleh kosong!</div>');
            redirect('Login');
        } elseif (empty($pass)) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center">Password tidak boleh kosong!</div>');
            redirect('Login');
        }

        $cekAkun = $this->Model_Users->cekEmail($email);

        if ($cekAkun->num_rows() == 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center">Email tidak ditemukan!</div>');
            redirect('Login');
        } else {
            $hasil = $cekAkun->row();

            if (password_verify($pass, $hasil->password)) {
                $sesi = array(
                    'session_id' => $hasil->id,
                    'email' => $hasil->email,
                    'cabang_id' => $hasil->cabang_id,
                    'logged_in' => TRUE,
                    'role' => $hasil->role,
                );

                // Set session
                $this->session->set_userdata($sesi);


                if ($remember) {
                    $cookie_data = array(
                        'name'   => 'remember_me',
                        'value'  => base64_encode(json_encode(['email' => $email, 'password' => $pass])),
                        'expire' => 86400 * 30,
                        'secure' => FALSE
                    );
                    set_cookie($cookie_data);
                } else {
                    delete_cookie('remember_me');
                }

                switch ($hasil->role) {
                    case 'Super Admin':
                        redirect('Super_Admin/Dashboard');
                        break;
                    case 'Admin Cabang':
                        redirect('Admin_Cabang/Dashboard');
                        break;
                    default:
                        redirect('Login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center">Password salah!</div>');
                redirect('Login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }
}
