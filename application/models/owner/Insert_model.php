<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert_model extends CI_Model
{
    public function simpanAdministrasi($pass)
    {
        $uuid = uniqid();
        $jkelamin = htmlentities($this->input->post('jkelamin'));
        if ($jkelamin == 1) :
            $profile = 'default_l.png';
        else :
            $profile = 'default_p.png';
        endif;
        $data_cS = array(
            'id_user'     => $uuid,
            'email'       => htmlentities($this->input->post('email')),
            'password'    => password_hash($pass, PASSWORD_DEFAULT),
            'level'       => 'ADMIN',
            'otp'         => null,
            'status'      => 'AKTIF',
            'profile'     => $profile,
            'tgl_gabung'  => date('Y-m-d')
        );
        $this->db->insert('tbl_login', $data_cS);
        $identitas = array(
            'id_user'       => $uuid,
            'jid'           => NULL,
            'no_id '        => NULL,
            'nm_lengkap'    => htmlentities($this->input->post('nm_lengkap')),
            'tgl_lahir'     => null,
            'alamat'        => null,
            'no_hp'         => htmlentities($this->input->post('no_hp')),
            'j_kelamin'     => $jkelamin,
            'status'        => 'PASSIVE',
            'f_ktp'         => NULL
        );
        $this->db->insert('tbl_identitas', $identitas);
    }
    public function simpanKupon()
    {
        $config['upload_path']   = './assets/banner';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('banner')) {
            $_FILES['file']['name'] = $_FILES['banner']['name'];
            $_FILES['file']['type'] = $_FILES['banner']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['banner']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['banner']['size'];
            $uploadData = $this->upload->data();
            $banner = $uploadData['file_name'];
            $this->simpan_kupon($banner);
        }
    }
    function simpan_kupon($banner)
    {
        $cek_kupon = $this->db->get_where('promo_kupon', ['kd_hadiah' => htmlentities($this->input->post('kd_kupon'))])->row_array();
        if ($cek_kupon > 0) :
            $this->session->set_flashdata('gagal_tanggal', '<div class="alert alert-danger" id="gagal_tanggal" role="alert">Kode Kupon Sudah Ada!</div>');
        else :
            $kupon = array(
                'id_hadiah'     => '',
                'nm_hadiah'     => htmlentities($this->input->post('nm_kupon')),
                'kd_hadiah '    => htmlentities($this->input->post('kd_kupon')),
                'potongan'      => htmlentities($this->input->post('potongan')),
                'mulai'         => htmlentities($this->input->post('mulai')),
                'selesai'       => htmlentities($this->input->post('selesai')),
                'max_kupon'     => htmlentities($this->input->post('max_kupon')),
                'banner'        => $banner,
                'status'        => 'PASSIVE',
                'kategori'      => htmlentities($this->input->post('kategori')),
                'min_order'     => htmlentities($this->input->post('min_order')),
                'max_order'     => htmlentities($this->input->post('max_order')),
                'level'         => 'KUPON'
            );
            $this->db->insert('promo_kupon', $kupon);
            $this->session->set_flashdata('berhasil_tanggal', '<div class="alert alert-success" id="berhasil_tanggal" role="alert">Berhasil Menambahkan Kupon!</div>');
        endif;
    }
    public function simpanPromo()
    {
        $config['upload_path']   = './assets/banner';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('banner')) {
            $_FILES['file']['name'] = $_FILES['banner']['name'];
            $_FILES['file']['type'] = $_FILES['banner']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['banner']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['banner']['size'];
            $uploadData = $this->upload->data();
            $banner = $uploadData['file_name'];
            $this->simpan_promo($banner);
        }
    }
    function simpan_promo($banner)
    {
        $cek_kupon = $this->db->get_where('promo_kupon', ['kd_hadiah' => htmlentities($this->input->post('kd_kupon'))])->row_array();
        if ($cek_kupon > 0) :
            $this->session->set_flashdata('gagal_tanggal', '<div class="alert alert-danger" id="gagal_tanggal" role="alert">Kode Promo Sudah Ada!</div>');
        else :
            $kupon = array(
                'id_hadiah'     => '',
                'nm_hadiah'     => htmlentities($this->input->post('nm_kupon')),
                'kd_hadiah '    => htmlentities($this->input->post('kd_kupon')),
                'potongan'      => htmlentities($this->input->post('potongan')),
                'mulai'         => htmlentities($this->input->post('mulai')),
                'selesai'       => htmlentities($this->input->post('selesai')),
                'max_kupon'     => htmlentities($this->input->post('max_kupon')),
                'banner'        => $banner,
                'status'        => 'PASSIVE',
                'kategori'      => htmlentities($this->input->post('kategori')),
                'min_order'     => htmlentities($this->input->post('min_order')),
                'max_order'     => htmlentities($this->input->post('max_order')),
                'level'         => 'PROMO'
            );
            $this->db->insert('promo_kupon', $kupon);
            $this->session->set_flashdata('berhasil_tanggal', '<div class="alert alert-success" id="berhasil_tanggal" role="alert">Berhasil Menambahkan Kupon!</div>');
        endif;
    }
}


/* End of file Insert_model.php and path \application\models\owner\Insert_model.php */