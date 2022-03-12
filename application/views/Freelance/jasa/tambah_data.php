<div class="modal fade" id="tambahJasa" tabindex="-1" role="dialog" aria-labelledby="tambahJasaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahJasaTitle">
                    Tambah Jasa Baru!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('cust-freelance/produk/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Nama Jasa</label>
                    <input type="text" class="form-control" id="username" name="username" hidden value="<?= $data_freelance['username'] ?>" placeholder="Masukkan Nama Jasa" required>
                    <input type="text" class="form-control" id="nm_jasa" name="nm_jasa" placeholder="Masukkan Nama Jasa" required>
                </div>
                <div class="form-group">
                    <select class="form-control" id="id_kategori" name="id_kategori">
                        <option value="0">Pilih Kategori Jasa</option>
                        <?php foreach ($data_kategori as $Data_kategori) : ?>
                            <option value="<?= $Data_kategori->id_kategori ?>"><?= $Data_kategori->nm_kategori ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Masukkan Harga Jasa</label>
                    <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga Jasa" required>
                    <small>*Harga dipotong <?= $set_biaya['jasa_online'] ?>% untuk aplikasi</small>
                </div>
                <div class="form-group">
                    <label>Masukkan Keterangan Jasa</label>
                    <textarea type="text" class="form-control" id="ket_jasa" name="ket_jasa" placeholder="Masukkan Keterangan Jasa"></textarea>
                </div>
                <div class="form-group">
                    <label>Masukkan Ketentuan Jasa</label>
                    <textarea type="text" class="form-control" id="ketentuan" rows="15" name="ketentuan" placeholder="Masukkan Ketentuan Jasa"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpan_jasa" name="simpan_jasa" class="btn btn-primary">Tambah</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Setting Username -->
<div class="modal fade" id="lengkapiData" tabindex="-1" role="dialog" aria-labelledby="lengkapiDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lengkapiDataTitle">
                    Lengkapi Data Freelance!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('cust-freelance/produk/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Username</label>
                    <input type="text" class="form-control" id="id_user" name="id_user" hidden value="<?= $identitas['id_user'] ?>" placeholder="Masukkan Nama Jasa" required>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Daftarkan Username Jasa Anda" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpan_username" name="simpan_username" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>