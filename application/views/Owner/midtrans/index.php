<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Konfigurasi Midtrans</h4>
                            </div>
                        </div>
                    </div>
                    <?= $this->session->flashdata('berhasil_berubah'); ?>
                    <div class="widget-content widget-content-area" style="padding-bottom: 15px;">
                        <?php echo form_open_multipart('owner/midtrans/crud'); ?>
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                            value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="input-group mb-4"
                            style="padding-left: 15px; padding-right: 15px; padding-top: 15px">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">-</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Masukkan ID Merchan Midtrans"
                                aria-label="Username" id="id_merchan" value="<?= $data_midtrans['id_merchan'] ?>"
                                name="id_merchan">
                        </div>
                        <div class="input-group mb-4" style="padding-left: 15px; padding-right: 15px; ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">-</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Masukkan Client Key Midtrans"
                                aria-label="Username" id="client_key" value="<?= $data_midtrans['client_key'] ?>"
                                name="client_key">
                        </div>
                        <div class="input-group mb-4" style="padding-left: 15px; padding-right: 15px; ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">-</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Masukkan Server Key Midtrans"
                                aria-label="Username" id="server_key" value="<?= $data_midtrans['server_key'] ?>"
                                name="server_key">
                        </div>
                        <div class="input-group mb-4" style="padding-left: 15px; padding-right: 15px; ">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon5">-</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Masukkan Snap JS Midtrans"
                                aria-label="Username" id="snap_js" value="<?= $data_midtrans['snap_js'] ?>"
                                name="snap_js">
                        </div>
                        <button type="submit" id="simpanMidtrans" name="simpanMidtrans"
                            class="mt-4 btn btn-primary">Simpan</button>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<div class="footer-wrapper">
    <div class="footer-section f-section-1">
        <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All
            rights reserved.</p>
    </div>
    <div class="footer-section f-section-2">
        <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-heart">
                <path
                    d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                </path>
            </svg></p>
    </div>
</div>
</div>
<script>
setTimeout(function() {
    $('#berhasil_berubah').hide()
}, 3000);
</script>