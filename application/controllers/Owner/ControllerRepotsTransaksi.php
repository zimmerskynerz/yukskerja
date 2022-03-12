<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerRepotsTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('owner/insert_model');
        $this->load->model('owner/update_model');
        $this->load->model('owner/select_model');
    }
    public function index()
    {
        $query_login = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                $data_promo = $this->select_model->getDataPromo();
                $data_transaksi = $this->select_model->getDataTransaksiAll();
                $data = array(
                    'menu'      => 'LAPORAN TRANSAKSI',
                    'folder'    => 'laporan',
                    'halaman'   => 'transaksi/index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_promo' => $data_promo,
                    'data_transaksi' => $data_transaksi
                );
                $this->load->view('Owner/index', $data);
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect('customer');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
    public function invoice($id)
    {
        $query_login = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                $id_transaksi = $id;
                $data_transaksi = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $id])->row_array();
                $id_user = $data_transaksi['id_user'];
                $kd_jasa = $data_transaksi['kd_jasa'];
                $data_freelance = $this->select_model->getDataFreelanceInvoice($kd_jasa);
                $data_pelanggan = $this->select_model->getDataPembeli($id_user);
                $data = array(
                    'menu'      => 'INVOICE',
                    'folder'    => 'laporan/transaksi',
                    'halaman'   => 'invoice',
                    'identitas' => $query_login,
                    // Data Konten
                    'id_transaksi'     => $id_transaksi,
                    'data_transaksi'   => $data_transaksi,
                    'data_pelanggan'   => $data_pelanggan,
                    'data_freelance'   => $data_freelance
                );
                $this->load->view('Owner/index', $data);
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect('admin');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
    public function cetak()
    {
        $query_login = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                $data_promo = $this->select_model->getDataPromo();
                $data_transaksi = $this->select_model->getDataTransaksiTanggal();
                $harga_transaksi = $this->select_model->getDataTransaksiHarga();
                $fee = $harga_transaksi['harga_Transaksi'] * 10 / 100;
                $jml_transaksi = count($data_transaksi);
                $data = array(
                    'menu'      => 'LAPORAN TRANSAKSI',
                    'folder'    => 'laporan',
                    'halaman'   => 'transaksi/index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_promo' => $data_promo,
                    'data_transaksi' => $data_transaksi,
                    'jml_transaksi'     => $jml_transaksi,
                    'harga_transaksi'   => $harga_transaksi,
                    'fee'               => $fee
                );
                $this->load->view('Owner/laporan/transaksi/laporan', $data);
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect('customer');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
}

/* End of file ControllerRepotsTransaksi.php and path \application\controllers\Owner\ControllerRepotsTransaksi.php */