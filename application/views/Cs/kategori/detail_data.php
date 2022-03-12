<div class="modal fade" id="kategori_detail" tabindex="-1" role="dialog" aria-labelledby="kategori_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategori_detailLabel">Detail Kategori Jasa!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('admin/kategori/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Nama Kategori</label>
                    <input type="text" class="form-control" id="id_kategori" hidden name="id_kategori" placeholder="Masukkan Nama Kategori">
                    <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" placeholder="Masukkan Nama Kategori" required>
                </div>
                <div class="form-group">
                    <label>Masukkan Keterangan Jasa</label>
                    <textarea type="text" class="form-control" id="ket_kategori" name="ket_kategori" placeholder="Masukkan Keterangan Kategori" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-primary" id="updateKategoriBaru" name="updateKategoriBaru">Update</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_kategori", function() {
        var id_kategori = $(this).data('id_kategori');
        var nm_kategori = $(this).data('nm_kategori');
        var ket_kategori = $(this).data('ket_kategori');
        $(".modal-body#detail_body #id_kategori").val(id_kategori);
        $(".modal-body#detail_body #nm_kategori").val(nm_kategori);
        $(".modal-body#detail_body #ket_kategori").val(ket_kategori);
    })
</script>