<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerUsersCustomer extends CI_Controller
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
                $data_customer = $this->select_model->getDataCustomer();
                $data = array(
                    'menu'      => 'USER CUSTOMER',
                    'folder'    => 'user/customer',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_customer' => $data_customer
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
    public function detail($id)
    {
        $query_login = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                $detail_customer = $this->select_model->getDataCustomerDetail($id);
                $data_transaksi = $this->select_model->getDataTransaksiCust($id);
                $data = array(
                    'menu'      => 'USER CUSTOMER',
                    'folder'    => 'user/customer',
                    'halaman'   => 'detail',
                    'identitas' => $query_login,
                    // Data Content
                    'detail_customer' => $detail_customer,
                    'data_transaksi'  => $data_transaksi
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

/* End of file ControllerUsersCustomer.php and path \application\controllers\Owner\ControllerUsersCustomer.php */