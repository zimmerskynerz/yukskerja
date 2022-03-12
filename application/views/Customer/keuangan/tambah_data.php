<div class="modal fade" id="wdUang" tabindex="-1" role="dialog" aria-labelledby="wdUangTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wdUangTitle">
                    Ambil Gaji!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('cust/keuangan/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Nama Bank</label>
                    <input type="text" class="form-control" id="id_user" value="<?= $data_login['id_user'] ?>" hidden name="id_user" placeholder="Masukkan Nama Jasa" required>
                    <input type="text" class="form-control" id="nm_jasa" value="<?= $data_berkas['nm_bank'] ?>" readonly name="nm_jasa" placeholder="Masukkan Nama Jasa" required>
                </div>
                <div class="form-group">
                    <label>Nomor Rekening</label>
                    <input type="text" class="form-control" id="nm_jasa" value="<?= $data_berkas['no_rek'] ?>" readonly name="nm_jasa" placeholder="Masukkan Nama Jasa" required>
                </div>
                <div class="form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" class="form-control" id="nm_jasa" name="nm_jasa" value="<?= $data_berkas['atas_nama'] ?>" readonly placeholder="Masukkan Nama Jasa" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Pendapatan</label>
                    <input type="text" class="form-control" id="jml_ada" name="jml_ada" value="<?= $jml_ada ?>" readonly placeholder="Masukkan Nama Jasa" required>
                </div>
                <div class="form-group">
                    <label>Jumlah Penarikan</label>
                    <input type="text" class="form-control" id="jml_penarikan" name="jml_penarikan" placeholder="Masukkan Nama Jasa" required>
                    <small>*Pengambilan akan dikenakan biaya aplikasi 15%</small>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="cair" name="cair" class="btn btn-primary">Cairkan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>