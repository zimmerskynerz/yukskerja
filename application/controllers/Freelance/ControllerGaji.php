<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerGaji extends CI_Controller
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
        $set_biaya = $this->select_model->getDataBiaya();
        $data_freelance = $this->db->get_where('identitas_freelance', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $wd = $this->select_model->getDataWD();
        if ($query_login > 0) :
            if ($query_login['level'] == 'FREELANCER') :
                if ($query_login['Ruler'] == 'PASSIVE') :
                    $this->load->view('Freelance/beranda/passive');
                elseif ($query_login['Ruler'] == 'BLOKIR') :
                    $this->load->view('Freelance/beranda/blokir');
                else :
                    $sett = $this->select_model->getDataSett();
                    $data = array(
                        'menu'      => 'PENDAPATAN',
                        'folder'    => 'pendapatan',
                        'halaman'   => 'index',
                        'identitas' => $query_login,
                        'set_biaya' => $set_biaya,
                        'data_freelance'    => $data_freelance,
                        // Data Konten
                        'data_wd'   => $wd,
                        'sett'      => $sett
                    );
                    // var_dump($data_freelance);
                    // die;
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
    public function crud()
    {
        if (isset($_POST['simpan_wd'])) :
            $sett = $this->select_model->getDataSett();
            $biaya_wd = $sett['withdraw'];
            $jml_wd = htmlentities($this->input->post('jml_wd'));
            $saldo = htmlentities($this->input->post('saldo'));
            $total_wd = $biaya_wd + $jml_wd;
            if ($saldo > $total_wd) :
                $sisa_saldo = $saldo - $total_wd;
                $data_wd = array(
                    'id_user' => $this->session->userdata('id_user'),
                    'id_wd'   => '',
                    'tgl_wd'  => date('Y-m-d'),
                    'nominal'  => $jml_wd,
                    'status'   => 'PROSES',
                    'berita_acara'  => 'Withdraw dan admin ' . $biaya_wd
                );
                $this->db->insert('tbl_wd', $data_wd);
                $data_saldo = array(
                    'saldo' => $sisa_saldo
                );
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->update('identitas_freelance', $data_saldo);
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Silahkan Menunggu Uang Di Tranfer!</div>');
                redirect('cust-freelance/pendapatan');
            else :
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Saldo Tidak Cukup!</div>');
                redirect('cust-freelance/pendapatan');
            endif;
        endif;
    }
}

/* End of file ControllerGaji.php and path \application\controllers\Freelance\ControllerGaji.php */