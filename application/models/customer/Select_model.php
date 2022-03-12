<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Select_model extends CI_Model
{
    public function data_diri()
    {
        $query  = $this->db->select('*, A.status as Ruler');
        $query  = $this->db->from('tbl_login as A');
        $query  = $this->db->join('tbl_identitas as B', 'A.id_user=B.id_user');
        $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataKonfirmasiFreelance()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('identitas_verified');
        $query  = $this->db->where('id_user', $this->session->userdata('id_user'));
        $query  = $this->db->order_by('id_verified', 'DESC');
        $query  = $this->db->get();
        return  $query->row_array();
    }
    public function getDataTransaksiOrder()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->where('status_transaksi', 200);
        $query  = $this->db->or_where('status_transaksi', 201);
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataTransaksiProses()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->where('status_transaksi', 'PROSES');
        $query  = $this->db->or_where('status_transaksi', 'KOMPLAIN');
        $query  = $this->db->get();
        return  $query->result();
    }
    public function getDataTransaksiSelesai()
    {
        $query  = $this->db->select('*');
        $query  = $this->db->from('tbl_transaksi as A');
        $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
        $query  = $this->db->where('status_transaksi', 'SELESAI');
        $query  = $this->db->or_where('status_transaksi', 'GAJIAN');
        $query  = $this->db->get();
        return  $query->result();
    }
    // public function data_diri_pembeli($id_pembeli)
    // {
    //     $query  = $this->db->select('*');
    //     $query  = $this->db->from('tbl_login as A');
    //     $query  = $this->db->join('identitas as B', 'A.id_user=B.id_user');
    //     $query  = $this->db->where('A.id_user', $id_pembeli);
    //     $query  = $this->db->get();
    //     return  $query->row_array();
    // }
    // public function getDataTransaksi($id)
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran, A.id_user as kd_pembeli');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->join('identitas as C', 'B.id_user=C.id_user');
    //     $query  = $this->db->where('A.id_transaksi', $id);
    //     $query  = $this->db->get();
    //     return  $query->row_array();
    // }
    // public function getDataBerkas()
    // {
    //     $query  = $this->db->select('*');
    //     $query  = $this->db->from('tbl_login as A');
    //     $query  = $this->db->join('identitas as B', 'A.id_user=B.id_user');
    //     $query  = $this->db->join('berkas as C', 'A.id_user=B.id_user');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->row_array();
    // }
    // public function getDataPelanggan()
    // {
    //     $query  = $this->db->select('*');
    //     $query  = $this->db->from('tbl_login as A');
    //     $query  = $this->db->join('identitas as B', 'A.id_user=B.id_user');
    //     $query  = $this->db->where('A.role', 'CUSTOMER');
    //     $query  = $this->db->where('A.status', 'AKTIF');
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataJasa()
    // {
    //     $query  = $this->db->select('*');
    //     $query  = $this->db->from('jasa as A');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataJasaDetail($id)
    // {
    //     $query  = $this->db->select('*');
    //     $query  = $this->db->from('portfolio as A');
    //     $query  = $this->db->where('A.kd_jasa', $id);
    //     $query  = $this->db->get();
    //     return  $query->row_array();
    // }
    // public function getDataKategori()
    // {
    //     $query  = $this->db->select('*');
    //     $query  = $this->db->from('kategori');
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataTransaksiB()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataTransaksiC()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->or_where('B.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataTransaksiB2()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.status', 'PROSES');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataTransaksiC1()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.status', 'PROSES');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->or_where('B.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataTransaksiB3()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.status', 'SELESAI');
    //     $query  = $this->db->or_where('A.status', 'GAJIAN');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataTransaksiKomplain()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.status', 'KOMPLAIN');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataTransaksiC3()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.status', 'SELESAI');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->or_where('A.status', 'GAJIAN');
    //     $query  = $this->db->or_where('B.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataHistory()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('history_wd as A');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataTransaksiProses()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.status', 'PROSES');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->result();
    // }
    // public function getDataGajian()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran, sum(gaji) as pengeluaran');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->where('A.status', 'GAJIAN');
    //     $query  = $this->db->get();
    //     return  $query->row_array();
    // }
    // public function getDataPendapatan()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran, sum(gaji) as pendapatan');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.status', 'SELESAI');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->or_where('A.status', 'GAJIAN');
    //     $query  = $this->db->or_where('B.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->row_array();
    // }
    // public function getDataPendapatan33()
    // {
    //     $query  = $this->db->select('*, A.status as pembayaran, sum(gaji) as pendapatan');
    //     $query  = $this->db->from('transaksi as A');
    //     $query  = $this->db->join('jasa as B', 'A.kd_jasa=B.kd_jasa');
    //     $query  = $this->db->where('A.status', 'GAJIAN');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->or_where('A.status', 'GAJIAN');
    //     $query  = $this->db->or_where('B.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->get();
    //     return  $query->row_array();
    // }
    // public function getDataAmbilGaji()
    // {
    //     $query  = $this->db->select('*, sum(total) as diambil');
    //     $query  = $this->db->from('history_wd as A');
    //     $query  = $this->db->where('A.id_user', $this->session->userdata('id_user'));
    //     $query  = $this->db->where('A.status', 'BERHASIL');
    //     $query  = $this->db->or_where('A.status', 'PROSES');
    //     $query  = $this->db->get();
    //     return  $query->row_array();
    // }
}


/* End of file Select_model.php and path \application\models\cs\Select_model.php */