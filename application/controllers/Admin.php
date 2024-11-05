<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Scanning_model');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }
    public function index()
    {
        $data['title'] = $this->input->get('section', TRUE);
        $data['get_live']  = $this->db->query("SELECT * FROM peserta_master ")->result();

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
    public function proses_input_satuan()
    {
        $section = $this->input->get('section', TRUE);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $formData = [
                'tgl_input' => $this->input->post('tgl_input', TRUE),
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'nama_depan' => $this->input->post('nama_depan', TRUE),
                'nama_belakang' => $this->input->post('nama_belakang', TRUE),
                'kelas' => $this->input->post('kelas', TRUE),
                'contact' => $this->input->post('contact', TRUE),
                'plotting' => $this->input->post('plotting', TRUE),
                'status_peserta' => $this->input->post('status_peserta', TRUE),
                'status_presensi' => $this->session->userdata('level') === '0' ? $this->input->post('status_presensi', TRUE) : 'PREPARE'
            ];

            // Insert data ke tabel peserta_master
            if ($this->db->insert('peserta_master', $formData)) {
                // Dapatkan ID peserta yang baru disimpan
                $id_peserta = $this->db->insert_id();

                // Update kolom barcode dengan URL yang dibentuk dari ID peserta
                $barcode_url = base_url('checkingQR/' . $id_peserta);
                $this->db->update('peserta_master', ['barcode' => $barcode_url], ['id_peserta' => $id_peserta]);

                // Set flashdata untuk toast sukses
                $this->session->set_flashdata('toast', [
                    'class' => 'bg-success',
                    'title' => 'Berhasil',
                    'body' => 'Data berhasil disimpan.'
                ]);
            } else {
                // Set flashdata untuk toast gagal
                $this->session->set_flashdata('toast', [
                    'class' => 'bg-danger',
                    'title' => 'Gagal',
                    'body' => 'Gagal menyimpan data. Silakan coba lagi.'
                ]);
            }
            redirect(base_url('Admin?section=' . $section));
        } else {
            echo 'Error 404';
        }
    }
    public function delete_peserta($id_peserta)
    {
        $section = $this->input->get('section', TRUE);
        $where = array('id_peserta' => $id_peserta);

        $this->db->delete('peserta_master', $where);
        $this->session->set_flashdata('toast', [
            'class' => 'bg-success',
            'title' => 'Berhasil',
            'body' => 'Data berhasil dihapus.'
        ]);
        redirect(base_url('Admin?section=' . $section));
    }

    public function edit_peserta($id_peserta)
    {
        $where = array('id_peserta' => $id_peserta);
        $section = $this->input->get('section', TRUE);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $updatedData = [
                'tgl_input' => $this->input->post('tgl_input', TRUE),
                'nama_lengkap' => $this->input->post('nama_lengkap', TRUE),
                'nama_depan' => $this->input->post('nama_depan', TRUE),
                'nama_belakang' => $this->input->post('nama_belakang', TRUE),
                'kelas' => $this->input->post('kelas', TRUE),
                'contact' => $this->input->post('contact', TRUE),
                'plotting' => $this->input->post('plotting', TRUE),
                'status_peserta' => $this->input->post('status_peserta', TRUE),
                'status_presensi' => $this->input->post('status_presensi', TRUE),
            ];

            if ($this->db->update('peserta_master', $updatedData, $where)) {
                $this->session->set_flashdata('toast', [
                    'class' => 'bg-success',
                    'title' => 'Berhasil',
                    'body' => 'Data berhasil disimpan.'
                ]);
            } else {
                $this->session->set_flashdata('toast', [
                    'class' => 'bg-danger',
                    'title' => 'Gagal',
                    'body' => 'Gagal menyimpan data. Silakan coba lagi.'
                ]);
            }
            redirect(base_url('Admin?section=' . $section));
        } else {
            show_error('Metode HTTP tidak diizinkan', 405);
        }
    }
}
