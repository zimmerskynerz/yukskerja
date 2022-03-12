<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerUsersPelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cs/insert_model');
        $this->load->model('cs/update_model');
        $this->load->model('cs/select_model');
    }
    public function index()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'ADMIN') :
                $data_pelanggan = $this->select_model->getDataPelanggan();
                // echo "<pre>";
                // var_dump($data_pelanggan);
                // die;
                $data = array(
                    'menu'      => 'USER PELANGGAN',
                    'folder'    => 'users',
                    'halaman'   => 'pelanggan/index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_pelanggan'    => $data_pelanggan
                );
                $this->load->view('Cs/index', $data);
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
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
        if (isset($_POST['resetPelanggan'])) :
            $random = $this->randomPassword();
            $this->update_model->resetPelanggan($random);
            $this->__KirimNotifUserReset($random);
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Mereset Password Pelanggan!</div>');
            redirect('admin/users/pelanggan');
        endif;
        if (isset($_POST['deletPelanggan'])) :
            $this->update_model->deletPelanggan();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Menghapus Pelanggan!</div>');
            redirect('admin/users/pelanggan');
        endif;
    }
    // Memanggil FUngsi Random Password
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
    // Kirim Email Reset
    private function __KirimNotifUserReset($random)
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
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', Akun anda berhasil di Reset, silahkan login dengan konfigurasi di bawah ini :<br><p> Email : ' . $email_konsumen . '<br>Password : ' . $random . '</p>';
        $mail->send();
    }
}

/* End of file ControllerUsersPelanggan.php and path \application\controllers\Service\ControllerUsersPelanggan.php */
