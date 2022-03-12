<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerDaftarFreelance extends CI_Controller
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
                    $status = $query_login['Ruler'];
                    if ($status == 'AKTIF') :
                        $halaman = 'index';
                    elseif ($status == 'KONFIRMASI') :
                        $halaman = 'menunggu';
                    endif;
                    $data_komentar = $this->select_model->getDataKonfirmasiFreelance();
                    $data = array(
                        'menu'      => 'PENDAFTARAN FREELANCE',
                        'folder'    => 'daftar',
                        'halaman'   => $halaman,
                        'identitas' => $query_login,
                        'data_komentar' => $data_komentar
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
    public function crud()
    {
        if (isset($_POST['Kirim_Berkas'])) :
            $cek_berkas = $this->db->get_where('identitas_freelance', ['id_user' => $this->input->post('id_user')])->row_array();
            if ($cek_berkas > 0) :
                $this->update_model->daftarFreelanceKembali();
                $this->session->set_flashdata('berhasil_daftar', '<div class="alert alert-success" id="berhasil_daftar" role="alert">Berhasil Mengirim Data! Silahkan menunggu konfirmasi selanjutnya</div>');
                redirect('customer/freelancer');
            else :
                $cek_data = $this->db->get_where('tbl_identitas', ['no_hp' => htmlentities($this->input->post('no_hp'))])->row_array();
                if ($cek_data > 0) :
                    $this->session->set_flashdata('gagal_daftar', '<div class="alert alert-danger" id="gagal_daftar" role="alert">Nomor HP Sudah digunakan!</div>');
                    redirect('customer/freelancer');
                else :
                    $cek_data = $this->db->get_where('tbl_identitas', ['no_id' => htmlentities($this->input->post('no_id'))])->row_array();
                    if ($cek_data > 0) :
                        $this->session->set_flashdata('gagal_daftar', '<div class="alert alert-danger" id="gagal_daftar" role="alert">Nomor Identitas Sudah digunakan!</div>');
                        redirect('customer/freelancer');
                    else :
                        $cek_norek = $this->db->get_where('identitas_freelance', ['no_rek' => $this->input->post('no_rek')])->row_array();
                        if ($cek_norek > 0) :
                            $this->session->set_flashdata('gagal_daftar', '<div class="alert alert-danger" id="gagal_daftar" role="alert">Nomor Rekening Sudah digunakan!</div>');
                            redirect('customer/freelancer');
                        else :
                            $this->update_model->daftarFreelance();
                            $this->session->set_flashdata('berhasil_daftar', '<div class="alert alert-success" id="berhasil_daftar" role="alert">Berhasil Mengirim Data! Silahkan menunggu konfirmasi selanjutnya</div>');
                            redirect('customer/freelancer');
                        endif;
                    endif;
                endif;
            endif;
        endif;
    }
}

/* End of file ControllerDaftarFreelance.php and path \application\controllers\Customer\ControllerDaftarFreelance.php */