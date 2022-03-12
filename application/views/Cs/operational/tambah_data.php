<!-- Tambah Data Kas -->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="tambahKategoriTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKategoriTitle">
                    Tambah Alur Kas
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/bendahara/operational/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Jenis Alur Kas</label>
                    <select name="jenis_kas" id="jenis_kas" class="form-control" required>
                        <option value="">Masukkan Jenis Alur Kas</option>
                        <option value="MASUK">Alur Kas Masuk</option>
                        <option value="KELUAR">Alur Kas Keluar</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Masukkan Nominal</label>
                    <input type="text" class="form-control" id="jml_nominal" name="jml_nominal"
                        placeholder="Masukkan Nama Kategori" required>
                </div>
                <div class="form-group">
                    <label>Masukkan Keterangan</label>
                    <textarea type="text" class="form-control" id="berita_acara" name="berita_acara"
                        placeholder="Masukkan Keterangan" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="simpan_kas" name="simpan_kas" class="btn btn-success">Simpan</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<!-- Cetak Laporan -->
<div class="modal fade" id="cetakLaporan" tabindex="-1" role="dialog" aria-labelledby="cetakLaporanTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cetakLaporanTitle">
                    Cetak Laporan Keuangan
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('admin/bendahara/operational/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <label>Masukkan Jenis Alur Kas</label>
                    <select name="jenis_kas" id="jenis_kas" class="form-control" required>
                        <option value="">Masukkan Jenis Alur Kas</option>
                        <option value="MASUK">Alur Kas Masuk</option>
                        <option value="KELUAR">Alur Kas Keluar</option>
                        <option value="ALL">Semua Alur Kas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal"
                        placeholder="Masukkan Nama Kategori" required>
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir"
                        placeholder="Masukkan Nama Kategori" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="cetak_laporan" name="cetak_laporan" class="btn btn-success">Cetak</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>