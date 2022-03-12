<div class="modal fade" id="jasa_detail" tabindex="-1" role="dialog" aria-labelledby="jasa_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jasa_detailLabel">Detail Jasa Freelancer!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <div class="modal-body" id="detail_body">
                <?php echo form_open_multipart('cust-freelance/produk/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Nama Jasa</label>
                    <input type="text" class="form-control" hidden id="kd_jasa" name="kd_jasa" placeholder="Masukkan Nama Jasa" required>
                    <input type="text" class="form-control" id="nm_jasa" name="nm_jasa" placeholder="Masukkan Nama Jasa" required>
                </div>
                <div class="form-group">
                    <select class="form-control" id="id_kategori" name="id_kategori">
                        <?php foreach ($data_kategori as $Data_kategori) : ?>
                            <option value="<?= $Data_kategori->id_kategori ?>"><?= $Data_kategori->nm_kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Masukkan Harga Jasa</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Jasa" required>
                    <small>*Harga dipotong 10% untuk aplikasi</small>
                </div>
                <div class="form-group">
                    <label>Masukkan Keterangan Jasa</label>
                    <textarea type="text" class="form-control" id="ket_jasa2" name="ket_jasa2" placeholder="Masukkan Keterangan Jasa"></textarea>
                </div>
                <div class="form-group">
                    <label>Masukkan Ketentuan Jasa</label>
                    <textarea type="text" class="form-control" id="ketentuan2" rows="15" name="ketentuan2" placeholder="Masukkan Ketentuan Jasa"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-danger" id="delete_jasa" name="delete_jasa">Delete</button>
                <button type="submit" class="btn btn-primary" id="update_jasa" name="update_jasa">Update</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_jasa", function() {
        var kd_jasa = $(this).data('kd_jasa');
        var nm_jasa = $(this).data('nm_jasa');
        var harga = $(this).data('harga');
        var id_kategori = $(this).data('id_kategori');
        var ketentuan = $(this).data('ketentuan');
        var ket_jasa = $(this).data('ket_jasa');
        $(".modal-body#detail_body #kd_jasa").val(kd_jasa);
        $(".modal-body#detail_body #nm_jasa").val(nm_jasa);
        $(".modal-body#detail_body #harga").val(harga);
        $(".modal-body#detail_body #id_kategori").val(id_kategori);
        $(".modal-body#detail_body #ket_jasa2").val(ket_jasa);
        $(".modal-body#detail_body #ketentuan2").val(ketentuan);
    })
</script>