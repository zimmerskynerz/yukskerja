<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    public function data_diri()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_user=B.id_user');
        $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataPelanggan()
    {
        $query  = $this->db->select('*, B.status as status_verif, A.status as status_aktif');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_user=B.id_user');
        $query  = $this->db->where('A.level', 'CUSTOMER');
        $query  = $this->db->where('A.status', 'AKTIF');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataFreelance()
    {
        $query  = $this->db->select('*, C.status as status_verif, A.status as status_aktif');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_user=B.id_user');
        $query  = $this->db->join('identitas_freelance as C', 'C.id_user=B.id_user');
        $query  = $this->db->where('A.level', 'FREELANCER');
        $query  = $this->db->where('A.status', 'AKTIF');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataPelangganKonfirmasi()
    {
        $query  = $this->db->select('*, B.status as status_verif, A.status as status_aktif');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_user=B.id_user');
        $query  = $this->db->where('A.level', 'CUSTOMER');
        $query  = $this->db->where('A.status', 'KONFIRMASI');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataKategori()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('kategori');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataTransaksiOrder()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.kd_jasa=B.kd_jasa');
        $query  = $this->db->join('tbl_identitas as C', 'C.id_user=A.id_user');
        $query  = $this->db->where('A.status_transaksi', 201);
        $query  = $this->db->or_where('A.status_transaksi', 200);
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataWD()
    {
        $query = $this->db->select('*, A.status as WD_STATUS');
        $query  = $this->db->from('tbl_wd as A');
        $query  = $this->db->join('tbl_login as B', 'A.id_user=B.id_user');
        $query  = $this->db->join('tbl_identitas as C', 'A.id_user=C.id_user');
        $query  = $this->db->join('identitas_freelance as D', 'A.id_user=D.id_user');
        $query  = $this->db->order_by('A.id_wd', 'DESC');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataTransaksiAll()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->join('tbl_jasa as B', 'A.kd_jasa=B.kd_jasa');
        // Join Untuk Tau Penjual
        $query  = $this->db->join('identitas_freelance as C', 'B.username=C.username');
        // Join Untuk Tau Pembeli
        $query  = $this->db->join('tbl_identitas as D', 'A.id_user=D.id_user');
        $query  = $this->db->where('A.status_transaksi', 'GAJIAN');
        $query  = $this->db->group_by('A.id_transaksi');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataUang()
    {
        $query = $this->db->select('sum(gaji)*0.15 as pendapatan');
        $query = $this->db->from('transaksi as A');
        $query = $this->db->where('A.status', 'GAJIAN');
        $query = $this->db->get();
        return  $query->row_array();
    }
    public function getDataSett()
    {
        $query = $this->db->select('*');
        $query = $this->db->from('sett_biaya');
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getTransaksiSelesai()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->where('status_transaksi', 'SELESAI');
        $query  = $this->db->or_where('status_transaksi', 'GAJIAN');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataTransaksiSelesai()
    {
        $bulan = date('m');
        $tahun = date('Y');
        $query = $this->db->select('sum(jml_bayar) as gajian');
        $query = $this->db->from('tbl_transaksi');
        $query = $this->db->where('month(tgl_transaksi)', $bulan);
        $query = $this->db->where('year(tgl_transaksi)', $tahun);
        $query = $this->db->where('status_transaksi', 'GAJIAN');
        $query = $this->db->get();
        return  $query->row_array();
    }
    public function getDataKasMasuk()
    {
        $query = $this->db->select('sum(jml_nominal) as kas_masuk');
        $query = $this->db->from('buku_besar');
        $query = $this->db->where('status', 'MASUK');
        $query = $this->db->get();
        return  $query->row_array();
    }
    public function getDataKasKeluar()
    {
        $query = $this->db->select('sum(jml_nominal) as kas_keluar');
        $query = $this->db->from('buku_besar');
        $query = $this->db->where('status', 'KELUAR');
        $query = $this->db->get();
        return  $query->row_array();
    }
    public function getDataFreelanceInvoice($kd_jasa)
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
    public function getDataPembeli($id_user)
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_identitas as A');
        $query  = $this->db->join('tbl_login as B', 'A.id_user=B.id_user');
        $query  = $this->db->where('A.id_user', $id_user);
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getTransaksiKomplain()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->where('status_transaksi', 'KOMPLAIN');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getBukuBesar()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('buku_besar');
        $query  = $this->db->order_by('id_buku', 'DESC');
        $query  = $this->db->get();
        return  $query->result();
    }
}


/* End of file Select_model.php and path \application\models\cs\Select_model.php */