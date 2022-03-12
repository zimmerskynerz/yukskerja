<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerProduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('freelance/insert_model');
        $this->load->model('freelance/update_model');
        $this->load->model('freelance/select_model');
    }
    public function index()
    {
        $query_login = $this->select_model->data_diri();
        $set_biaya = $this->select_model->getDataBiaya();
        $data_freelance = $this->db->get_where('identitas_freelance', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $data_transaksi = $this->select_model->getJumlahTransaksi();
        $data_review = $this->select_model->getJumlahReview();
        if ($query_login > 0) :
            if ($query_login['level'] == 'FREELANCER') :
                if ($query_login['Ruler'] == 'PASSIVE') :
                    $this->load->view('Freelance/beranda/passive');
                elseif ($query_login['Ruler'] == 'BLOKIR') :
                    $this->load->view('Freelance/beranda/blokir');
                else :
                    $data_kategori = $this->select_model->getDataKategori();
                    $data_jasa = $this->select_model->getDataJasa();
                    $data = array(
                        'menu'      => 'PRODUK',
                        'folder'    => 'jasa',
                        'halaman'   => 'index',
                        'identitas' => $query_login,
                        'set_biaya' => $set_biaya,
                        'data_freelance'    => $data_freelance,
                        // Data Konten
                        'data_kategori'     => $data_kategori,
                        'data_jasa'         => $data_jasa,
                        'data_transaksi'    => $data_transaksi,
                        'data_review'       => $data_review
                    );
                    // var_dump($data_freelance);
                    // die;
                    $this->load->view('Freelance/index', $data);
                endif;
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
            else :
                redirect('owner');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
    public function portfolio($id)
    {
        $query_login = $this->select_model->data_diri();
        $set_biaya = $this->select_model->getDataBiaya();
        $data_freelance = $this->db->get_where('identitas_freelance', ['id_user' => $this->session->userdata('id_user')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'FREELANCER') :
                if ($query_login['Ruler'] == 'PASSIVE') :
                    $this->load->view('Freelance/beranda/passive');
                elseif ($query_login['Ruler'] == 'BLOKIR') :
                    $this->load->view('Freelance/beranda/blokir');
                else :
                    $kd_jasa = $id;
                    $data_portfolio = $this->select_model->getDataPortfolio($kd_jasa);
                    $data = array(
                        'menu'      => 'PRODUK',
                        'folder'    => 'jasa',
                        'halaman'   => 'portfolio',
                        'identitas' => $query_login,
                        'set_biaya' => $set_biaya,
                        'data_freelance'     => $data_freelance,
                        // Data Konten
                        'data_portfolio'     => $data_portfolio,
                        'kd_jasa'            => $kd_jasa
                    );
                    // var_dump($data_freelance);
                    // die;
                    $this->load->view('Freelance/index', $data);
                endif;
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
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
        if (isset($_POST['simpan_username'])) :
            $cek_freelance = $this->db->get_where('identitas_freelance', ['username' => htmlentities($this->input->post('username'))])->row_array();
            if ($cek_freelance > 0) :
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Username Sudah Ada!</div>');
                redirect('cust-freelance/produk');
            else :
                $this->update_model->simpan_username();
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Username Berhasil Didaftarkan!</div>');
                redirect('cust-freelance/produk');
            endif;
        endif;
        if (isset($_POST['simpan_jasa'])) :
            $this->insert_model->simpan_jasa();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Menambah Jasa!</div>');
            redirect('cust-freelance/produk');
        endif;
        if (isset($_POST['delete_jasa'])) :
            $this->update_model->delete_jasa();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Menghapus Jasa!</div>');
            redirect('cust-freelance/produk');
        endif;
        if (isset($_POST['update_jasa'])) :
            $this->update_model->update_jasa();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Merubah Jasa!</div>');
            redirect('cust-freelance/produk');
        endif;
        if (isset($_POST['simpan_portfolio'])) :
            $kd_jasa = htmlentities($this->input->post('kd_jasa'));
            $this->insert_model->simpan_portfolio();
            redirect('cust-freelance/produk/portfolio/' . $kd_jasa);
        endif;
        if (isset($_POST['utama_portfolio'])) :
            $kd_jasa = htmlentities($this->input->post('kd_jasa'));
            $cek_data = $this->db->get_where('jasa_portfolio', ['kd_jasa' => $kd_jasa, 'status' => 'UTAMA'])->row_array();
            if ($cek_data > 0) :
                $data_tambahan = array('status' => 'TAMBAHAN');
                $this->db->where('id_portfolio', $cek_data['id_portfolio']);
                $this->db->update('jasa_portfolio', $data_tambahan);
                $data_utama = array('status' => 'UTAMA');
                $this->db->where('id_portfolio', htmlentities($this->input->post('id_portfolio')));
                $this->db->update('jasa_portfolio', $data_utama);
                $data_utama_jasa = array('status' => 'ACTIVE');
                $this->db->where('kd_jasa', htmlentities($this->input->post('kd_jasa')));
                $this->db->update('tbl_jasa', $data_utama_jasa);
            else :
                $data_utama = array('status' => 'UTAMA');
                $this->db->where('id_portfolio', htmlentities($this->input->post('id_portfolio')));
                $this->db->update('jasa_portfolio', $data_utama);
                $data_utama_jasa = array('status' => 'ACTIVE');
                $this->db->where('kd_jasa', htmlentities($this->input->post('kd_jasa')));
                $this->db->update('tbl_jasa', $data_utama_jasa);
            endif;
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Aktivasi Portfolio Utama Jasa!</div>');
            redirect('cust-freelance/produk/portfolio/' . $kd_jasa);
        endif;
        if (isset($_POST['update_portfolio'])) :
            $kd_jasa = htmlentities($this->input->post('kd_jasa'));
            $this->update_model->update_portfolio();
            redirect('cust-freelance/produk/portfolio/' . $kd_jasa);
        endif;
        if (isset($_POST['hapus_portfolio'])) :
            $kd_jasa = htmlentities($this->input->post('kd_jasa'));
            $this->update_model->hapus_portfolio();
            redirect('cust-freelance/produk/portfolio/' . $kd_jasa);
        endif;
    }
}

/* End of file ControllerProduk.php and path \application\controllers\Freelance\ControllerProduk.php */