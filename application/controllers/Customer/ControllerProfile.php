<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerProfile extends CI_Controller
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
                    $data = array(
                        'menu'      => 'PROFILE',
                        'folder'    => 'profile',
                        'halaman'   => 'index',
                        'identitas' => $query_login
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
        if (isset($_POST['simpan_email'])) :
            $random = $this->randomPassword();
            $email_baru = htmlspecialchars($this->input->post('email_baru'));
            $email_lama = htmlspecialchars($this->input->post('email_lama'));
            $id_user = htmlspecialchars($this->input->post('id_user'));
            if ($email_lama == $email_baru) :
                $this->session->set_flashdata('gagal_simpan', '<div class="alert alert-danger" id="gagal_simpan" role="alert">Email Baru Sama Dengan Email Lama!</div>');
                redirect('customer/profile');
            else :
                $cek_email = $this->db->get_where('tbl_login', ['email' => $email_baru])->row_array();
                if ($cek_email > 0) :
                    $this->session->set_flashdata('gagal_simpan', '<div class="alert alert-danger" id="gagal_simpan" role="alert">Email Sudah Digunakan!</div>');
                    redirect('customer/profile');
                else :
                    $this->__KirimNotifPerubahanEmail($email_lama, $email_baru);
                    $this->__KirimNotifOtp($random, $email_baru);
                    $data_email = array(
                        'email'  => $email_baru,
                        'otp'    => $random,
                        'status' => 'PASSIVE'
                    );
                    $this->db->where('id_user', $id_user);
                    $this->db->update('tbl_login', $data_email);
                    $this->session->sess_destroy();
                    redirect('login');
                endif;
            endif;
        endif;
        if (isset($_POST['simpan_password'])) :
            $password_lama = htmlentities($this->input->post('password_lama'));
            $password_baru = htmlentities($this->input->post('password_baru'));
            $password_lagi = htmlentities($this->input->post('password_lagi'));
            $cek_data = $this->db->get_where('tbl_login', ['id_user' => $this->input->post('id_user')])->row_array();
            if (password_verify($password_lama, $cek_data['password'])) :
                if ($password_baru == $password_lagi) :
                    $data_password = array(
                        'password'    => password_hash($password_baru, PASSWORD_DEFAULT),
                    );
                    $this->db->where('id_user', $this->input->post('id_user'));
                    $this->db->update('tbl_login', $data_password);
                    $this->session->set_flashdata('berhasil_simpan', '<div class="alert alert-success" id="berhasil_simpan" role="alert">Berhasil Merubah Password!</div>');
                    redirect('logout');
                else :
                    $this->session->set_flashdata('gagal_simpan', '<div class="alert alert-danger" id="gagal_simpan" role="alert">Password Tidak Sama!</div>');
                    redirect('customer/profile');
                endif;
            else :
                $this->session->set_flashdata('gagal_simpan', '<div class="alert alert-danger" id="gagal_simpan" role="alert">Password Lama Salah!</div>');
                redirect('customer/profile');
            endif;
        endif;
        if (isset($_POST['simpan_profile'])) :
            echo 'Berhasil';
        endif;
    }
    function randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    // Kirim Email Aktivasi Akun
    private function __KirimNotifOtp($random, $email_baru)
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
        $email_konsumen   = $email_baru;
        $nm_konsumen      = htmlentities($this->input->post('nm_lengkap'));
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Pemberitahuan Akun');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Pemberitahuan Akun';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', berhasil melakukan perubahan email, anda sekarang dapat melakukan login dengan email ' . $email_baru . '. Silahkan untuk melakukan aktivasi akun pada link dibawah ini: <br> https://yukskerja.com/aktivasi/' . $random . '</p>';
        $mail->send();
    }
    // Pemebritahuan Email Diganti
    private function __KirimNotifPerubahanEmail($email_lama, $email_baru)
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
        $email_konsumen   = $email_lama;
        $nm_konsumen      = htmlentities($this->input->post('nm_lengkap'));
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Pemberitahuan Akun');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Pemberitahuan Akun';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', email anda sekarang sudah diganti dengan ' . $email_baru . ' anda sekarang tidak lagi bisa menggunakan email lama anda.';
        $mail->send();
    }
}

/* End of file ControllerProfile.php and path \application\controllers\Customer\ControllerProfile.php */