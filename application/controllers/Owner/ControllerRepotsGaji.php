<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerRepotsGaji extends CI_Controller
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
                $data_freelance = $this->select_model->getDataFreelance();
                $data = array(
                    'menu'      => 'LAPORAN GAJI',
                    'folder'    => 'laporan/withdraw',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_freelance'  => $data_freelance
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
    public function detail($id)
    {
        $query_login = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                $data_wd = $this->select_model->getDataWDFreelance($id);
                $data = array(
                    'menu'      => 'LAPORAN GAJI',
                    'folder'    => 'laporan/withdraw',
                    'halaman'   => 'detail_data',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_wd'  => $data_wd
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
}

/* End of file ControllerRepotsGaji.php and path \application\controllers\Owner\ControllerRepotsGaji.php */