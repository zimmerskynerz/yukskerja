<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerHadiahPromo extends CI_Controller
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
                $data = array(
                    'menu'      => 'HADIAH PROMO',
                    'folder'    => 'hadiah/promo',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_promo' => $data_promo
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
    public function crud()
    {
        if (isset($_POST['simpanPromo'])) :
            $tgl_mulai = htmlentities($this->input->post('mulai'));
            $tgl_selesai = htmlentities($this->input->post('selesai'));
            if ($tgl_mulai > $tgl_selesai) :
                $this->session->set_flashdata('gagal_tanggal', '<div class="alert alert-danger" id="gagal_tanggal" role="alert">Tanggal Mulai Lebih Besar Dari Tanggal Selesai!</div>');
                redirect('owner/hadiah/promo');
            else :
                $this->insert_model->simpanPromo();
                redirect('owner/hadiah/promo');
            endif;
        endif;
        if (isset($_POST['updatePromo'])) :
            $tgl_mulai = htmlentities($this->input->post('mulai'));
            $tgl_selesai = htmlentities($this->input->post('selesai'));
            if ($tgl_mulai > $tgl_selesai) :
                $this->session->set_flashdata('gagal_tanggal', '<div class="alert alert-danger" id="gagal_tanggal" role="alert">Tanggal Mulai Lebih Besar Dari Tanggal Selesai!</div>');
                redirect('owner/hadiah/promo');
            else :
                $this->update_model->updatePromo();
                redirect('owner/hadiah/promo');
            endif;
        endif;
    }
}

/* End of file ControllerHadiahPromo.php and path \application\controllers\Owner\ControllerHadiahPromo.php */