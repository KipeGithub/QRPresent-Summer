<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LandingPage extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Landing Page';

        $data['get_live']  = $this->db->query("SELECT * FROM peserta_master")->result();

        $this->load->view('landingpage/include_main/header', $data);
        $this->load->view('landingpage/include_main/navbar', $data);
        $this->load->view('landingpage/content/body', $data);
        $this->load->view('landingpage/include_main/footer', $data);
    }
}
