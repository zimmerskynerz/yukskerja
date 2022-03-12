<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerSettingsBiaya extends CI_Controller
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
                $data_biaya = $this->select_model->getDataBiaya();
                $data = array(
                    'menu'      => 'SMTP',
                    'folder'    => 'settings/biaya',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_biaya' => $data_biaya
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
    public function snk()
    {
        $query_login = $this->db->get_where('tbl_login', ['email' => $this->session->userdata('email')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                $data_biaya = $this->select_model->getDataBiaya();
                $data = array(
                    'menu'      => 'SMTP',
                    'folder'    => 'settings/snk',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_biaya' => $data_biaya
                );
                $this->load->view('Owner/index', $data);
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('freelancer');
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
        if (isset($_POST['simpanBiaya'])) :
            $data_update = array(
                'tranfers'    => htmlspecialchars($this->input->post('tranfers')),
                'jasa_online'    => htmlspecialchars($this->input->post('jasa_online')),
                'jasa_offline'    => htmlspecialchars($this->input->post('jasa_offline')),
                'withdraw'    => htmlspecialchars($this->input->post('withdraw')),
                'pajak'    => htmlspecialchars($this->input->post('pajak'))
            );
            $this->db->update('sett_biaya', $data_update);
            $this->session->set_flashdata('berhasil_berubah', '<div class="alert alert-success" id="berhasil_berubah" role="alert">Berhasil Merubah Data Biaya!</div>');
            redirect('owner/settings/biaya');
        endif;
    }
}

/* End of file ControllerSettingsBiaya.php and path \application\controllers\Owner\ControllerSettingsBiaya.php */