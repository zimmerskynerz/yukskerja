<div class="modal fade" id="tambahcs" tabindex="-1" role="dialog" aria-labelledby="tambahcsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahcsTitle">
                    Tambah Customer Service!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('owner/users/service/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Nama Lengkap</label>
                    <input type="text" class="form-control" id="nm_lengkap" name="nm_lengkap"
                        placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label>Masukkan Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Aktif"
                        required>
                </div>
                <div class="form-group">
                    <label>Masukkan Nomor Handphone</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No HP"
                        required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jkelamin" id="jkelamin" class="form-control">
                        <option value="0">Perempuan</option>
                        <option value="1">Laki-laki</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpanAdministrasi" name="simpanAdministrasi"
                    class="btn btn-primary">Tambah</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>