<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerKategori extends CI_Controller
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
                $data_kategori = $this->select_model->getDataKategori();
                $data = array(
                    'menu'      => 'USER FREELANCE',
                    'folder'    => 'kategori',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_kategori'    => $data_kategori
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
        if (isset($_POST['simpanKategori'])) :
            # code...
            $this->insert_model->simpanKategori();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Menambah Kategori Jasa!</div>');
            redirect('admin/kategori');
        endif;
        if (isset($_POST['updateKategoriBaru'])) :
            # code...
            $this->update_model->updateKategori();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Merubah Kategori Jasa!</div>');
            redirect('admin/kategori');
        endif;
    }
}

/* End of file ControllerKategori.php and path \application\controllers\Service\ControllerKategori.php */