<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cs/insert_model');
        $this->load->model('cs/update_model');
        $this->load->model('cs/select_model');
    }
    public function order()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'ADMIN') :
                $data_transaksi = $this->select_model->getDataTransaksiOrder();
                $data = array(
                    'menu'      => 'TRANSAKSI ORDER',
                    'folder'    => 'transaksi',
                    'halaman'   => 'order/index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_transaksi'    => $data_transaksi
                );
                $this->load->view('Cs/index', $data);
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
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
            if ($query_login['level'] == 'ADMIN') :
                $data_transaksi = $this->select_model->getTransaksiSelesai();
                $data = array(
                    'menu'      => 'TRANSAKSI SELESAI',
                    'folder'    => 'transaksi',
                    'halaman'   => 'selesai/index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_transaksi'    => $data_transaksi
                );
                $this->load->view('Cs/index', $data);
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
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
    public function invoice($id)
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'ADMIN') :
                $id_transaksi = $id;
                $data_transaksi = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $id])->row_array();
                $id_user = $data_transaksi['id_user'];
                $kd_jasa = $data_transaksi['kd_jasa'];
                $data_freelance = $this->select_model->getDataFreelanceInvoice($kd_jasa);
                $data_pelanggan = $this->select_model->getDataPembeli($id_user);
                $data = array(
                    'menu'      => 'INVOICE',
                    'folder'    => 'invoice',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Konten
                    'id_transaksi'     => $id_transaksi,
                    'data_transaksi'   => $data_transaksi,
                    'data_pelanggan'   => $data_pelanggan,
                    'data_freelance'   => $data_freelance
                );
                $this->load->view('Cs/index', $data);
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
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
    public function komplain()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'ADMIN') :
                $data_transaksi = $this->select_model->getTransaksiKomplain();
                $data = array(
                    'menu'      => 'TRANSAKSI SELESAI',
                    'folder'    => 'transaksi',
                    'halaman'   => 'komplain/index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_transaksi'    => $data_transaksi
                );
                $this->load->view('Cs/index', $data);
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
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
        if (isset($_POST['terima_manual'])) :
            $this->update_model->terima_manual();
            $this->session->set_flashdata('data_berhasil', '<div class="alert alert-success" id="data_berhasil" role="alert">Berhasil Konfirmasi Manual!</div>');
            redirect('admin/transaksi/order');
        endif;
    }
}

/* End of file ControllerTransaksi.php and path \application\controllers\Service\ControllerTransaksi.php */