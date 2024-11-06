<?php
class Scanning_model extends CI_Model
{
    public function updatePresensiByQr($qr_code)
    {
        $this->db->where('qr_code', $qr_code);
        return $this->db->update('peserta_master', ['status_presensi' => 'SUCCESS']);
    }
    public function get_peserta_by_id($id_peserta)
    {
        $this->db->where('id_peserta', $id_peserta);
        $query = $this->db->get('peserta_master');

        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data peserta
        } else {
            return null; // Jika tidak ditemukan
        }
    }
    public function update_peserta($id_peserta, $data)
    {
        $this->db->where('id_peserta', $id_peserta);
        return $this->db->update('peserta_master', $data);
    }
}
