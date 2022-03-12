<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerRepotsKas extends CI_Controller
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
                $data_kas = $this->select_model->getBukuBesar();
                $data = array(
                    'menu'      => 'LAPORAN KAS',
                    'folder'    => 'laporan/kas',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_kas'  => $data_kas
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
                $jenis_kasi = $this->input->post('jenis_kas');
                if ($jenis_kasi == 'MASUK') :
                    $halaman = 'masuk';
                    $data_kas = $this->select_model->getBukuBesarTanggal($jenis_kasi);
                elseif ($jenis_kasi == 'KELUAR') :
                    $halaman = 'keluar';
                    $data_kas = $this->select_model->getBukuBesarTanggal($jenis_kasi);
                else :
                    $halaman = 'all';
                    $data_kas = $this->select_model->getBukuBesarTanggalAll();
                endif;
                $jml_pemasukan = $this->select_model->getPemasukan();
                $jml_pengeluaran = $this->select_model->getPengeluaran();
                $saldo = $jml_pemasukan['jumlah_pemasukan'] - $jml_pengeluaran['jumlah_pengeluaran'];
                $data = array(
                    'menu'      => 'LAPORAN KAS',
                    'folder'    => 'laporan/kas',
                    'halaman'   => $halaman,
                    'identitas' => $query_login,
                    'data_kas'  => $data_kas,
                    'jumlah_pemasukan'  => $jml_pemasukan,
                    'jumlah_pengeluaran' => $jml_pengeluaran,
                    'saldo'     => $saldo
                );
                $this->load->view('Owner/laporan/kas/' . $halaman, $data);
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

/* End of file ControllerRepotsKas.php and path \application\controllers\Owner\ControllerRepotsKas.php */