<div class="modal fade" id="hadiah_detail" tabindex="-1" role="dialog" aria-labelledby="hadiah_detailLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hadiah_detailLabel">Detail Data Customer Service!</h5>
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
                <?php echo form_open_multipart('owner/hadiah/kupon/crud'); ?>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                <div class="form-group">
                    <input type="text" class="form-control" id="kd_hadiah" readonly name="kd_hadiah"
                        placeholder="Masukkan Kode Kupon">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="nm_hadiah" name="nm_hadiah"
                        placeholder="Masukkan Nama Kupon">
                    <input type="text" hidden class="form-control" id="id_hadiah" name="id_hadiah"
                        placeholder="Masukkan Nama Kupon">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="potongan" name="potongan"
                        placeholder="Masukkan Total Diskon/Potongan">
                </div>
                <div class="row mb-4">
                    <div class="col" style="width: 200px;">
                        <center>
                            <label>
                                Mulai
                            </label>
                        </center>
                        <input type="date" class="form-control" placeholder="Mulai Kupon" min="<?= date('Y-m-d') ?>"
                            id="mulai" name="mulai">
                    </div>
                    <h4 style="padding-top: 38px;">s.d</h4>
                    <div class="col" style="width: 200px;">
                        <center>
                            <label>
                                Selesai
                            </label>
                        </center>
                        <input type="date" class="form-control" placeholder="Selesa Kupon" id="selesai"
                            min="<?= date('Y-m-d') ?>" name="selesai">
                    </div>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="max_kupon" name="max_kupon"
                        placeholder="Masukkan Max Total Diskon/Potongan">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="bannerbaru" name="bannerbaru"
                        placeholder="Masukkan Max Total Diskon/Potongan">
                    <input type="text" class="form-control" id="banner" name="banner" hidden
                        placeholder="Masukkan Max Total Diskon/Potongan">
                </div>
                <div class="form-group">
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="0">Tidak Berkategori</option>
                        <option value="1">Kategori</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="status" id="status" class="form-control">
                        <option value="ACTIVE">Aktif Kupon</option>
                        <option value="PASSIVE">Pasif Kupon</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="min_order" name="min_order"
                        placeholder="Masukkan Minimal Order">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="max_order" name="max_order"
                        placeholder="Masukkan Maximal Potongan">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Close</button>
                <button type="submit" class="btn btn-success" id="updateKupon" name="updateKupon">Update</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).on("click", "#detail_hadiah", function() {
    var id_hadiah = $(this).data('id_hadiah');
    var nm_hadiah = $(this).data('nm_hadiah');
    var kd_hadiah = $(this).data('kd_hadiah');
    var potongan = $(this).data('potongan');
    var banner = $(this).data('banner');
    var mulai = $(this).data('mulai');
    var selesai = $(this).data('selesai');
    var max_kupon = $(this).data('max_kupon');
    var kategori = $(this).data('kategori');
    var min_order = $(this).data('min_order');
    var max_order = $(this).data('max_order');
    var status = $(this).data('status');
    $(".modal-body#detail_body #id_hadiah").val(id_hadiah);
    $(".modal-body#detail_body #nm_hadiah").val(nm_hadiah);
    $(".modal-body#detail_body #kd_hadiah").val(kd_hadiah);
    $(".modal-body#detail_body #potongan").val(potongan);
    $(".modal-body#detail_body #mulai").val(mulai);
    $(".modal-body#detail_body #banner").val(banner);
    $(".modal-body#detail_body #selesai").val(selesai);
    $(".modal-body#detail_body #max_kupon").val(max_kupon);
    $(".modal-body#detail_body #kategori").val(kategori);
    $(".modal-body#detail_body #min_order").val(min_order);
    $(".modal-body#detail_body #max_order").val(max_order);
    $(".modal-body#detail_body #status").val(status);
})
</script>