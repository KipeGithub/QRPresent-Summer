<?php
class Scanning_model extends CI_Model
{
    public function updatePresensiByQr($qr_code)
    {
        $this->db->where('qr_code', $qr_code);
        return $this->db->update('peserta_master', ['status_presensi' => 'SUCCESS']);
    }
}
