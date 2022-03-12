<div class="modal fade" id="tambahcs" tabindex="-1" role="dialog" aria-labelledby="tambahcsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahcsTitle">
                    Tambah Kupon Pengguna!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('owner/hadiah/promo/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input type="text" class="form-control" id="nm_kupon" name="nm_kupon"
                        placeholder="Masukkan Nama Kupon" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="kd_kupon" name="kd_kupon"
                        placeholder="Masukkan Kode Kupon" required>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="potongan" name="potongan"
                        placeholder="Masukkan Total Diskon/Potongan" required>
                </div>
                <div class="row mb-4">
                    <div class="col" style="width: 200px;">
                        <center>
                            <label>
                                Mulai
                            </label>
                        </center>
                        <input type="date" class="form-control" placeholder="Mulai Kupon" min="<?= date('Y-m-d') ?>"
                            id="mulai" name="mulai" required>
                    </div>
                    <h4 style="padding-top: 38px;">s.d</h4>
                    <div class="col" style="width: 200px;">
                        <center>
                            <label>
                                Selesai
                            </label>
                        </center>
                        <input type="date" class="form-control" placeholder="Selesa Kupon" id="selesai"
                            min="<?= date('Y-m-d') ?>" name="selesai" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="max_kupon" name="max_kupon"
                        placeholder="Masukkan Max Total Diskon/Potongan" required>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="banner" name="banner"
                        placeholder="Masukkan Max Total Diskon/Potongan" required>
                </div>
                <div class="form-group">
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="0">Tidak Berkategori</option>
                        <option value="1">Kategori</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="min_order" name="min_order"
                        placeholder="Masukkan Minimal Order" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="max_order" name="max_order"
                        placeholder="Masukkan Maximal Potongan" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpanPromo" name="simpanPromo" class="btn btn-primary">Tambah</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>