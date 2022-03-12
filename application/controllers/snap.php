<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'Mid-server-z4k4rRUooU26w-La9adbcbQr', 'production' => true);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model('menu_utama/insert_model');
		$this->load->model('menu_utama/update_model');
		$this->load->model('menu_utama/select_model');
	}

	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{
        $kd_jasa = $this->input->post('kd_jasa');
        $harga = $this->input->post('harga');
        $nm_lengkap = $this->input->post('nm_lengkap');
        $email = $this->input->post('email_aktif');
        $nama =  $kd_jasa;
        $tgl_ini = date('Ymd');
        $order_id = $tgl_ini . rand();
        $this->insert_model->transaksi_langsung($kd_jasa, $harga, $order_id, $email);
		$transaction_details = array(
			'order_id' => $order_id,
			'gross_amount' => $harga, // no decimal allowed for creditcard
		);

		// Optional
		$item1_details = array(
			'id' => $kd_jasa,
			'price' => $harga,
			'quantity' => 1,
			'name' => $nm_jasa
		);

		// Optional
		$item_details = array($item1_details);

		// Optional
		$customer_details = array(
			'first_name'    => $nm_lengkap,
			'email'         => $email,
			'phone'         => $ket_sewa
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 2
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

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'), true);
		$order_id = $result['order_id'];
		$pdf_url = $result['pdf_url'];
		$cek_data = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $order_id])->row_array();
		$id_user = $cek_data['id_user'];
		$cek_identitas = $this->db->get_where('tbl_identitas', ['id_user' => $id_user])->row_array();
		$cek_login = $this->db->get_where('tbl_login', ['id_user' => $id_user])->row_array();
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
		$nm_lengkap = $cek_identitas['nm_lengkap'];
		$email 		= $cek_login['email'];
		$this->__kirimNotifBayar($order_id, $link_pdf, $nm_lengkap, $email);
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
	private function __kirimNotifBayar($order_id, $link_pdf, $nm_lengkap, $email)
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
		$data_transaksi   = $this->db->get_where('tbl_transaksi', ['id_transaksi' => $order_id])->row_array();
		$email_konsumen   = $email;
		$nm_konsumen      = $nm_lengkap;
		$mail->setFrom('' . $data_config['setFrom'] . '', 'Konfirmasi Pembayaran Doa');
		$mail->addAddress($email_konsumen, $nm_konsumen);     // Add a recipient
		$mail->Subject = 'Konfirmasi Pembayaran Doa';
		// $link          = '<a href="https://awhome.net/download.zip">disini</a>';
		$mail->Body       = '<p>Halo, ' . $nm_konsumen . ', terimakasih sudah mempekerjakan salah satu freelancer kami di <a href="https://yukskerja.com" rel="noopener noreferrer" target="_blank">yukskerja.com</a>, silahkan untuk mengikuti cara membayar freelancer kami di ' . $link_pdf . ' Terimakasih!.</p>';
		$mail->send();
	}
}