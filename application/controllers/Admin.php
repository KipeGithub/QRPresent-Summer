<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['title'] = $this->input->get('section', TRUE);
        $data['get_live']  = $this->db->query("SELECT * FROM peserta_master")->result();


        if ($this->session->userdata('level') === '0' || $this->session->userdata('level') === '1') {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/dataset', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('auth');
        }
    }
}
