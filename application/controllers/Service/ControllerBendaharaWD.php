<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerBendaharaWD extends CI_Controller
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
                $data_freelance = $this->select_model->getDataFreelance();
                $data = array(
                    'menu'      => 'PENDAPATAN',
                    'folder'    => 'bendahara',
                    'halaman'   => 'withdraw/index',
                    'identitas' => $query_login,
                    'data_wd'   => $data_wd,
                    'data_freelance' => $data_freelance
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
        if (isset($_POST['tolakWD'])) :
            $data_alasan = htmlentities($this->input->post('berita_acara'));
            if ($data_alasan == null) :
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Alasan Penolakan Harus Terisi</div>');
            else :
                $this->update_model->tolakWD();
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Menolak WD!</div>');
            endif;
            redirect('admin/bendahara/withdraw');
        endif;
        if (isset($_POST['tranferWD'])) :
            $this->update_model->tranferWD();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Transfer Uang!</div>');
            redirect('admin/bendahara/withdraw');
        endif;
    }
}

/* End of file ControllerBendaharaWD.php and path \application\controllers\Service\ControllerBendaharaWD.php */