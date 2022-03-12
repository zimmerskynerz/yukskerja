<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer/insert_model');
        $this->load->model('customer/update_model');
        $this->load->model('customer/select_model');
    }
    public function order()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'CUSTOMER') :
                if ($query_login['Ruler'] == 'PASSIVE') :
                    $this->load->view('Customer/beranda/passive');
                elseif ($query_login['Ruler'] == 'BLOKIR') :
                    $this->load->view('Customer/beranda/blokir');
                else :
                    $data_transaksi = $this->select_model->getDataTransaksiOrder();
                    $data = array(
                        'menu'      => 'TRANSAKSI ORDER',
                        'folder'    => 'transaksi/order',
                        'halaman'   => 'index',
                        'identitas' => $query_login,
                        'data_transaksi' => $data_transaksi
                    );
                    $this->load->view('Customer/index', $data);
                endif;
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect('owner');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
    public function proses()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'CUSTOMER') :
                if ($query_login['Ruler'] == 'PASSIVE') :
                    $this->load->view('Customer/beranda/passive');
                elseif ($query_login['Ruler'] == 'BLOKIR') :
                    $this->load->view('Customer/beranda/blokir');
                else :
                    $data_transaksi = $this->select_model->getDataTransaksiProses();
                    $data = array(
                        'menu'      => 'TRANSAKSI PROSES',
                        'folder'    => 'transaksi/proses',
                        'halaman'   => 'index',
                        'identitas' => $query_login,
                        'data_transaksi' => $data_transaksi
                    );
                    $this->load->view('Customer/index', $data);
                endif;
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect('owner');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
    public function selesai()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'CUSTOMER') :
                if ($query_login['Ruler'] == 'PASSIVE') :
                    $this->load->view('Customer/beranda/passive');
                elseif ($query_login['Ruler'] == 'BLOKIR') :
                    $this->load->view('Customer/beranda/blokir');
                else :
                    $data_transaksi = $this->select_model->getDataTransaksiSelesai();
                    $data = array(
                        'menu'      => 'TRANSAKSI SELESAI',
                        'folder'    => 'transaksi/selesai',
                        'halaman'   => 'index',
                        'identitas' => $query_login,
                        'data_transaksi' => $data_transaksi
                    );
                    $this->load->view('Customer/index', $data);
                endif;
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect('owner');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
    public function crud()
    {
        if (isset($_POST['komplain_kerja'])) {
            $upload_link = htmlentities($this->input->post('komplain_alasan'));
            if ($upload_link != null) :
                $this->update_model->komplain_kerja();
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Mengirim Komplain!</div>');
                redirect('customer/transaksi/selesai');
            else :
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Keterangan Komplain Harus Terisi!</div>');
                redirect('customer/transaksi/selesai');
            endif;
        }
        if (isset($_POST['terima_kerja'])) {
            $upload_link = htmlentities($this->input->post('komplain_alasan'));
            if ($upload_link != null) :
                $cek_transaksi = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $this->input->post('id_transaksi')])->row_array();
                $cek_biaya = $this->db->get_where('sett_biaya')->row_array();
                $fee = $cek_transaksi['jml_bayar'] * $cek_biaya['jasa_online'] / 100;
                $jml_uang = $cek_transaksi['jml_bayar'] - $fee;
                $this->insert_model->danaFee($fee);
                $this->update_model->dana_gajian($jml_uang);
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Terimakasih sudah menggunakan layanan kami!</div>');
            else :
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Keterangan Review Harus Terisi!</div>');
            endif;
            redirect('customer/transaksi/selesai');
        }
    }
}

/* End of file ControllerTransaksi.php and path \application\controllers\Customer\ControllerTransaksi.php */