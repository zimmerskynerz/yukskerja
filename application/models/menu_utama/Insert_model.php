<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    public function registrasi($random)
    {
        $uuid = uniqid();
        $kelamin = $this->input->post('kelamin');
        if ($kelamin == 1) :
            $j_kelamin = 'default_l.png';
        else :
            $j_kelamin = 'default_p.png';
        endif;
        $data_cust = array(
            'id_user'     => $uuid,
            'email'       => htmlentities($this->input->post('email')),
            'password'    => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'level'       => 'CUSTOMER',
            'otp'         => $random,
            'status'      => 'PASSIVE',
            'profile'     => $j_kelamin,
            'tgl_gabung'    => date('Y-m-d')
        );
        $this->db->insert('tbl_login', $data_cust);
        $identitas = array(
            'id_user'       => $uuid,
            // Id KTP
            'jid'           => null,
            'no_id'         => null,
            // KTP
            'nm_lengkap'    => htmlentities($this->input->post('nm_lengkap')),
            'tgl_lahir'     => NULL,
            'alamat'        => NULL,
            'no_hp'         => NULL,
            'j_kelamin'     => htmlentities($this->input->post('kelamin')),
            'status'        => 'PASSIVE',
            'f_ktp'         => NULL
        );
        $this->db->insert('tbl_identitas', $identitas);
    }
    function transaksi_langsung($kd_jasa, $harga, $order_id, $email)
    {
        $cek_email = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
        if ($cek_email > 0) :
            $data_transaksi = array(
                'id_transaksi'     => $order_id,
                'tgl_transaksi'    => date('Y-m-d'),
                'id_user'          => $cek_email['id_user'],
                'kd_jasa'          => $kd_jasa,
                'tgl_kadaluarsa'   => null,
                'type_transaksi'   => null,
                'jml_bayar'        => $harga,
                'status_transaksi' => 'PROSES',
                'ket_tambahan'     => htmlentities($this->input->post('ket_sewa'))
            );
            
            $this->db->insert('tbl_transaksi', $data_transaksi);
        endif;
    }
}


/* End of file Insert_model.php and path \application\models\menu_utama\Insert_model.php */