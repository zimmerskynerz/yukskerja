<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <button type="button" class="btn btn-primary mb-1" style="margin-top: 14px; margin-left: 14px;"
                        data-toggle="modal" data-target="#tambahKategori" id="#tambahKategoriBaru">
                        <i class="fas fa-user-graduate"></i>
                        Tambah
                    </button>
                    <button type="button" class="btn btn-success mb-1" style="margin-top: 14px; margin-left: 14px;"
                        data-toggle="modal" data-target="#cetakLaporan" id="#cetakLaporanBaru">
                        <i class="fas fa-user-graduate"></i>
                        Cetak
                    </button>
                    <?= $this->session->flashdata('data_berhasil'); ?>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-weight: bold">No</th>
                                <th style="text-align: center; font-weight: bold">Tanggal Transaksi</th>
                                <th style="text-align: center; font-weight: bold">Nominal</th>
                                <th style="text-align: center; font-weight: bold">Status</th>
                                <th style="text-align: center; font-weight: bold">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_kas as $Data_kas) : ?>
                            <tr>
                                <td class="text-center"><?= $no ?></td>
                                <td class="text-center"><?= date('d F Y', strtotime($Data_kas->tgl_transaksi)) ?></td>
                                <td class="text-right"><?= $Data_kas->jml_nominal ?>,-</td>
                                <td class="text-center">
                                    <?php if ($Data_kas->status == 'MASUK') : ?>
                                    <span class="badge outline-badge-success">MASUK</span>
                                    <?php else :
                                        ?>
                                    <span class="badge outline-badge-danger">KELUAR</span>
                                    <?php
                                        endif;
                                        ?>
                                </td>
                                <td><?= $Data_kas->keterangan ?></td>
                            </tr>
                            <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
<?php $this->load->view('Cs/operational/tambah_data') ?>
<script>
setTimeout(function() {
    $('#data_berhasil').hide()
}, 3000);
</script>