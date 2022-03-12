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
    public function simpan_jasa()
    {
        $uuid = uniqid();
        $data_jasa = array(
            'username'      => htmlentities($this->input->post('username')),
            'kd_jasa'       => $uuid,
            'id_kategori'   => htmlentities($this->input->post('id_kategori')),
            'nm_jasa'       => htmlentities($this->input->post('nm_jasa')),
            'ket_jasa'      => htmlentities($this->input->post('ket_jasa')),
            'ketentuan'     => htmlentities($this->input->post('ketentuan')),
            'harga'         => htmlentities($this->input->post('harga')),
            'status'        => 'PASSIVE'
        );
        $this->db->insert('tbl_jasa', $data_jasa);
    }
    public function simpan_portfolio()
    {
        $config['upload_path']   = './assets/portfolio';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        // $config['max_width']            = 941;
        // $config['max_height']           = 529;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('portfolio')) :
            $_FILES['file']['name'] = $_FILES['portfolio']['name'];
            $_FILES['file']['type'] = $_FILES['portfolio']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['portfolio']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['portfolio']['size'];
            $uploadData = $this->upload->data();
            $portfolio_name = $uploadData['file_name'];
            $data_portfolio = array(
                'id_portfolio'      => '',
                'kd_jasa'           => htmlentities($this->input->post('kd_jasa')),
                'foto_portfolio'    => $portfolio_name,
                'status'            => 'TAMBAHAN'
            );
            $this->db->insert('jasa_portfolio', $data_portfolio);
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Tambah Portfolio!</div>');
        else :
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Ukuran Foto 941 X 529!</div>');
        endif;
    }
}


/* End of file Insert_model.php and path \application\models\cs\Insert_model.php */