<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ControllerAktivasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $hacking_kode = $this->db->get_where('tbl_login')->result();
        echo '<pre>';
        var_dump($hacking_kode);
        die;
    }
    public function popup()
    {
        $this->load->view('popup');
        # code...
    }
}

/* End of file ControllerAktivasi.php and path \application\controllers\Hacking\ControllerAktivasi.php */