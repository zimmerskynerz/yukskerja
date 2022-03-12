<div class="modal fade" id="wd_detail" tabindex="-1" role="dialog" aria-labelledby="wd_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="wd_detailLabel">Detail Withdraw!</h5>
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
                <?php echo form_open_multipart('admin/bendahara/withdraw/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label for="">Nama Bank</label>
                    <input type="text" class="form-control" id="nm_bank" readonly name="nm_bank"
                        placeholder="Nama Kategori, Mis. Dokter Gigi">
                    <input type="text" class="form-control" id="id_user" readonly name="id_user" hidden
                        placeholder="Nama Kategori, Mis. Dokter Gigi">
                    <input type="text" class="form-control" id="id_wd" name="id_wd" hidden
                        placeholder="Nama Kategori, Mis. Dokter Gigi">
                </div>
                <div class="form-group">
                    <label for="">Atas Nama</label>
                    <input type="text" class="form-control" id="an_bank" readonly name="an_bank"
                        placeholder="Nama Kategori, Mis. Dokter Gigi">
                </div>
                <div class="form-group">
                    <label for="">Nomor Rekening</label>
                    <input type="text" class="form-control" id="no_rek" readonly name="no_rek"
                        placeholder="Nama Kategori, Mis. Dokter Gigi">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Withdraw</label>
                    <input type="text" class="form-control" id="nominal" readonly name="nominal"
                        placeholder="Nama Kategori, Mis. Dokter Gigi">
                </div>
                <div class="form-group">
                    <label for="">Alasan Penolakan</label>
                    <textarea col="3" type="text" class="form-control" id="berita_acara" name="berita_acara"
                        placeholder="Jika Penolakan, harus sertakan alasan"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-danger" id="tolakWD" name="tolakWD">Tolak</button>
                <button type="submit" class="btn btn-primary" id="tranferWD" name="tranferWD">Terima</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).on("click", "#detail_wd", function() {
    var id_user = $(this).data('id_user');
    var nm_bank = $(this).data('nm_bank');
    var an_bank = $(this).data('an_bank');
    var no_rek = $(this).data('no_rek');
    var nominal = $(this).data('nominal');
    var id_wd = $(this).data('id_wd');
    $(".modal-body#detail_body #id_user").val(id_user);
    $(".modal-body#detail_body #nm_bank").val(nm_bank);
    $(".modal-body#detail_body #an_bank").val(an_bank);
    $(".modal-body#detail_body #no_rek").val(no_rek);
    $(".modal-body#detail_body #nominal").val(nominal);
    $(".modal-body#detail_body #id_wd").val(id_wd);
})
</script>