<div class="modal fade" id="tambahPortfolio" tabindex="-1" role="dialog" aria-labelledby="tambahPortfolioTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPortfolioTitle">
                    Tambah Portfolio!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('cust-freelance/produk/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Portfolio Baru</label>
                    <input type="text" class="form-control" id="kd_jasa" name="kd_jasa" value="<?= $kd_jasa ?>" hidden placeholder="Masukkan Nama Jasa" required>
                    <input type="file" class="form-control" id="portfolio" name="portfolio" placeholder="Daftarkan Username Jasa Anda" required>
                    <small>*Ukuran Gambar Harus 941X529</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpan_portfolio" name="simpan_portfolio" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>