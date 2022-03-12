<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    public function getDataDiri()
    {
        $query  = $this->db->select('*, A.status as Ruler');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_user=B.id_user');
        $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataKategori()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('kategori as A');
        $query  = $this->db->where('A.status', 'AKTIF');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataJasa()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('kategori as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.id_kategori=B.id_kategori');
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        $query  = $this->db->join('tbl_identitas as D', 'C.id_user=D.id_user');
        $query  = $this->db->join('tbl_login as E', 'C.id_user=E.id_user');
        $query  = $this->db->join('jasa_portfolio as F', 'F.kd_jasa=B.kd_jasa');
        $query  = $this->db->where('F.status', 'UTAMA');
        $query  = $this->db->where('E.status', 'AKTIF');
        $query  = $this->db->limit(3, 0);
        $query  = $this->db->order_by("RAND ()");
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataJasaKategori($nm_kategori)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('kategori as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.id_kategori=B.id_kategori');
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        $query  = $this->db->join('tbl_identitas as D', 'C.id_user=D.id_user');
        $query  = $this->db->join('tbl_login as E', 'C.id_user=E.id_user');
        $query  = $this->db->join('jasa_portfolio as F', 'F.kd_jasa=B.kd_jasa');
        $query  = $this->db->where('F.status', 'UTAMA');
        $query  = $this->db->where('E.status', 'AKTIF');
        $query  = $this->db->where('A.nm_kategori', $nm_kategori);
        $query  = $this->db->order_by("RAND ()");
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataDetailProduk($kd_jasa)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_jasa as A');
        $query = $this->db->join('identitas_freelance as B', 'A.username=B.username');
        $query = $this->db->join('tbl_identitas as C', 'B.id_user=C.id_user');
        $query = $this->db->join('tbl_login as D', 'D.id_user=C.id_user');
        $query = $this->db->join('jasa_portfolio as E', 'E.kd_jasa=A.kd_jasa');
        $query = $this->db->where('A.kd_jasa', $kd_jasa);
        $query = $this->db->where('E.status', 'UTAMA');
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getListProduk()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('kategori as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.id_kategori=B.id_kategori');
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        $query  = $this->db->join('tbl_identitas as D', 'C.id_user=D.id_user');
        $query  = $this->db->join('tbl_login as E', 'C.id_user=E.id_user');
        $query  = $this->db->join('jasa_portfolio as F', 'F.kd_jasa=B.kd_jasa');
        $query  = $this->db->where('F.status', 'UTAMA');
        $query  = $this->db->where('E.status', 'AKTIF');
        $query  = $this->db->order_by("RAND ()");
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataPortfolio($kd_jasa)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('jasa_portfolio');
        $query = $this->db->where('kd_jasa', $kd_jasa);
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataReview($kd_jasa)
    {
        $query = $this->db->select('*');
        $query = $this->db->from('tbl_review as A');
        $query = $this->db->join('tbl_identitas as B', 'A.id_user=B.id_user');
        $query = $this->db->where('A.kd_jasa', $kd_jasa);
        $query  = $this->db->get();
        return  $query->result();
    }
}


/* End of file Select_model.php and path \application\models\menu_utama\Select_model.php */