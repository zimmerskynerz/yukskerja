<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div id="fs2Basic" class="col-lg-12 layout-spacing">
                <?= $this->session->flashdata('gagal_daftar'); ?>
                <?= $this->session->flashdata('berhasil_daftar'); ?>
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>DAFTAR FREELANCER</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <?php echo form_open_multipart('customer/freelancer/crud'); ?>
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <?php
                        if ($data_komentar > 0) : ?>
                            <div class="form-group">
                                <label>Alasan Ditolak</label>
                                <textarea type="text" class="form-control" id="alasan" name="alasan" readonly>Pengajuan freelance anda ditolak karena <?= $data_komentar['komentar'] ?></textarea>
                            </div>
                        <?php endif
                        ?>
                        <div class="form-group">
                            <input type="email" readonly class="form-control" value="<?= $identitas['email'] ?>" id="email" name="email" placeholder="Masukkan Email Aktif" required>
                            <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $identitas['id_user'] ?>" hidden required placeholder="Nama Kategori, Mis. Dokter Gigi">
                        </div>
                        <div class="form-group">
                            <label>Masukkan Salah Satu Identitas Anda</label>
                            <select class="form-control  basic" id="jid" name="jid">
                                <option selected="selected" value="null">Pilih Identitas</option>
                                <option value="KTP">Kartu Tanda Penduduk</option>
                                <option value="SIM">Surat Izin Mengemudi</option>
                                <option value="KITAS">Kartu Ijin Tinggal Terbatas</option>
                                <option value="PASPOR">Paspor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Nomor Identitas</label>
                            <input type="number" class="form-control" id="no_id" name="no_id" placeholder="Masukkan Nomor Identitas Sesuai Identitas yang dipilih" required>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Nama Lengkap</label>
                            <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap" placeholder="Masukkan Nama Lengkap" value="<?= $identitas['nm_lengkap'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Masukkan Nomor HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Kalian" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Rumah" required></textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control  basic" id="nm_bank" name="nm_bank">
                                <option selected="selected">Pilih Bank</option>
                                <option value="BRI">Bank Rakyat Indonesia ( BRI )</option>
                                <option value="BCA">Bank Central Asia ( BCA )</option>
                                <option value="MANDIRI">Bank Mandiri</option>
                                <option value="BNI">Bank Nasional Indonesia ( BNI )</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kantor Cabang</label>
                            <input type="text" class="form-control" id="cabang" name="cabang" placeholder="Masukkan Nama Cabang Bank" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input type="text" class="form-control" id="no_rek" name="no_rek" placeholder="Masukkan Nomor Rekening" required>
                        </div>
                        <div class="form-group">
                            <label>Atas Pemilik Rekening Bank</label>
                            <input type="text" class="form-control" id="an_bank" name="an_bank" placeholder="Masukkan Nama Lengkap Pemilik Rekening Bank" required>
                        </div>
                        <div class="form-group">
                            <label>Foto KTP</label>
                            <input type="file" class="form-control" id="ktp" name="ktp" required>
                        </div>
                        <div class="form-group">
                            <label>Foto Selfi+KTP</label>
                            <input type="file" class="form-control" id="ktp_selfi" name="ktp_selfi" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="Kirim_Berkas" name="Kirim_Berkas">Daftar
                                Freelance!</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All
                rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg></p>
        </div>
    </div>
</div>
<?php $this->load->view('Cs/users/pelanggan/detail_data') ?>
<script>
    setTimeout(function() {
        $('#gagal_daftar').hide()
    }, 3000);
    setTimeout(function() {
        $('#berhasil_daftar').hide()
    }, 3000);
</script>