<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerTransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('freelance/insert_model');
        $this->load->model('freelance/update_model');
        $this->load->model('freelance/select_model');
    }
    public function order()
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
                    $data_kategori = $this->select_model->getDataKategori();
                    $data_transaksi = $this->select_model->getTransaksiOrder();
                    $data = array(
                        'menu'      => 'TRANSAKSI ORDER',
                        'folder'    => 'transaksi',
                        'halaman'   => 'order/index',
                        'identitas' => $query_login,
                        'set_biaya' => $set_biaya,
                        'data_freelance'    => $data_freelance,
                        // Data Konten
                        'data_kategori'     => $data_kategori,
                        'data_transaksi'         => $data_transaksi
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
    public function proses()
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
                    $data_kategori = $this->select_model->getDataKategori();
                    $data_transaksi = $this->select_model->getTransaksiProses();
                    $data = array(
                        'menu'      => 'TRANSAKSI PROSES',
                        'folder'    => 'transaksi',
                        'halaman'   => 'proses/index',
                        'identitas' => $query_login,
                        'set_biaya' => $set_biaya,
                        'data_freelance'    => $data_freelance,
                        // Data Konten
                        'data_kategori'     => $data_kategori,
                        'data_transaksi'         => $data_transaksi
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
    public function selesai()
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
                    $data_kategori = $this->select_model->getDataKategori();
                    $data_transaksi = $this->select_model->getTransaksiSelesai();
                    $data = array(
                        'menu'      => 'TRANSAKSI SELESAI',
                        'folder'    => 'transaksi',
                        'halaman'   => 'selesai/index',
                        'identitas' => $query_login,
                        'set_biaya' => $set_biaya,
                        'data_freelance'    => $data_freelance,
                        // Data Konten
                        'data_kategori'     => $data_kategori,
                        'data_transaksi'         => $data_transaksi
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
    public function invoice($id)
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
                    $id_transaksi = $id;
                    $data_transaksi = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $id])->row_array();
                    $id_user = $data_transaksi['id_user'];
                    $kd_jasa = $data_transaksi['kd_jasa'];
                    $data_freelance = $this->select_model->getDataFreelance($kd_jasa);
                    $data_pelanggan = $this->select_model->getDataPembeli($id_user);
                    $data = array(
                        'menu'      => 'TRANSAKSI INVOICE',
                        'folder'    => 'invoice',
                        'halaman'   => 'index',
                        'identitas' => $query_login,
                        'set_biaya' => $set_biaya,
                        'data_freelance'    => $data_freelance,
                        // Data Konten
                        'id_transaksi'     => $id_transaksi,
                        'data_transaksi'   => $data_transaksi,
                        'data_pelanggan'   => $data_pelanggan,
                        'data_freelance'   => $data_freelance
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
        # code...
        if (isset($_POST['mulai_kerja'])) :
            $this->update_model->mulai_kerja();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Mulai Bekerja!</div>');
            redirect('cust-freelance/transaksi/order');
        endif;
        if (isset($_POST['proses_kerja'])) :
            $this->update_model->proses_kerja();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Selesai Bekerja!</div>');
            redirect('cust-freelance/transaksi/proses');
        endif;
    }
}

/* End of file ControllerTransaksi.php and path \application\controllers\Freelance\ControllerTransaksi.php */