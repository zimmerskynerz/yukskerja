<div class="modal fade" id="CetakTransaksi" tabindex="-1" role="dialog" aria-labelledby="CetakTransaksiTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="CetakTransaksiTitle">
                    Cetak Laporan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('owner/reports/transaksi/cetak'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="row mb-4">
                    <div class="col" style="width: 200px;">
                        <center>
                            <label>
                                Mulai
                            </label>
                        </center>
                        <input type="date" class="form-control" placeholder="Mulai Kupon" id="tgl_mulai"
                            name="tgl_mulai" required>
                    </div>
                    <h4 style="padding-top: 38px;">s.d</h4>
                    <div class="col" style="width: 200px;">
                        <center>
                            <label>
                                Selesai
                            </label>
                        </center>
                        <input type="date" class="form-control" placeholder="Selesa Kupon" id="tgl_selesai"
                            name="tgl_selesai" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpanPromo" name="simpanPromo" class="btn btn-primary">Cetak</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>