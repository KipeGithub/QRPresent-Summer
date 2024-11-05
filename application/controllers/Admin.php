<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Scanning_model');
        $this->load->helper('url');
    }
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
    public function importdata()
    {
        $data['title'] = $this->input->get('section', TRUE);
        $data['get_live']  = $this->db->query("SELECT * FROM peserta_master")->result();

        if ($this->session->userdata('level') === '0' || $this->session->userdata('level') === '1') {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/importdata', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('auth');
        }
    }
    public function scancam()
    {
        $data['title'] = $this->input->get('section', TRUE);
        $data['get_live']  = $this->db->query("SELECT * FROM peserta_master")->result();

        if ($this->session->userdata('level') === '0' || $this->session->userdata('level') === '1') {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/scancam', $data);
            $this->load->view('templates/footer', $data);
        } else {
            redirect('auth');
        }
    }

    // Endpoint untuk mengubah status presensi
    public function update_presensi()
    {
        $qr_code = $this->input->post('qr_code');
        $result = $this->Peserta_model->updatePresensiByQr($qr_code);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Presensi berhasil diperbarui']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Presensi gagal diperbarui']);
        }
    }
}
