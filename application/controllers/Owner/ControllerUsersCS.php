<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';
class ControllerUsersCS extends CI_Controller
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
                $data_cs = $this->select_model->getDataCS();
                $data = array(
                    'menu'      => 'USER CUSTOMER SERVICE',
                    'folder'    => 'user/service',
                    'halaman'   => 'index',
                    'identitas' => $query_login,
                    // Data Content
                    'data_cs' => $data_cs
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
        if (isset($_POST['simpanAdministrasi'])) :
            $cek_email = $this->db->get_where('tbl_login', ['email' => htmlentities($this->input->post('email'))])->row_array();
            $cek_hp = $this->db->get_where('tbl_identitas', ['no_hp' => htmlentities($this->input->post('no_hp'))])->row_array();
            if ($cek_email > 0) :
                $this->session->set_flashdata('gagal_tambah', '<div class="alert alert-danger" id="gagal_tambah" role="alert">Email Sudah Ada!</div>');
                redirect('owner/users/service');
            else :
                if ($cek_hp > 0) :
                    $this->session->set_flashdata('gagal_tambah', '<div class="alert alert-danger" id="gagal_tambah" role="alert">Nomor Hp Sudah Ada!</div>');
                    redirect('owner/users/service');
                else :
                    $pass = $this->randomPassword();
                    $this->insert_model->simpanAdministrasi($pass);
                    $this->__KirimNotifUserLogin($pass);
                    $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Tambah Customer Service!</div>');
                    redirect('owner/users/service');
                endif;
            endif;
        endif;
        if (isset($_POST['resetCS'])) :
            $pass = $this->randomPassword();
            $this->update_model->resetCS($pass);
            $this->__KirimNotifUserReset($pass);
            redirect('owner/users/service');
        endif;
        if (isset($_POST['deleteCS'])) :
            $this->update_model->deleteCS();
            redirect('owner/users/service');
        endif;
    }
    function randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 16; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    // Kirim Email Pembuatan Akun
    private function __KirimNotifUserLogin($pass)
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->IsHTML(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = '' . $data_config['host'] . '';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '' . $data_config['username'] . '';                     // SMTP username
        $mail->Password   = '' . $data_config['password'] . '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $email_konsumen   = htmlentities($this->input->post('email'));
        $nm_konsumen      = htmlentities($this->input->post('nm_lengkap'));
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Pemberitahuan Akun');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Pemberitahuan Akun Login Customer Service';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', anda sekarang terdaftar pada layanan marketplace freelance <a href="https://yukskerja.com" rel="noopener noreferrer" target="_blank">yukskerja.com</a> sebagai Customer Service atau disingkat Admin.</p><br><p> Email : ' . $email_konsumen . '</p><br><br><p>Password : ' . $pass . '</p><br><p>Silahkan untuk melakukan perubahan data login agar akun anda aman dari tindak hacking.</p>';
        $mail->send();
    }
    // Kirim Email Reset
    private function __KirimNotifUserReset($pass)
    {
        $data_config      = $this->db->get_where('config_smtp')->row_array();
        $mail             = new PHPMailer(true);
        $mail->IsHTML(true);
        $mail->SMTPDebug  = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = '' . $data_config['host'] . '';         // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '' . $data_config['username'] . '';                     // SMTP username
        $mail->Password   = '' . $data_config['password'] . '';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = $data_config['port'];
        //Recipients
        $email_konsumen   = htmlentities($this->input->post('email'));
        $nm_konsumen      = htmlentities($this->input->post('nm_lengkap'));
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Pemberitahuan Akun');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Pemberitahuan Akun Login Customer Service';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', Akun anda berhasil di Reset, silahkan login dengan konfigurasi di bawah ini :<br><p> Email : ' . $email_konsumen . '<br>Password : ' . $pass . '</p>';
        $mail->send();
    }
}

/* End of file ControllerUsersCS.php and path \application\controllers\Owner\ControllerUsersCS.php */