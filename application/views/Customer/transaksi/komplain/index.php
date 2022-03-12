<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <?= $this->session->flashdata('data_berhasil'); ?>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-weight: bold">No</th>
                                <th style="text-align: center; font-weight: bold">Kode Transaksi</th>
                                <th style="text-align: center; font-weight: bold">Kode Jasa</th>
                                <th style="text-align: center; font-weight: bold">Harga</th>
                                <th style="text-align: center; font-weight: bold">Link</th>
                                <th style="text-align: center; font-weight: bold">Keterangan</th>
                                <th style="text-align: center; font-weight: bold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_transaksi as $Data_transaksi) : ?>
                                <tr>
                                    <td class="text-center"><?= $no ?></td>
                                    <td class="text-center"><?= $Data_transaksi->id_transaksi ?></td>
                                    <td class="text-center"><?= $Data_transaksi->kd_jasa ?></td>
                                    <td class="text-center"><?= $Data_transaksi->harga ?></td>
                                    <td class="text-center">
                                        <a target="_BLANK" href="https://<?= $Data_transaksi->link_jasa ?>">
                                            <?= $Data_transaksi->link_jasa ?>
                                        </a>
                                    </td>
                                    <td class="text-center"><?= $Data_transaksi->ket_tambahan ?></td>
                                    <td class="text-center">
                                        <?php if ($Data_transaksi->pembayaran == 'BELUM_BAYAR') : ?>
                                            <span class="badge outline-badge-danger">Belum Bayar</span>
                                        <?php elseif ($Data_transaksi->pembayaran == 'PEMBAYARAN') :
                                        ?>
                                            <span class="badge outline-badge-success">Bayar</span>
                                        <?php
                                        elseif ($Data_transaksi->pembayaran == 'KONFIRMASI') :
                                        ?>
                                            <span class="badge outline-badge-success">Konfirmasi Pekerja</span>
                                        <?php
                                        elseif ($Data_transaksi->pembayaran == 'PROSES') :
                                        ?>
                                            <span class="badge outline-badge-success">Proses</span>
                                        <?php
                                        elseif ($Data_transaksi->pembayaran == 'SELESAI') :
                                        ?>
                                            <span class="badge outline-badge-success">Selesai</span>
                                        <?php
                                        elseif ($Data_transaksi->pembayaran == 'GAJIAN') :
                                        ?>
                                            <span class="badge outline-badge-success">Selesai</span>
                                        <?php
                                        else :
                                        ?>
                                            <span class="badge outline-badge-danger">Komplain</span>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
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
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                    </path>
                </svg></p>
        </div>
    </div>
</div>
<?php $this->load->view('Customer/transaksi/selesai/detail_data') ?>
<script>
    setTimeout(function() {
        $('#data_berhasil').hide()
    }, 3000);
</script>