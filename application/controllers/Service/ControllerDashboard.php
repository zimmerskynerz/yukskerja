<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerDashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cs/insert_model');
        $this->load->model('cs/update_model');
        $this->load->model('cs/select_model');
    }
    public function index()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'ADMIN') :
                $data_wd = $this->select_model->getDataWD();
                $data_transaksi = $this->select_model->getDataTransaksiAll();
                $data_freelance = count($this->select_model->getDataFreelance());
                $data_pelanggan = count($this->select_model->getDataPelanggan());
                $data_penghasilantransaksi = $this->select_model->getDataTransaksiSelesai();
                $sett = $this->select_model->getDataSett();
                $data_kasMasuk = $this->select_model->getDataKasMasuk();
                $data_kasKeluar = $this->select_model->getDataKasKeluar();
                $saldo_kas = $data_kasMasuk['kas_masuk'] - $data_kasKeluar['kas_keluar'];
                $data_penghasilan = $data_penghasilantransaksi['gajian'] * $sett['jasa_online'] / 100;
                $data = array(
                    'menu'      => 'DASHBOARD',
                    'folder'    => 'beranda',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    'data_wd'   => $data_wd,
                    'data_transaksi' => $data_transaksi,
                    'jml_pelanggan' => $data_pelanggan,
                    'jml_freelance' => $data_freelance,
                    'data_penghasilan'  => $data_penghasilan,
                    'saldo_kas' => $saldo_kas
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
}

/* End of file ControllerDashboard.php and path \application\controllers\Service\ControllerDashboard.php */