<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class model_user extends CI_Model
{
    public function get_user_by_email($email)
    {
        return $this->db->get_where('account', ['email' => $email])->row();
    }
}
