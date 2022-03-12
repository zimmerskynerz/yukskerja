<div class="modal fade" id="portfolio_detail" tabindex="-1" role="dialog" aria-labelledby="portfolio_detailLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="portfolio_detailLabel">Update Portfolio</h5>
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
                    <label>Masukkan Portfolio Baru</label>
                    <input type="text" class="form-control" id="kd_jasa" name="kd_jasa" hidden placeholder="Masukkan Nama Jasa" required>
                    <input type="text" class="form-control" hidden id="id_portfolio" name="id_portfolio" placeholder="Daftarkan Username Jasa Anda">
                    <input type="text" class="form-control" hidden id="portfolio_lama" name="portfolio_lama" placeholder="Daftarkan Username Jasa Anda">
                    <input type="file" class="form-control" id="portfolio" name="portfolio" placeholder="Daftarkan Username Jasa Anda">
                    <small>*Ukuran Gambar Harus 941X529</small>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-danger" id="hapus_portfolio" name="hapus_portfolio">Hapus</button>
                <button type="submit" class="btn btn-success" id="utama_portfolio" name="utama_portfolio">Aktifkan</button>
                <button type="submit" class="btn btn-primary" id="update_portfolio" name="update_portfolio">Ubah</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on("click", "#detail_portfolio", function() {
        var kd_jasa = $(this).data('kd_jasa');
        var id_portfolio = $(this).data('id_portfolio');
        var foto_portfolio = $(this).data('foto_portfolio');
        $(".modal-body#detail_body #kd_jasa").val(kd_jasa);
        $(".modal-body#detail_body #id_portfolio").val(id_portfolio);
        $(".modal-body#detail_body #portfolio_lama").val(foto_portfolio);
    })
</script>