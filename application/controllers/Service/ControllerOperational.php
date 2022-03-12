<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerOperational extends CI_Controller
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
                $data_kas = $this->select_model->getBukuBesar();
                $data = array(
                    'menu'      => 'OPERATIONAL',
                    'folder'    => 'operational',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_kas'  => $data_kas
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
        if (isset($_POST['simpan_kas'])) :
            $this->insert_model->simpan_kas();
            redirect('admin/bendahara/operational');
            $this->session->set_flashdata('data_berhasil', '<div class="alert alert-success" id="data_berhasil" role="alert">Berhasil Tambah Alur Kas!</div>');
        endif;
    }
}

/* End of file ControllerOperational.php and path \application\controllers\Service\ControllerOperational.php */