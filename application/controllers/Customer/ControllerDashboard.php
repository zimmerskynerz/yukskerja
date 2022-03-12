<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerDashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer/insert_model');
        $this->load->model('customer/update_model');
        $this->load->model('customer/select_model');
    }
    public function index()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'CUSTOMER') :
                if ($query_login['Ruler'] == 'PASSIVE') :
                    $this->load->view('Customer/beranda/passive');
                elseif ($query_login['Ruler'] == 'BLOKIR') :
                    $this->load->view('Customer/beranda/blokir');
                else :
                    $data = array(
                        'menu'      => 'DASHBOARD',
                        'folder'    => 'beranda',
                        'halaman'   => 'index',
                        'identitas' => $query_login
                    );
                    $this->load->view('Customer/index', $data);
                endif;
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
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

/* End of file ControllerDashboard.php and path \application\controllers\Customer\ControllerDashboard.php */