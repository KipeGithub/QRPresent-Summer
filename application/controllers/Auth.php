<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Admin Login';

        $this->load->view('auth/login', $data);
    }
}
