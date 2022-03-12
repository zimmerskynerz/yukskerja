<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerUsersFreelance extends CI_Controller
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
                $data_freelance = $this->select_model->getDataFreelance();
                $data = array(
                    'menu'      => 'USER FREELANCE',
                    'folder'    => 'users',
                    'halaman'   => 'freelance/index',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_freelance'    => $data_freelance
                );
                $this->load->view('Cs/index', $data);
            elseif ($query_login['level'] == 'CUSTOMER') :
                redirect('customer');
            elseif ($query_login['level'] == 'FREELANCER') :
                redirect('freelancer');
            else :
                redirect('owner');
            endif;
        else :
            $this->session->sess_destroy();
            redirect('login');
        endif;
    }
    public function konfirmasi()
    {
        $query_login = $this->select_model->data_diri();
        if ($query_login > 0) :
            if ($query_login['level'] == 'ADMIN') :
                $data_pelanggan_konfirmasi = $this->select_model->getDataPelangganKonfirmasi();
                $data = array(
                    'menu'      => 'USER FREELANCE',
                    'folder'    => 'users',
                    'halaman'   => 'freelance/konfirmasi',
                    'identitas' => $query_login,
                    // Data Konten
                    'data_pelanggan'    => $data_pelanggan_konfirmasi
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
        if (isset($_POST['tolakKonfirmasi'])) {
            $alasan = htmlentities($this->input->post('komentar'));
            if ($alasan == null) :
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Masukkan Alasan Penolakan!</div>');
                redirect('admin/users/konfirmasi-freelancer');
            else :
                $this->insert_model->konfirmasi_tolakfreelance();
                $this->update_model->konfirmasi_tolakfreelance();
                $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Menolak Freelance!</div>');
                redirect('admin/users/konfirmasi-freelancer');
            endif;
        }
        if (isset($_POST['terimaKonfirmasi'])) :
            $this->update_model->terima_pengajuan();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Menerima Freelance!</div>');
            redirect('admin/users/konfirmasi-freelancer');
        endif;
        if (isset($_POST['deleteFreelance'])) :
            $this->update_model->delete_freelance();
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Hapus Freelance!</div>');
            redirect('admin/users/freelance');
        endif;
        if (isset($_POST['resetFreelance'])) :
            $random = $this->randomPassword();
            $this->__KirimNotifUserReset($random);
            $this->update_model->resetPelanggan($random);
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Mereset Password Freelance!</div>');
            redirect('admin/users/freelance');
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

/* End of file ControllerUsersFreelance.php and path \application\controllers\Service\ControllerUsersFreelance.php */
