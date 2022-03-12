<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    public function resetPelanggan($random)
    {
        $data_login = array(
            'password' => password_hash($random, PASSWORD_DEFAULT)
        );
        $this->db->where('email', htmlentities($this->input->post('email')));
        $this->db->update('tbl_login', $data_login);
    }
    public function deletPelanggan()
    {
        $data_login = array(
            'email'     => null,
            'status'    => 'BLOKIR'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $data_login);
    }
    public function konfirmasi_tolakfreelance()
    {
        $data_login = array(
            'status'    => 'AKTIF'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $data_login);
    }
    public function terima_pengajuan()
    {
        $id_user = htmlentities($this->input->post('id_user'));
        $data_identitas = array(
            'level'  => 'FREELANCER',
            'status' => 'AKTIF'
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_login', $data_identitas);
        $data_freelance = array(
            'status'        => 'AKTIF'
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('identitas_freelance', $data_freelance);
    }
    public function delete_freelance()
    {
        $data_login = array(
            'email'     => null,
            'status'    => 'BLOKIR'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $data_login);
    }
    public function updateKategori()
    {
        $data_kategori = array(
            'nm_kategori'   => htmlentities($this->input->post('nm_kategori')),
            'ket_kategori'   => htmlentities($this->input->post('ket_kategori'))
        );
        $this->db->where('id_kategori', htmlentities($this->input->post('id_kategori')));
        $this->db->update('kategori', $data_kategori);
    }
    public function terima_manual()
    {
        $data_manual = array(
            'status_transaksi' => 200
        );
        $this->db->where('id_transaksi', htmlentities($this->input->post('id_transaksi')));
        $this->db->update('tbl_transaksi', $data_manual);
    }
    public function tolakWD()
    {
        $cek_freelance = $this->db->get_where('identitas_freelance', ['id_user' => htmlentities($this->input->post('id_user'))])->row_array();
        $saldo = $cek_freelance['saldo'];
        $data_WD = array(
            'status' => 'GAGAL',
            'berita_acara'  => htmlentities($this->input->post('berita_acara'))
        );
        $this->db->where('id_wd', htmlentities($this->input->post('id_wd')));
        $this->db->update('tbl_wd', $data_WD);
        $sett = $this->db->get_where('sett_biaya')->row_array();
        $dana_transfer = $sett['withdraw'];
        $nominal = htmlentities($this->input->post('nominal'));
        $jml_dana = $saldo + $dana_transfer + $nominal;
        $data_freelance = array(
            'saldo' => $jml_dana
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('identitas_freelance', $data_freelance);
    }
    public function tranferWD()
    {
        $id_user = htmlentities($this->input->post('id_user'));
        $nm_lengkap = htmlentities($this->input->post('an_bank'));
        $sett = $this->db->get_where('sett_biaya')->row_array();
        $data_WD = array(
            'status' => 'BERHASIL'
        );
        $this->db->where('id_wd', htmlentities($this->input->post('id_wd')));
        $this->db->update('tbl_wd', $data_WD);
        $data_buku = array(
            'id_buku' => '',
            'tgl_transaksi'     => date('Y-m-d'),
            'jml_nominal'       => $sett['withdraw'],
            'status'            => 'MASUK',
            'keterangan'        => 'Fee Transfer dari user ' . $id_user . '' . $nm_lengkap
        );
        $this->db->insert('buku_besar', $data_buku);
    }
}


/* End of file Update_model.php and path \application\models\Cs\Update_model.php */