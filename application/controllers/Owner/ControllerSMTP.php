<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerSMTP extends CI_Controller
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
                $data_smtp = $this->select_model->getDataSMTP();
                $data = array(
                    'menu'      => 'SMTP',
                    'folder'    => 'smtp',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_smtp' => $data_smtp
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
        if (isset($_POST['simpanSMTP'])) :
            $data_update = array(
                'host'    => htmlspecialchars($this->input->post('host')),
                'username'    => htmlspecialchars($this->input->post('username')),
                'password'    => htmlspecialchars($this->input->post('password')),
                'port'    => htmlspecialchars($this->input->post('port')),
                'setFrom'    => htmlspecialchars($this->input->post('setFrom'))
            );
            $this->db->update('config_smtp', $data_update);
            $this->session->set_flashdata('berhasil_berubah', '<div class="alert alert-success" id="berhasil_berubah" role="alert">Berhasil Merubah Data SMTP!</div>');
            redirect('owner/smtp');
        endif;
    }
}

/* End of file ControllerSMTP.php and path \application\controllers\Owner\ControllerSMTP.php */