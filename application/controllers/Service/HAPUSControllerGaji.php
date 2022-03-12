<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerGaji extends CI_Controller
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
                $data = array(
                    'menu'      => 'PENDAPATAN',
                    'folder'    => 'withdraw',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    'data_wd'   => $data_wd
                    // Data Konten
                );
                $this->load->view('CS/index', $data);
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
        if (isset($_POST['tranferWD'])) :
            $data_wd = array(
                'status' => 'BERHASIL'
            );
            $this->db->where('id_user', $this->input->post('id_user'));
            $this->db->update('withdraw', $data_wd);
            redirect('admin/keuangan');
        endif;
    }
}

/* End of file ControllerGaji.php and path \application\controllers\Service\ControllerGaji.php */