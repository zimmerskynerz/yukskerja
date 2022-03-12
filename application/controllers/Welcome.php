<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_utama/insert_model');
		$this->load->model('menu_utama/update_model');
		$this->load->model('menu_utama/select_model');
	}
	public function index()
	{
		$data_kategori = $this->select_model->getDataKategori();
		$data_jasa	   = $this->select_model->getDataJasa();
		$query_login = $this->select_model->getDataDiri();
		$data_konten = array(
			'data_kategori' => $data_kategori,
			'data_jasa'		=> $data_jasa,
			'data_identitas'	=> $query_login
		);
		$this->load->view('HalamanUtama/index', $data_konten);
	}
	public function pages_error()
	{
		$this->load->view('pages_error404');
	}
}
