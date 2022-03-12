<div class="modal fade" id="order_detail" tabindex="-1" role="dialog" aria-labelledby="order_detailLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="order_detailLabel">Upload Pekerjaan!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('cust-freelance/transaksi/proses/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Kode Transaksi</label>
                    <input type="text" class="form-control" id="id_transaksi" readonly name="id_transaksi"
                        placeholder="Nama Kategori, Mis. Dokter Gigi">
                </div>
                <div class="form-group">
                    <label>Link Pekerjaan</label>
                    <input type="text" class="form-control" id="upload_link" name="upload_link"
                        placeholder="Masukkan Link Pekerjaan Anda">
                    <small>*Silahkan hasil pekerjaan untuk diupload terlebih dahulu di gdrive</small>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-primary" id="proses_kerja" name="proses_kerja">Selesai
                    Kerja</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).on("click", "#detail_order", function() {
    var id_transaksi = $(this).data('id_transaksi');
    $(".modal-body#detail_body #id_transaksi").val(id_transaksi);
})
</script>