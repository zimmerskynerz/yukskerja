<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    public function data_diri()
    {
        $query  = $this->db->select('*, A.status as Ruler');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_user=B.id_user');
        $query  = $this->db->join('identitas_freelance as C', 'B.id_user=C.id_user');
        $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataKategori()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('kategori');
        $query  = $this->db->where('status', 'AKTIF');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataJasa()
    {
        $query  = $this->db->select('*, A.status as status_jasa');
        $query  = $this->db->from('tbl_jasa as A');
        $query  = $this->db->join('kategori as B', 'A.id_kategori=B.id_kategori');
        $query  = $this->db->join('identitas_freelance as C', 'A.username=C.username');
        $query  = $this->db->where('C.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataBiaya()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('sett_biaya');
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataPortfolio($kd_jasa)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('jasa_portfolio');
        $query  = $this->db->where('kd_jasa', $kd_jasa);
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getTransaksiOrder()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.kd_jasa=B.kd_jasa');
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        $query  = $this->db->where('C.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->where('A.status_transaksi', 200);
        $query  = $this->db->group_by('A.id_transaksi');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getTransaksiProses()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.kd_jasa=B.kd_jasa');
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        $query  = $this->db->where('C.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->where('A.status_transaksi', 'PROSES');
        $query  = $this->db->or_where('A.status_transaksi', 'SELESAI');
        $query  = $this->db->or_where('A.status_transaksi', 'KOMPLAIN');
        $query  = $this->db->group_by('A.id_transaksi');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getTransaksiSelesai()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.kd_jasa=B.kd_jasa');
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        $query  = $this->db->where('C.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->where('A.status_transaksi', 'GAJIAN');
        $query  = $this->db->group_by('A.id_transaksi');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataPembeli($id_user)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_identitas as A');
        $query  = $this->db->join('tbl_login as B', 'A.id_user=B.id_user');
        $query  = $this->db->where('A.id_user', $id_user);
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataFreelance($kd_jasa)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_jasa as A');
        $query  = $this->db->join('identitas_freelance as B', 'A.username=B.username');
        $query  = $this->db->join('tbl_identitas as C', 'B.id_user=C.id_user');
        $query  = $this->db->join('tbl_login as D', 'C.id_user=D.id_user');
        $query  = $this->db->where('A.kd_jasa', $kd_jasa);
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataSett()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('sett_biaya');
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getPengeluaran()
    {
        $query = $this->db->select('sum(nominal) as pengeluaran');
        $query = $this->db->from('tbl_wd');
        $query  = $this->db->where('id_user', $this->session->userdata('id_user'));
        $query  = $this->db->where('status', 'BERHASIL');
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataWD()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_wd');
        $query  = $this->db->where('id_user', $this->session->userdata('id_user'));
        $query  = $this->db->order_by('id_wd', 'DESC');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getJumlahTransaksi()
    {
        $query  = $this->db->select('count(*) as jml_transaksi, A.kd_jasa as kd_jasa2');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.kd_jasa=B.kd_jasa');
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        $query  = $this->db->where('C.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->where('A.status_transaksi', 'GAJIAN');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getJumlahReview()
    {
        $query  = $this->db->select('count(*) as jml_review, A.kd_jasa as kd_jasa2');
        $query  = $this->db->from('tbl_review as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.kd_jasa=B.kd_jasa');
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        $query  = $this->db->where('C.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->get();
        return  $query->result();
    }
}


/* End of file Select_model.php and path \application\models\cs\Select_model.php */