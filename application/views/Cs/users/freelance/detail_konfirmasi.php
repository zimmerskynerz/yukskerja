<div class="modal fade" id="cs_detail" tabindex="-1" role="dialog" aria-labelledby="cs_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cs_detailLabel">Konfrimasi Freealnce</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/users/konfirmasi-freelancer/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Email Customer Service</label>
                    <input type="email" readonly class="form-control" readonly id="email" name="email" placeholder="Masukkan Email Aktif" required>
                    <input type="text" class="form-control" readonly id="id_user" name="id_user" hidden required placeholder="Nama Kategori, Mis. Dokter Gigi">
                </div>
                <div class="form-group">
                    <label>Nama Lengkap Customer Service</label>
                    <input type="text" class="form-control" readonly id="nm_lengkap" name="nm_lengkap" placeholder="Masukkan Nama Lengkap">
                </div>
                <div class="form-group">
                    <label>Alasan Ditolak</label>
                    <textarea type="text" class="form-control" id="komentar" name="komentar" placeholder="Masukkan Alamat Rumah"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-danger" id="tolakKonfirmasi" name="tolakKonfirmasi">Tolak</button>
                <button type="submit" class="btn btn-success" id="terimaKonfirmasi" name="terimaKonfirmasi">Terima</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_cs", function() {
        var id_user = $(this).data('id_user');
        var email = $(this).data('email');
        var nm_lengkap = $(this).data('nm_lengkap');
        var alamat = $(this).data('alamat');
        var no_hp = $(this).data('no_hp');
        var tgl_lahir = $(this).data('tgl_lahir');
        $(".modal-body#detail_body #id_user").val(id_user);
        $(".modal-body#detail_body #email").val(email);
        $(".modal-body#detail_body #nm_lengkap").val(nm_lengkap);
        $(".modal-body#detail_body #alamat").val(alamat);
        $(".modal-body#detail_body #no_hp").val(no_hp);
        $(".modal-body#detail_body #tgl_lahir").val(tgl_lahir);
    })
</script>