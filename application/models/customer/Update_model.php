<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    public function daftarFreelance()
    {
        $uuid = uniqid();

        $config['upload_path']   = './assets/berkas';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf|doc|docx|ppt|pptx|zip|rar';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('ktp')) {
            $_FILES['file']['name'] = $_FILES['ktp']['name'];
            $_FILES['file']['type'] = $_FILES['ktp']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ktp']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['ktp']['size'];
            $uploadData = $this->upload->data();
            $ktp = $uploadData['file_name'];
        }
        if ($this->upload->do_upload('ktp_selfi')) {
            $_FILES['file']['name'] = $_FILES['ktp_selfi']['name'];
            $_FILES['file']['type'] = $_FILES['ktp_selfi']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ktp_selfi']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['ktp_selfi']['size'];
            $uploadData = $this->upload->data();
            $ktp_selfi = $uploadData['file_name'];
        }
        $data_identitas2 = array(
            'status'        => 'KONFIRMASI'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $data_identitas2);
        $data_identitas = array(
            'jid'           => htmlentities($this->input->post('jid')),
            'no_id'         => htmlentities($this->input->post('no_id')),
            'nm_lengkap'    => htmlentities($this->input->post('nm_lengkap')),
            'tgl_lahir'     => htmlentities($this->input->post('tgl_lahir')),
            'alamat'        => htmlentities($this->input->post('alamat')),
            'no_hp'         => htmlentities($this->input->post('no_hp')),
            'f_ktp'         => $ktp,
            'fs_ktp'        => $ktp_selfi
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_identitas', $data_identitas);
        $data_freelance = array(
            'id_user'       => htmlentities($this->input->post('id_user')),
            'username'      => $uuid,
            'nm_bank'       => htmlentities($this->input->post('nm_bank')),
            'cabang'        => htmlentities($this->input->post('cabang')),
            'no_rek'        => htmlentities($this->input->post('no_rek')),
            'an_bank'       => htmlentities($this->input->post('an_bank')),
            'status'        => 'KONFIRMASI',
            'saldo'         => 0
        );
        $this->db->insert('identitas_freelance', $data_freelance);
    }
    public function daftarFreelanceKembali()
    {
        $uuid = uniqid();
        $config['upload_path']   = './assets/berkas';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf|doc|docx|ppt|pptx|zip|rar';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('ktp')) {
            $_FILES['file']['name'] = $_FILES['ktp']['name'];
            $_FILES['file']['type'] = $_FILES['ktp']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ktp']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['ktp']['size'];
            $uploadData = $this->upload->data();
            $ktp = $uploadData['file_name'];
        }
        if ($this->upload->do_upload('ktp_selfi')) {
            $_FILES['file']['name'] = $_FILES['ktp_selfi']['name'];
            $_FILES['file']['type'] = $_FILES['ktp_selfi']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ktp_selfi']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['ktp_selfi']['size'];
            $uploadData = $this->upload->data();
            $ktp_selfi = $uploadData['file_name'];
        }
        $data_identitas2 = array(
            'status'        => 'KONFIRMASI'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $data_identitas2);
        $data_identitas = array(
            'jid'           => htmlentities($this->input->post('jid')),
            'no_id'         => htmlentities($this->input->post('no_id')),
            'nm_lengkap'    => htmlentities($this->input->post('nm_lengkap')),
            'tgl_lahir'     => htmlentities($this->input->post('tgl_lahir')),
            'alamat'        => htmlentities($this->input->post('alamat')),
            'no_hp'         => htmlentities($this->input->post('no_hp')),
            'f_ktp'         => $ktp,
            'fs_ktp'        => $ktp_selfi
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_identitas', $data_identitas);
        $data_freelance = array(
            'username'      => $uuid,
            'nm_bank'       => htmlentities($this->input->post('nm_bank')),
            'cabang'        => htmlentities($this->input->post('cabang')),
            'no_rek'        => htmlentities($this->input->post('no_rek')),
            'an_bank'       => htmlentities($this->input->post('an_bank')),
            'status'        => 'KONFIRMASI',
            'saldo'         => 0
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('identitas_freelance', $data_freelance);
    }
    public function resetPelanggan()
    {
        $data_login = array(
            'password' => password_hash('SALOKU123abc', PASSWORD_DEFAULT)
        );
        $this->db->where('email', htmlentities($this->input->post('email')));
        $this->db->update('tbl_login', $data_login);
    }
    public function deletPelanggan()
    {
        $data_login = array(
            'email'     => null,
            'status'    => 'HAPUS'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $data_login);
    }
    public function komplain_kerja()
    {
        $data = array(
            'status_transaksi'  => 'KOMPLAIN',
            'ket_tambahan'      => htmlentities($this->input->post('komplain_alasan'))
        );
        $this->db->where('id_transaksi', html_escape($this->input->post('id_transaksi')));
        $this->db->update('tbl_transaksi', $data);
    }

    public function dana_gajian($jml_uang)
    {
        $cek_transaksi = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $this->input->post('id_transaksi')])->row_array();
        $kd_jasa = $cek_transaksi['kd_jasa'];
        $cek_jasa = $this->db->get_where('tbl_jasa', ['kd_jasa' => $kd_jasa])->row_array();
        $username = $cek_jasa['username'];
        $cek_freelance = $this->db->get_where('identitas_freelance', ['username' => $username])->row_array();
        $saldo = $cek_freelance['saldo'];
        $jml_saldo = $saldo + $jml_uang;
        $data_dana = array(
            'saldo' => $jml_saldo
        );
        $this->db->where('username', $username);
        $this->db->update('identitas_freelance', $data_dana);
        $data_review = array(
            'id_review' => '',
            'id_user'   => $this->session->userdata('id_user'),
            'kd_jasa'   => $kd_jasa,
            'tgl_review' => date('Y-m-d'),
            'komentar'  => htmlentities($this->input->post('komplain_alasan'))
        );
        $this->db->insert('tbl_review', $data_review);
        $data_transaksi = array(
            'status_transaksi' => 'GAJIAN'
        );
        $this->db->where('id_transaksi', $this->input->post('id_transaksi'));
        $this->db->update('tbl_transaksi', $data_dana);
    }
}