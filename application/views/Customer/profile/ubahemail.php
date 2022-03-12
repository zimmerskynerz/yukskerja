<div class="modal fade" id="ubahEmail" tabindex="-1" role="dialog" aria-labelledby="ubahEmailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahEmailTitle">
                    Ubah Email Pengguna
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('customer/profile/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div id="password-field" class="field-wrapper input mb-2">
                    <input type="text" class="form-control" id="id_user" value="<?= $identitas['id_user'] ?>" hidden name="id_user" placeholder="Masukkan Nama Jasa" required>
                    <input type="text" class="form-control" id="nm_lengkap" value="<?= $identitas['nm_lengkap'] ?>" hidden name="nm_lengkap" placeholder="Masukkan Nama Jasa" required>
                    <input id="email_lama" name="email_lama" type="email" class="form-control" value="<?= $identitas['email'] ?>" readonly placeholder="Masukkan Password Lama">
                </div>
                <div id="password-field" class="field-wrapper input mb-2">
                    <input id="email_baru" name="email_baru" type="email" class="form-control" required placeholder="Masukkan Email Baru">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpan_email" name="simpan_email" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>