<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerDashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('freelance/insert_model');
        $this->load->model('freelance/update_model');
        $this->load->model('freelance/select_model');
    }
    public function index()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'FREELANCER') :
                if ($query_login['Ruler'] == 'PASSIVE') :
                    $this->load->view('Freelance/beranda/passive');
                elseif ($query_login['Ruler'] == 'BLOKIR') :
                    $this->load->view('Freelance/beranda/blokir');
                else :
                    $pengeluaran = $this->select_model->getPengeluaran();
                    $data_transaksiproses = $this->select_model->getTransaksiProses();
                    $data_transaksiselesai = $this->select_model->getTransaksiSelesai();
                    $data = array(
                        'menu'      => 'DASHBOARD',
                        'folder'    => 'beranda',
                        'halaman'   => 'index',
                        'identitas' => $query_login,
                        // Konten
                        'pengeluaran' => $pengeluaran,
                        'transaksi_proses' => $data_transaksiproses,
                        'data_transaksi'   => $data_transaksiselesai
                    );
                    $this->load->view('Freelance/index', $data);
                endif;
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
            else :
                redirect('owner');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
}

/* End of file ControllerDashboard.php and path \application\controllers\Freelance\ControllerDashboard.php */