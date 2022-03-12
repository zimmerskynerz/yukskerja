<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerUsersFreelancer extends CI_Controller
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
                    'menu'      => 'USER FREELANCE',
                    'folder'    => 'user/freelance',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_freelance' => $data_freelance
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
}

/* End of file ControllerUsersFreelancer.php and path \application\controllers\Owner\ControllerUsersFreelancer.php */