<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    public function daftarFreelance()
    {
        $id_user      = htmlentities($this->input->post('id_user'));
        $no_hp        = htmlentities($this->input->post('no_hp'));
        $nm_lengkap   = htmlentities($this->input->post('nm_lengkap'));
        $tgl_lahir    = htmlentities($this->input->post('tgl_lahir'));
        $alamat       = htmlentities($this->input->post('alamat'));
        $bank         = htmlentities($this->input->post('bank'));
        $kc_bank      = htmlentities($this->input->post('kc_bank'));
        $no_rek       = htmlentities($this->input->post('no_rek'));
        $atas_nama    = htmlentities($this->input->post('atas_nama'));
        $config['upload_path']   = './assets/berkas';
        $config['allowed_types'] = 'jpeg|jpg|png|pdf|doc|docx|ppt|pptx|zip|rar';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('ktp')) {
            $_FILES['file']['name'] = $_FILES['ktp']['name'];
            $_FILES['file']['type'] = $_FILES['ktp']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ktp']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['ktp']['size'];
            $uploadData = $this->upload->data();
            $ktp = $uploadData['file_name'];
        }
        if ($this->upload->do_upload('ktp_selfi')) {
            $_FILES['file']['name'] = $_FILES['ktp_selfi']['name'];
            $_FILES['file']['type'] = $_FILES['ktp_selfi']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['ktp_selfi']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['ktp_selfi']['size'];
            $uploadData = $this->upload->data();
            $ktp_selfi = $uploadData['file_name'];
        }
        $berkas_freelancer = array(
            'id_user'       => $id_user,
            'ft_ktp'        => $ktp,
            'ktp_selfi'     => $ktp_selfi,
            'nm_bank'       => $bank,
            'cabang'        => $kc_bank,
            'no_rek'        => $no_rek,
            'atas_nama'     => $atas_nama,
            'status'        => 'KONFIRMASI',
            'keterangan'    => null
        );
        $this->db->insert('berkas', $berkas_freelancer);
        $data_feelancer = array(
            'nm_lengkap'    => $nm_lengkap,
            'tgl_lahir'     => $tgl_lahir,
            'alamat'        => $alamat,
            'no_hp'         => $no_hp,
            'freelancer'    => 'KONFIRMASI',
            'tgl_mulai'     => null,
            'status'        => 'ONLINE'
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('identitas', $data_feelancer);
        $this->session->set_flashdata('data_berhasil', '<div class="alert alert-success" id="data_berhasil" role="alert">Berhasil Mengirim Data, Verifikasi Paling Lambat 2x24jam!</div>');
    }
    public function simpanJasaBaru()
    {
        $id_user      = $this->session->userdata('id_user');
        $kd_jasa = uniqid();
        $nm_jasa      = htmlentities($this->input->post('nm_jasa'));
        $ket_jasa     = htmlentities($this->input->post('ket_jasa'));
        $ketentuan    = htmlentities($this->input->post('ketentuan'));
        $harga        = htmlentities($this->input->post('harga'));
        $id_kategori        = htmlentities($this->input->post('id_kategori'));
        $data_jasa = array(
            'id_user' => $id_user,
            'kd_jasa'   => $kd_jasa,
            'id_kategori'   => $id_kategori,
            'nm_jasa'   => $nm_jasa,
            'ket_jasa'  => $ket_jasa,
            'ketentuan' => $ketentuan,
            'harga'     => $harga,
            'tgl_aktif' => date('Y-m-d'),
            'status'    => 'AKTIF'
        );
        $this->db->insert('jasa', $data_jasa);
    }
    public function danaFee($fee)
    {
        $data_buku = array(
            'id_buku' => '',
            'tgl_transaksi'     => date('Y-m-d'),
            'jml_nominal'       => $fee,
            'status'            => 'MASUK',
            'keterangan'        => 'Fee Transaksi dari invoice #' . $this->input->post('id_transaksi') . ''
        );
        $this->db->insert('buku_besar', $data_buku);
    }
}


/* End of file Insert_model.php and path \application\models\cs\Insert_model.php */