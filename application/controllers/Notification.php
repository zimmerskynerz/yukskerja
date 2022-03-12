<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Notification extends CI_Controller
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
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, "true");
		$order_id = $result['order_id'];
		$data = array(
			'status_transaksi' => $result['status_code']
		);


		if ($result['status_code'] == 200) :
			$this->db->where('id_transaksi', $order_id);
			$this->db->update('tbl_transaksi', $data);
		endif;
		$cek_mail = $this->db->get_Where('tbl_transaksi',['id_transaksi'=>$order_id])->row_array();
		$id_user = $cek_mail['id_user'];
		$cek_login = $this->db->get_where('tbl_login',['id_user'=>id_user])->row_array();
		$cek_identitas = $this->db->get_where('tbl_identitas', ['id_user'=>$id_user])->row_array();
		$nm_lengkap = $cek_identitas['nm_lengkap'];
		$email = $cek_login['email'];
        $this->__kirimNotifBayar($order_id, $nm_lengkap, $email);
		// error_log(print_r($result, TRUE));

		//notification handler sample

		/*
		$transaction = $notif->transaction_status;
		$type = $notif->payment_type;
		$order_id = $notif->order_id;
		$fraud = $notif->fraud_status;

		if ($transaction == 'capture') {
		  // For credit card transaction, we need to check whether transaction is challenge by FDS or not
		  if ($type == 'credit_card'){
		    if($fraud == 'challenge'){
		      // TODO set payment status in merchant's database to 'Challenge by FDS'
		      // TODO merchant should decide whether this transaction is authorized or not in MAP
		      echo "Transaction order_id: " . $order_id ." is challenged by FDS";
		      } 
		      else {
		      // TODO set payment status in merchant's database to 'Success'
		      echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
		      }
		    }
		  }
		else if ($transaction == 'settlement'){
		  // TODO set payment status in merchant's database to 'Settlement'
		  echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
		  } 
		  else if($transaction == 'pending'){
		  // TODO set payment status in merchant's database to 'Pending'
		  echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
		  } 
		  else if ($transaction == 'deny') {
		  // TODO set payment status in merchant's database to 'Denied'
		  echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
		}*/
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
		$mail->Body       = '<p>Halo, ' . $nm_konsumen . ', terimakasih sudah mempekerjakan salah satu freelancer kami di <a href="https://yukskerja.com" rel="noopener noreferrer" target="_blank">yukskerja.com</a>, dan sudah membayar sesuai intruksi. Terimakasih!.</p>';
		$mail->send();
	}
}
