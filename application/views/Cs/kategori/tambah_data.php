<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriTitle">
                    Tambah Kategori Baru!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/kategori/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Nama Kategori</label>
                    <input type="text" class="form-control" id="nm_kategori" name="nm_kategori" placeholder="Masukkan Nama Kategori" required>
                </div>
                <div class="form-group">
                    <label>Masukkan Keterangan Jasa</label>
                    <textarea type="text" class="form-control" id="ket_kategori" name="ket_kategori" placeholder="Masukkan Keterangan Kategori" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpanKategori" name="simpanKategori" class="btn btn-success">Tambah</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>