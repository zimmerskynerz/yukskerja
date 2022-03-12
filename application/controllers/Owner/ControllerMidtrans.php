<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerMidtrans extends CI_Controller
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
                $data_midtrans = $this->select_model->getDataMidtrans();
                $data = array(
                    'menu'      => 'MIDTRANS',
                    'folder'    => 'midtrans',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_midtrans' => $data_midtrans
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
        if (isset($_POST['simpanMidtrans'])) :
            $data_update = array(
                'id_merchan'    => htmlspecialchars($this->input->post('id_merchan')),
                'client_key'    => htmlspecialchars($this->input->post('client_key')),
                'server_key'    => htmlspecialchars($this->input->post('server_key')),
                'snap_js'    => htmlspecialchars($this->input->post('snap_js'))
            );
            $this->db->update('config_midtrans', $data_update);
            $this->session->set_flashdata('berhasil_berubah', '<div class="alert alert-success" id="berhasil_berubah" role="alert">Berhasil Merubah Data Midtrans!</div>');
            redirect('owner/midtrans');
        endif;
    }
}

/* End of file ControllerMidtrans.php and path \application\controllers\Owner\ControllerMidtrans.php */