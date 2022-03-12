<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    public function updateCS()
    {
        $data_identitas = array(
            'nm_lengkap' => htmlentities($this->input->post('nm_lengkap')),
            'tgl_lahir' => htmlentities($this->input->post('tgl_lahir')),
            'alamat' => htmlentities($this->input->post('alamat')),
            'no_hp' => htmlentities($this->input->post('no_hp'))
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('identitas', $data_identitas);
        $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Merubah Identitas Customer Service!</div>');
    }
    public function resetCS($pass)
    {
        $data_login = array(
            'password' => password_hash($pass, PASSWORD_DEFAULT)
        );
        $this->db->where('email', htmlentities($this->input->post('email')));
        $this->db->update('tbl_login', $data_login);
        $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Mereset Password Customer Service!</div>');
    }
    public function deleteCS()
    {
        $hapus_data = array(
            'status' => 'BLOKIR'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $hapus_data);
        $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Hapus Customer Service!</div>');
    }
    public function updateKupon()
    {
        $banner = htmlentities($this->input->post('banner'));
        $config['upload_path']   = './assets/banner';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('bannerbaru')) :
            $_FILES['file']['name'] = $_FILES['bannerbaru']['name'];
            $_FILES['file']['type'] = $_FILES['bannerbaru']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['bannerbaru']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['bannerbaru']['size'];
            $uploadData = $this->upload->data();
            $bannerbaru = $uploadData['file_name'];
            unlink('./assets/banner/' . $banner);
            $this->update_kupon($bannerbaru);
        else :
            $this->update_kupon2();
        endif;
    }
    function update_kupon($bannerbaru)
    {
        $ubahkupon = array(
            'nm_hadiah'     => htmlentities($this->input->post('nm_hadiah')),
            'potongan'      => htmlentities($this->input->post('potongan')),
            'mulai'         => htmlentities($this->input->post('mulai')),
            'selesai'       => htmlentities($this->input->post('selesai')),
            'max_kupon'     => htmlentities($this->input->post('max_kupon')),
            'banner'        => $bannerbaru,
            'kategori'      => htmlentities($this->input->post('kategori')),
            'min_order'     => htmlentities($this->input->post('min_order')),
            'max_order'     => htmlentities($this->input->post('max_order'))
        );
        $this->db->where('id_hadiah', htmlentities($this->input->post('id_hadiah')));
        $this->db->update('promo_kupon', $ubahkupon);
        $this->session->set_flashdata('berhasil_tanggal', '<div class="alert alert-success" id="berhasil_tanggal" role="alert">Berhasil Merubah Kupon!</div>');
    }
    function update_kupon2()
    {
        $ubahkupon = array(
            'nm_hadiah'     => htmlentities($this->input->post('nm_hadiah')),
            'potongan'      => htmlentities($this->input->post('potongan')),
            'mulai'         => htmlentities($this->input->post('mulai')),
            'selesai'       => htmlentities($this->input->post('selesai')),
            'max_kupon'     => htmlentities($this->input->post('max_kupon')),
            'kategori'      => htmlentities($this->input->post('kategori')),
            'min_order'     => htmlentities($this->input->post('min_order')),
            'max_order'     => htmlentities($this->input->post('max_order'))
        );
        $this->db->where('id_hadiah', htmlentities($this->input->post('id_hadiah')));
        $this->db->update('promo_kupon', $ubahkupon);
        $this->session->set_flashdata('berhasil_tanggal', '<div class="alert alert-success" id="berhasil_tanggal" role="alert">Berhasil Merubah Kupon!</div>');
    }
    public function updatePromo()
    {
        $banner = htmlentities($this->input->post('banner'));
        $config['upload_path']   = './assets/banner';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['encrypt_name']  = true;
        $config['overwrite']     = true;
        $config['max_size']      = 10024; // 10MB
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('bannerbaru')) :
            $_FILES['file']['name'] = $_FILES['bannerbaru']['name'];
            $_FILES['file']['type'] = $_FILES['bannerbaru']['type'];
            $_FILES['file']['tmp_name'] = $_FILES['bannerbaru']['tmp_name'];
            $_FILES['file']['size'] = $_FILES['bannerbaru']['size'];
            $uploadData = $this->upload->data();
            $bannerbaru = $uploadData['file_name'];
            unlink('./assets/banner/' . $banner);
            $this->update_promo($bannerbaru);
        else :
            $this->update_promo2();
        endif;
    }
    function update_promo($bannerbaru)
    {
        $ubahkupon = array(
            'nm_hadiah'     => htmlentities($this->input->post('nm_hadiah')),
            'potongan'      => htmlentities($this->input->post('potongan')),
            'mulai'         => htmlentities($this->input->post('mulai')),
            'selesai'       => htmlentities($this->input->post('selesai')),
            'max_kupon'     => htmlentities($this->input->post('max_kupon')),
            'banner'        => $bannerbaru,
            'kategori'      => htmlentities($this->input->post('kategori')),
            'min_order'     => htmlentities($this->input->post('min_order')),
            'max_order'     => htmlentities($this->input->post('max_order'))
        );
        $this->db->where('id_hadiah', htmlentities($this->input->post('id_hadiah')));
        $this->db->update('promo_kupon', $ubahkupon);
        $this->session->set_flashdata('berhasil_tanggal', '<div class="alert alert-success" id="berhasil_tanggal" role="alert">Berhasil Merubah Promo!</div>');
    }
    function update_promo2()
    {
        $ubahkupon = array(
            'nm_hadiah'     => htmlentities($this->input->post('nm_hadiah')),
            'potongan'      => htmlentities($this->input->post('potongan')),
            'mulai'         => htmlentities($this->input->post('mulai')),
            'selesai'       => htmlentities($this->input->post('selesai')),
            'max_kupon'     => htmlentities($this->input->post('max_kupon')),
            'kategori'      => htmlentities($this->input->post('kategori')),
            'min_order'     => htmlentities($this->input->post('min_order')),
            'max_order'     => htmlentities($this->input->post('max_order'))
        );
        $this->db->where('id_hadiah', htmlentities($this->input->post('id_hadiah')));
        $this->db->update('promo_kupon', $ubahkupon);
        $this->session->set_flashdata('berhasil_tanggal', '<div class="alert alert-success" id="berhasil_tanggal" role="alert">Berhasil Merubah Promo!</div>');
    }
}


/* End of file Update_model.php and path \application\models\owner\Update_model.php */