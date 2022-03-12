<?php
defined('BASEPATH') or exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerProduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_utama/insert_model');
        $this->load->model('menu_utama/update_model');
        $this->load->model('menu_utama/select_model');
        $this->set_timezone();
        $this->load->library('midtrans');
        $this->load->library('veritrans');
        // Midtrans Konfigurasi
        $config_midtrans2     = $this->db->get_where('config_midtrans')->row_array();
        $params               = array('server_key' => $config_midtrans2['server_key'], 'production' => true);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');
    }
    public function set_timezone()
    {
        date_default_timezone_set("Asia/Jakarta");
    }
    public function index()
    {
        $data_midtrans = $this->db->get_where('config_midtrans')->row_array();
        $data_kategori = $this->select_model->getDataKategori();
        $query_login = $this->select_model->getDataDiri();
        $data_produk = $this->select_model->getListProduk();
        $data = array(
            'data_midtrans'  => $data_midtrans,
            'data_kategori'  => $data_kategori,
            'data_produk'    => $data_produk,
            'data_identitas' => $query_login
        );
        $this->load->view('HalamanUtama/list-produk', $data);
    }
    public function produk_detail($id)
    {
        $kd_jasa = $id;
        $data_midtrans = $this->db->get_where('config_midtrans')->row_array();
        $data_kategori = $this->select_model->getDataKategori();
        $query_login = $this->select_model->getDataDiri();
        $data_produk = $this->select_model->getDataDetailProduk($kd_jasa);
        $data_portfolio = $this->select_model->getDataPortfolio($kd_jasa);
        $data_review    = $this->select_model->getDataReview($kd_jasa);
        $jml_review = count($data_review);
        $data = array(
            'data_midtrans'  => $data_midtrans,
            'data_kategori'  => $data_kategori,
            'kd_jasa'        => $kd_jasa,
            'data_produk'    => $data_produk,
            'data_identitas' => $query_login,
            'data_portfolio' => $data_portfolio,
            'data_review'    => $data_review,
            'jml_review'     => $jml_review
        );
        $this->load->view('HalamanUtama/produk-detail', $data);
    }
    public function token()
    {
        $kd_jasa = $this->input->post('kd_jasa');
        $harga = $this->input->post('harga');
        $nm_lengkap = $this->input->post('nm_lengkap');
        $email = $this->input->post('email');
        $nama =  $kd_jasa;
        $tgl_ini = date('Ymd');
        $order_id = $tgl_ini . rand();

        $this->insert_model->transaksi_langsung($kd_jasa, $harga, $order_id, $email);
        $transaction_details = array(
            'order_id' => $order_id,
            'gross_amount' => $harga,
        );
        $item1_details = array(
            'id' => $kd_jasa,
            'price' =>  $harga,
            'quantity' =>  1,
            'name' => $nama
        );
        $item_details = array($item1_details);

        // Optional
        $customer_details = array(
            'first_name'    => $nm_lengkap,
            'email'         => $email
        );
        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 1
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }
    public function sewa_jasa()
    {
        $result = json_decode($this->input->post('result_data'), true);
        $pdf_url = $result['pdf_url'];
        $link_pdf = $this->_linkPDF($pdf_url);
        $data = array(
            'tgl_kadaluarsa'   => $result['transaction_time'],
            'type_transaksi'   => $result['payment_type'],
            'status_transaksi' => $result['status_code'],
            'pdf_url'          => $link_pdf
        );
        $order_id = $result['order_id'];
        $this->db->where('id_transaksi', $order_id);
        $this->db->update('tbl_transaksi', $data);
        $this->__kirimNotifBayar($order_id, $link_pdf);
        redirect('customer/transaksi/order');
    }
    private function _linkPDF($pdf_url)
    {
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api-ssl.bitly.com/v4/bitlinks');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"domain": "bit.ly",  "long_url": "' . $pdf_url . '"}');

        $headers = array();
        $headers[] = 'Authorization: Bearer ff9ed62768951946879976860f5c6fa079cdfb98';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $bitly = json_decode($result);
        return $bitly->link;
    }
    private function __kirimNotifBayar($link_pdf)
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
        $id_user          = $this->session->userdata('id_user');
        $cek_loginnew     = $this->db->get_where('tbl_login', ['id_user' => $id_user])->row_array();
        $cek_identitas    = $this->db->get_where('tbl_identitas', ['id_user' => $id_user])->row_array();
        $email_konsumen   = $cek_loginnew['email'];
        $nm_konsumen      = $cek_identitas['nm_lengkap'];
        $mail->setFrom('' . $data_config['setFrom'] . '', 'Konfirmasi Pembayaran Jasa');
        $mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
        $mail->Subject = 'Konfirmasi Pembayaran Jasa';
        // $link          = '<a href="https://awhome.net/download.zip">disini</a>';
        $mail->Body       = '<p>Halo, ' . $nm_konsumen . ', terimakasih sudah melakukan penyewaan jasa di <a href="https://yukskerja.com" rel="noopener noreferrer" target="_blank">yukskerja.com</a>, silahkan untuk mengikuti cara pembayaran <a href="' . $link_pdf . '" rel="noopener noreferrer" target="_blank">disini</a>.</p>';
        $mail->send();
    }
}

/* End of file ControllerProduk.php and path \application\controllers\HalamanUtama\ControllerProduk.php */