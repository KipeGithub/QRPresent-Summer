<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'vendor/autoload.php';

use Dompdf\Dompdf;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
// use ZipArchive;


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
                $barcode_url = 'checkingQR/' . $id_peserta;
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
    public function show_invitation($id_peserta)
    {
        $section = $this->input->get('section', TRUE);

        $query = $this->db->get_where('peserta_master', ['id_peserta' => $id_peserta]);

        if ($query->num_rows() > 0) {
            $data['card'] = $query->row();
        } else {
            $this->session->set_flashdata('toast', [
                'class' => 'bg-danger',
                'title' => 'Gagal',
                'body' => 'Gagal melihat data. Silakan coba lagi.'
            ]);
            redirect('Admin?section=' . $section);
            return;
        }

        // Set nama file untuk unduhan PDF
        $data['name_file'] = 'INVITATION CARD - ' . $data['card']->nama_lengkap . ' - SMK Pariwisata Telkom Bandung';
        $data['get_pdf'] = (array) $data['card'];
        $data['barcode'] = $data['card']->barcode;

        // Generate QR code image
        $qrCode = new QrCode($data['barcode']);
        $qrCode->setSize(80);
        $writer = new PngWriter();
        $qrImage = $writer->write($qrCode)->getDataUri();

        $data['qr_image'] = $qrImage; // Pass QR image data URI to view

        // Generate PDF
        $dompdf = new Dompdf(['enable_remote' => true]);
        $html = $this->load->view('admin/invitation_card', $data, true);
        $dompdf->loadHtml($html);
        $dompdf->setPaper([0, 0, 540, 960]);

        $dompdf->render();
        $dompdf->stream("INVITATION CARD - " . $data['card']->nama_lengkap . "- SMK Pariwisata Telkom Bandung.pdf", array("Attachment" => false));
    }

    public function download_zip()
    {
        $section = $this->input->get('section', TRUE);

        $ids = $this->input->get('ids', TRUE);  // Mendapatkan daftar ID peserta
        $ids_array = explode(",", $ids);

        if (empty($ids_array)) {
            $this->session->set_flashdata('toast', [
                'class' => 'bg-danger',
                'title' => 'Gagal',
                'body' => 'Gagal menguduh data terpilih. Silakan coba lagi.'
            ]);
            redirect('Admin?section=' . $section);
            return;
        }

        $zip = new ZipArchive();
        $zip_name = 'Invitation_Cards_' . date('YmdHis') . '.zip';
        $zip_path = FCPATH . 'assets/file_pdf/downloads/' . $zip_name;

        if ($zip->open($zip_path, ZipArchive::CREATE) === TRUE) {
            foreach ($ids_array as $id_peserta) {
                $query = $this->db->get_where('peserta_master', ['id_peserta' => $id_peserta]);
                if ($query->num_rows() > 0) {
                    $card = $query->row();
                    // Generate PDF untuk setiap peserta
                    $data['name_file'] = 'INVITATION CARD - ' . $card->nama_lengkap . ' - SMK Pariwisata Telkom Bandung';
                    $data['card'] = $card;

                    // Generate QR code
                    $qrCode = new QrCode($card->barcode);
                    $writer = new PngWriter();
                    $qrImage = $writer->write($qrCode)->getDataUri();
                    $data['qr_image'] = $qrImage;

                    $dompdf = new Dompdf(['enable_remote' => true]);
                    $html = $this->load->view('admin/invitation_card', $data, true);
                    $dompdf->loadHtml($html);
                    $dompdf->setPaper([0, 0, 540, 960]);
                    $dompdf->render();

                    // Simpan PDF ke folder sementara sebelum dikompresi
                    $pdf_path = FCPATH . 'assets/file_pdf/temp/Invitation_' . $card->id_peserta . '.pdf';
                    file_put_contents($pdf_path, $dompdf->output());

                    // Masukkan PDF ke dalam ZIP
                    $zip->addFile($pdf_path, 'Invitation_' . $card->nama_lengkap . '.pdf');
                }
            }
            $zip->close();

            // Bersihkan file PDF sementara setelah menambahkan ke ZIP
            array_map('unlink', glob(FCPATH . 'assets/file_pdf/temp/*.pdf'));

            // Berikan akses unduhan file ZIP
            header('Content-Type: application/zip');
            header('Content-Disposition: attachment; filename="' . basename($zip_name) . '"');
            header('Content-Length: ' . filesize($zip_path));
            readfile($zip_path);

            // Hapus file ZIP setelah diunduh
            unlink($zip_path);
        } else {
            $this->session->set_flashdata('toast', [
                'class' => 'bg-danger',
                'title' => 'Gagal',
                'body' => 'Gagal mengunduh data terpilih. Silakan coba lagi.'
            ]);
            redirect('Admin?section=' . $section);
        }
    }
    public function importdatapeserta()
    {

        $section = $this->input->get('section');

        $status_presensi = $this->session->userdata('level') === '0' ? $this->input->post('status_presensi', TRUE) : 'PREPARE';
        $tgl_input = $this->input->post('tgl_input');

        $config['upload_path'] = 'assets/excel/uploaded';
        $config['allowed_types'] = 'csv|xls|xlsx';
        $config['max_size'] = 2048; // 2MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $fileData = $this->upload->data();
            $filePath = 'assets/excel/uploaded/' . $fileData['file_name'];
            $this->import_data_excel($filePath, $status_presensi, $tgl_input);
            unlink($filePath);

            $this->session->set_flashdata('toast', [
                'class' => 'bg-success',
                'title' => 'Berhasil',
                'body' => 'Data berhasil diunggah.'
            ]);

            redirect('Admin?section=' . $section);
        } else {
            $this->session->set_flashdata('toast', [
                'class' => 'bg-danger',
                'title' => 'Gagal',
                'body' => 'Gagal mengunggah excel. Silakan periksa kembali isi file.'
            ]);
            redirect('Admin/importdata?section=' . $section);
        }
    }
    private function import_data_excel($filePath, $status_presensi, $tgl_input)
    {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $highestRow = $sheet->getHighestRow();

        for ($row = 2; $row <= $highestRow; $row++) {
            // Convert column index to A1 notation
            $NamaLengkapCell = $sheet->getCell('A' . $row);
            $NamaDepanCell = $sheet->getCell('B' . $row);
            $NamaBelakangCell = $sheet->getCell('C' . $row);
            $KelasCell = $sheet->getCell('D' . $row);
            $ContactCell = $sheet->getCell('E' . $row);
            $PlottingCell = $sheet->getCell('F' . $row);
            $StatusPesertaCell = $sheet->getCell('G' . $row);

            $NamaLengkap = $NamaLengkapCell->getValue();
            $NamaDepan = $NamaDepanCell->getValue();
            $NamaBelakang = $NamaBelakangCell->getValue();
            $Kelas = $KelasCell->getValue();
            $Contact = $ContactCell->getValue();
            $Plotting = $PlottingCell->getValue();
            $StatusPeserta = $StatusPesertaCell->getValue();

            if (empty($NamaLengkap) || empty($NamaDepan) || empty($NamaBelakang) || empty($Kelas) || empty($Contact) || empty($Plotting) || empty($StatusPeserta)) {
                continue;
            }

            // Prepare data to insert into the database
            $data = array(
                'nama_lengkap' => $NamaLengkap,
                'nama_depan' => $NamaDepan,
                'nama_belakang' => $NamaBelakang,
                'kelas' => $Kelas,
                'contact' => $Contact,
                'plotting' => $Plotting,
                'status_peserta' => $StatusPeserta,
                'tgl_input' => $tgl_input,
                'status_presensi' => $status_presensi,
            );
            $this->db->insert('peserta_master', $data);

            $get_id_peserta = $this->db->insert_id();

            $barcode_data = array(
                'barcode' => 'checkingQR/' . $get_id_peserta,
            );
            $this->db->where('id_peserta', $get_id_peserta);
            $this->db->update('peserta_master', $barcode_data);
        }
    }
    public function get_peserta_by_id($id_peserta)
    {
        header('Content-Type: application/json');

        // Dapatkan data peserta berdasarkan id_peserta dari model
        $peserta = $this->Scanning_model->get_peserta_by_id($id_peserta);

        if ($peserta) {
            echo json_encode($peserta);
        } else {
            echo json_encode(null);
        }
    }
    public function checkingQR($id_peserta)
    {
        header('Content-Type: application/json');

        // Ambil data peserta berdasarkan id_peserta
        $peserta = $this->Scanning_model->get_peserta_by_id($id_peserta);

        if ($peserta) {
            if ($peserta->status_presensi == 'SUCCESS') {
                echo json_encode(['status' => 'warning', 'message' => 'Peserta ini sudah check-in.']);
                $this->session->set_flashdata('toast', [
                    'class' => 'bg-danger',
                    'title' => 'Gagal',
                    'body' => 'Peserta ini sudah check-in!'
                ]);
            } else {
                // Ubah status menjadi SUCCESS
                $update_data = ['status_presensi' => 'SUCCESS'];
                $this->Scanning_model->update_peserta($id_peserta, $update_data);
                $this->session->set_flashdata('toast', [
                    'class' => 'bg-success',
                    'title' => 'Success',
                    'body' => 'Check-in berhasil!'
                ]);
                echo json_encode(['status' => 'success', 'message' => 'Check-in berhasil!']);
            }
        } else {
            // Jika data peserta tidak ditemukan
            echo json_encode(['status' => 'error', 'message' => 'Peserta tidak ditemukan.']);
        }
    }
}
