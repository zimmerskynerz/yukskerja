<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerKategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_utama/insert_model');
        $this->load->model('menu_utama/update_model');
        $this->load->model('menu_utama/select_model');
    }
    public function kategori($id)
    {
        $nm_kategori = preg_replace("/[^a-zA-Z]/", " ", $id);
        $data_midtrans = $this->db->get_where('config_midtrans')->row_array();
        $data_kategori = $this->select_model->getDataKategori();
        $data_jasa       = $this->select_model->getDataJasaKategori($nm_kategori);
        $query_login = $this->select_model->getDataDiri();
        $data_konten = array(
            'data_midtrans'  => $data_midtrans,
            'data_kategori' => $data_kategori,
            'data_jasa'        => $data_jasa,
            'data_identitas'    => $query_login
        );
        $this->load->view('HalamanUtama/kategori', $data_konten);
    }
}

/* End of file ControllerKategori.php and path \application\controllers\HalamanUtama\ControllerKategori.php */