<div class="modal fade" id="nego_detail" tabindex="-1" role="dialog" aria-labelledby="nego_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nego_detailLabel">Upload Bukti Pembayaran!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('cust/transaksi/order/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Kode Transaksi</label>
                    <input type="text" class="form-control" id="id_transaksi" readonly name="id_transaksi" placeholder="Nama Kategori, Mis. Dokter Gigi">
                </div>
                <div class="form-group">
                    <label>Upload Bukti Pembayaran</label>
                    <input type="file" class="form-control" id="bukti_tf" name="bukti_tf" required placeholder="Masukkan Nama Lengkap">
                    <small>*Silahkan kirim pembayaran anda melalui bank</small><br>
                    <small>BCA - Norek 09299122 - Lukito Prayogo</small>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-primary" id="kirimBuktiTF" name="kirimBuktiTF">Kirim</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_nego", function() {
        var id_transaksi = $(this).data('id_transaksi');
        $(".modal-body#detail_body #id_transaksi").val(id_transaksi);
    })
</script>
<div class="modal fade" id="proses_detail" tabindex="-1" role="dialog" aria-labelledby="proses_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="proses_detailLabel">Proses Transaksi!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('cust/transaksi/order/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Kode Transaksi</label>
                    <input type="text" class="form-control" id="id_transaksi" readonly name="id_transaksi" placeholder="Nama Kategori, Mis. Dokter Gigi">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-primary" id="prosesPekerjaan" name="prosesPekerjaan">Proses</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_proses", function() {
        var id_transaksi = $(this).data('id_transaksi');
        $(".modal-body#detail_body #id_transaksi").val(id_transaksi);
    })
</script>