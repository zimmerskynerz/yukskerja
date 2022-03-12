<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    public function simpanKategori()
    {
        $data_kategori = array(
            'id_kategori' => '',
            'nm_kategori'   => htmlentities($this->input->post('nm_kategori')),
            'ket_kategori'   => htmlentities($this->input->post('ket_kategori')),
            'status'   => 'AKTIF'
        );
        $this->db->insert('kategori', $data_kategori);
    }
    public function konfirmasi_tolakfreelance()
    {
        $data_konfirmasi = array(
            'id_verified'       => '',
            'id_user'           => htmlentities($this->input->post('id_user')),
            'role'              => 'FREELANCE',
            'tgl_konfirmasi'    => date('Y-m-d'),
            'komentar'          => htmlentities($this->input->post('komentar'))
        );
        $this->db->insert('identitas_verified', $data_konfirmasi);
    }
    public function simpan_kas()
    {
        $data_kas = array(
            'id_buku'             => '',
            'tgl_transaksi'       => date('Y-m-d'),
            'jml_nominal'         => htmlentities($this->input->post('jml_nominal')),
            'status'              => htmlentities($this->input->post('jenis_kas')),
            'keterangan'          => htmlentities($this->input->post('berita_acara'))
        );
        $this->db->insert('buku_besar', $data_kas);
    }
}


/* End of file Insert_model.php and path \application\models\cs\Insert_model.php */