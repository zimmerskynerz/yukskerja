<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    public function aktifAkun($email)
    {
        $data_login = array(
            'otp'     => null,
            'status'    => 'AKTIF'
        );
        $this->db->where('email', $email);
        $this->db->update('tbl_login', $data_login);
    }
}


/* End of file Update_model.php and path \application\models\menu_utama\Update_model.php */