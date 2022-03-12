<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerLogin extends CI_Controller
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

        $query_login = $this->db->get_where('tbl_login', ['id_user' => $this->session->userdata('id_user')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                redirect('owner');
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect();
            endif;
        else :
            $this->load->view('login');
        endif;
    }
    public function register()
    {
        $query_login = $this->db->get_where('tbl_login', ['id_user' => $this->session->userdata('id_user')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                redirect('owner');
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect();
            endif;
        else :
            $this->load->view('HalamanUtama/register');
        endif;
    }
    public function reset()
    {
        $query_login = $this->db->get_where('tbl_login', ['id_user' => $this->session->userdata('id_user')])->row_array();
        if ($query_login > 0) :
            if ($query_login['level'] == 'OWNER') :
                redirect('owner');
            elseif ($query_login['level'] == 'ADMIN') :
                redirect('admin');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('cust-freelance');
            else :
                redirect();
            endif;
        else :
            $this->load->view('HalamanUtama/reset');
        endif;
    }
    public function cek_login()
    {
        $email = htmlentities($this->input->post('email'));
        $password = htmlentities($this->input->post('password'));
        $cek_email = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
        if ($cek_email > 0) :
            if (password_verify($password, $cek_email['password'])) {
                $data_login = array(
                    'id_user' => $cek_email['id_user'],
                    'email' => $cek_email['email'],
                    'tgl_gabung' => $cek_email['tgl_gabung'],
                    'level' => $cek_email['level'],
                    'status' => $cek_email['status']
                );
                if ($cek_email['level'] == 'OWNER') :
                    $this->session->set_userdata($data_login);
                    redirect('owner');
                elseif ($cek_email['level'] == 'ADMIN') :
                    $this->session->set_userdata($data_login);
                    redirect('admin');
                elseif ($cek_email['level'] == 'FREELANCER') :
                    $this->session->set_userdata($data_login);
                    redirect('cust-freelance');
                else :
                    $this->session->set_userdata($data_login);
                    redirect();
                endif;
            } else {
                $this->session->set_flashdata('password_gagal', '<div class="alert alert-danger" id="password_gagal" role="alert">Password Anda Salah!</div>');
                redirect('login');
            }
        else :
            $this->session->set_flashdata('email_takterdaftar', '<div class="alert alert-danger" id="email_takterdaftar" role="alert">Email Tidak Terdaftar!</div>');
            redirect('login');
        endif;
    }
    public function cek_register()
    {
        $email          = htmlentities($this->input->post('email'));
        $cek_email      = $this->db->get_where('tbl_login', ['email' => $email])->row_array();
        if ($cek_email > 0) :
            $this->session->set_flashdata('email_sudah', '<div class="alert alert-danger" id="email_sudah" role="alert">Email Sudah Ada! Silahkan Login</div>');
            redirect('register');
        else :
            $random = $this->randomPassword();
            $this->insert_model->registrasi($random);
            $this->__KirimNotifOtp($random);
            $this->session->set_flashdata('berhasil_daftar', '<div class="alert alert-success" id="berhasil_daftar" role="alert">Berhasil! Silahkan Cek Kode OTP pada SPAM Email Anda!</div>');
            redirect('login');
        endif;
    }
    public function cek_reset()
    {
    }
    public function aktivasi($id)
    {
        $otp = $id;
        $cek_status = $this->db->get_where('tbl_login', ['otp' => $otp])->row_array();
        if ($cek_status > 0) :
            $email = $cek_status['email'];
            $this->update_model->aktifAkun($email);
            $this->session->set_flashdata('berhasil_daftar', '<div class="alert alert-success" id="berhasil_daftar" role="alert">Berhasil! Akun Anda Sudah Aktif!</div>');
            redirect('login');
        else :
            $this->session->set_flashdata('password_gagal', '<div class="alert alert-danger" id="password_gagal" role="alert">Kode Anda Tidak Terdaftar!</div>');
            redirect('login');
        endif;
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
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
    // Kirim Email Pembuatan Akun
    private function __KirimNotifOtp($random)
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
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', anda sekarang terdaftar pada layanan marketplace freelance <a href="https://yukskerja.com" rel="noopener noreferrer" target="_blank">yukskerja.com</a>. Silahkan untuk melakukan aktivasi akun pada link dibawah ini: <br> https://yukskerja.com/aktivasi/' . $random . '</p>';
        $mail->send();
    }
}

/* End of file ControllerLogin.php and path \application\controllers\HalamanUtama\ControllerLogin.php */