<div class="modal fade" id="ubahPass" tabindex="-1" role="dialog" aria-labelledby="ubahPassTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ubahPassTitle">
                    Ganti Password
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
                    <input id="password_lama" name="password_lama" type="password" class="form-control" required placeholder="Masukkan Password Lama">
                </div>
                <div id="password-field" class="field-wrapper input mb-2">
                    <input id="password_baru" name="password_baru" type="password" class="form-control" required placeholder="Masukkan Password Baru">
                </div>
                <div id="password-field" class="field-wrapper input mb-2">
                    <input id="password_lagi" name="password_lagi" type="password" class="form-control" required placeholder="Masukkan Password Baru Lagi">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpan_password" name="simpan_password" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>