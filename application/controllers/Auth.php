<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_user'); // load model_user
        $this->load->helper('url', 'form', 'session');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['title'] = 'Admin Login';

        $this->load->view('auth/login', $data);
    }
    public function logout()
    {
        // Hapus semua data session
        $this->session->sess_destroy();

        // Set flashdata untuk notifikasi logout sukses (opsional)
        $this->session->set_flashdata('toast', [
            'class' => 'bg-success',
            'title' => 'Logout Berhasil',
            'body' => 'Anda telah berhasil logout.'
        ]);

        // Redirect ke halaman login atau halaman lain yang diinginkan
        redirect(base_url('Auth'));
    }

    public function proses_login()
    {
        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        // Cek apakah email ada di database
        $user = $this->model_user->get_user_by_email($email);

        if ($user) {
            if (password_verify($password, $user->password)) {
                // Jika password benar
                $sess_data = [
                    'id' => $user->id,
                    'email' => $user->email,
                    'level' => $user->level,
                ];
                $this->session->set_userdata($sess_data);

                // Set flashdata untuk toast
                $this->session->set_flashdata('toast', [
                    'class' => 'bg-success', // class untuk styling
                    'title' => 'Login Berhasil', // judul toast
                    'body' => 'Selamat datang ' . $user->email . '!' // isi body toast
                ]);

                // Redirect sesuai level
                $level_routes = ['0' => 'Admin?section=Dataset', '1' => 'Admin?section=Dataset'];
                redirect($level_routes[$user->level] ?? 'Auth');
            } else {
                // Password salah
                $this->session->set_flashdata('toast', [
                    'class' => 'bg-danger',
                    'title' => 'Login Gagal',
                    'body' => 'Password salah. Silakan coba lagi.'
                ]);
                redirect('Auth');
            }
        } else {
            // Email tidak ditemukan
            $this->session->set_flashdata('toast', [
                'class' => 'bg-danger',
                'title' => 'Login Gagal',
                'body' => 'Email tidak ditemukan. Silakan periksa email Anda.'
            ]);
            redirect('Auth');
        }
    }
}
