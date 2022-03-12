<div class="modal fade" id="TambahWD" tabindex="-1" role="dialog" aria-labelledby="TambahWDTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahWDTitle">
                    Withdraw!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('cust-freelance/pendapatan/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Jumlah Withdraw</label>
                    <input type="text" hidden class="form-control" id="username"
                        value="<?= $data_freelance['username'] ?>" name="username" placeholder="Masukkan Nama Kategori"
                        required>
                    <input type="text" hidden class="form-control" id="saldo" value="<?= $data_freelance['saldo'] ?>"
                        name="saldo" placeholder="Masukkan Nama Kategori" required>
                    <input type="number" class="form-control" id="jml_wd" name="jml_wd"
                        placeholder="Masukkan Nama Kategori" required>
                    <small>*biaya admin <?= $sett['withdraw'] ?></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpan_wd" name="simpan_wd" class="btn btn-success">Withdraw</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>