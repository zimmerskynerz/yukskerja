<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_model extends CI_Model
{
    public function daftarFreelance()
    {
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
        $data_identitas2 = array(
            'status'        => 'KONFIRMASI'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $data_identitas2);
        $data_identitas = array(
            'jid'           => htmlentities($this->input->post('jid')),
            'no_id'         => htmlentities($this->input->post('no_id')),
            'nm_lengkap'    => htmlentities($this->input->post('nm_lengkap')),
            'tgl_lahir'     => htmlentities($this->input->post('tgl_lahir')),
            'alamat'        => htmlentities($this->input->post('alamat')),
            'no_hp'         => htmlentities($this->input->post('no_hp')),
            'f_ktp'         => $ktp,
            'fs_ktp'        => $ktp_selfi
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_identitas', $data_identitas);
        $data_freelance = array(
            'id_user'       => htmlentities($this->input->post('id_user')),
            'username'      => null,
            'nm_bank'       => htmlentities($this->input->post('nm_bank')),
            'cabang'        => htmlentities($this->input->post('cabang')),
            'no_rek'        => htmlentities($this->input->post('no_rek')),
            'an_bank'       => htmlentities($this->input->post('an_bank')),
            'bidang'        => htmlentities($this->input->post('bidang')),
            'status'        => 'KONFIRMASI',
            'saldo'         => 0
        );
        $this->db->insert('identitas_freelance', $data_freelance);
    }
    public function daftarFreelanceKembali()
    {
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
        $data_identitas2 = array(
            'status'        => 'KONFIRMASI'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_login', $data_identitas2);
        $data_identitas = array(
            'jid'           => htmlentities($this->input->post('jid')),
            'no_id'         => htmlentities($this->input->post('no_id')),
            'nm_lengkap'    => htmlentities($this->input->post('nm_lengkap')),
            'tgl_lahir'     => htmlentities($this->input->post('tgl_lahir')),
            'alamat'        => htmlentities($this->input->post('alamat')),
            'no_hp'         => htmlentities($this->input->post('no_hp')),
            'f_ktp'         => $ktp,
            'fs_ktp'        => $ktp_selfi
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('tbl_identitas', $data_identitas);
        $data_freelance = array(
            'username'      => null,
            'nm_bank'       => htmlentities($this->input->post('nm_bank')),
            'cabang'        => htmlentities($this->input->post('cabang')),
            'no_rek'        => htmlentities($this->input->post('no_rek')),
            'an_bank'       => htmlentities($this->input->post('an_bank')),
            'bidang'        => htmlentities($this->input->post('bidang')),
            'status'        => 'KONFIRMASI',
            'saldo'         => 0
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('identitas_freelance', $data_freelance);
    }
    public function simpan_username()
    {
        $data_username = array(
            'username'      => htmlentities($this->input->post('username')),
            'status'        => 'AKTIF'
        );
        $this->db->where('id_user', htmlentities($this->input->post('id_user')));
        $this->db->update('identitas_freelance', $data_username);
    }
    public function update_jasa()
    {
        $data_jasa = array(
            'id_kategori'   => htmlentities($this->input->post('id_kategori')),
            'nm_jasa'       => htmlentities($this->input->post('nm_jasa')),
            'ket_jasa'      => htmlentities($this->input->post('ket_jasa')),
            'ketentuan'     => htmlentities($this->input->post('ketentuan')),
            'harga'         => htmlentities($this->input->post('harga'))
        );
        $this->db->where('kd_jasa', $this->input->post('kd_jasa'));
        $this->db->update('tbl_jasa', $data_jasa);
    }
    public function delete_jasa()
    {
        $data_jasa = array(
            'status'   => 'PASSIVE'
        );
        $this->db->where('kd_jasa', $this->input->post('kd_jasa'));
        $this->db->update('tbl_jasa', $data_jasa);
    }
    public function update_portfolio()
    {
        $portfolio_lama = $this->input->post('portfolio_lama');
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
                'foto_portfolio'    => $portfolio_name
            );
            $this->db->where('id_portfolio', $this->input->post('id_portfolio'));
            $this->db->update('jasa_portfolio', $data_portfolio);
            unlink('./assets/portfolio/' . $portfolio_lama);
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Ubah Gambar Portfolio!</div>');
        else :
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Ukuran Foto 941 X 529!</div>');
        endif;
    }
    public function hapus_portfolio()
    {
        $cek_data = $this->db->get_where('jasa_portfolio', ['id_portfolio' => $this->input->post('id_portfolio'), 'status' => 'UTAMA'])->row_array();
        if ($cek_data > 0) :
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-danger" id="berhasil_update" role="alert">Portfolio Sedang Digunakan!</div>');
        else :
            $this->db->where('id_portfolio', $this->input->post('id_portfolio'));
            $this->db->delete('jasa_portfolio');
            $portfolio_lama = $this->input->post('portfolio_lama');
            unlink('./assets/portfolio/' . $portfolio_lama);
            $this->session->set_flashdata('berhasil_update', '<div class="alert alert-success" id="berhasil_update" role="alert">Berhasil Hapus Gambar Portfolio!</div>');
        endif;
    }
    public function mulai_kerja()
    {
        $data = array(
            'status_transaksi' => 'PROSES'
        );
        $this->db->where('id_transaksi', html_escape($this->input->post('id_transaksi')));
        $this->db->update('tbl_transaksi', $data);
    }
    public function proses_kerja()
    {
        $data = array(
            'status_transaksi' => 'SELESAI',
            'pdf_url'          => html_escape($this->input->post('upload_link'))
        );
        $this->db->where('id_transaksi', html_escape($this->input->post('id_transaksi')));
        $this->db->update('tbl_transaksi', $data);
    }
}
