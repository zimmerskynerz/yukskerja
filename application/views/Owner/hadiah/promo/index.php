<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <button type="button" class="btn btn-primary mb-1" style="margin-top: 14px; margin-left: 14px;"
                        data-toggle="modal" data-target="#tambahcs" id="#tambahCSBaru">
                        <i class="fas fa-user-graduate"></i>
                        Tambah
                    </button>
                    <?= $this->session->flashdata('gagal_tanggal'); ?>
                    <?= $this->session->flashdata('berhasil_tanggal'); ?>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-weight: bold">No</th>
                                <th style="text-align: center; font-weight: bold">Banner Promo</th>
                                <th style="text-align: center; font-weight: bold">Kode Promo</th>
                                <th style="text-align: center; font-weight: bold">Nama Promo</th>
                                <th style="text-align: center; font-weight: bold">Potongan</th>
                                <th style="text-align: center; font-weight: bold">Persyaratan</th>
                                <th style="text-align: center; font-weight: bold">Status</th>
                                <th class="no-content" style="text-align: center; font-weight: bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_promo as $Data_promo) : ?>
                            <tr>
                                <td class="text-center"><?= $no ?></td>
                                <td class="text-center">
                                    <center>
                                        <img src="<?= base_url('assets/banner/' . $Data_promo->banner) ?>"
                                            style="width: 256x; height: 128px"></img>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <?= $Data_promo->kd_hadiah ?>
                                    </center>
                                </td>
                                <td><?= $Data_promo->nm_hadiah ?></td>
                                <td>
                                    <center>
                                        <?= $Data_promo->potongan ?>%
                                    </center>
                                </td>
                                <td>
                                    Min Order : Rp <?= $Data_promo->min_order ?>,- <br>
                                    Max Potongan : Rp <?= $Data_promo->max_order ?>,- <br>
                                    Jumlah : <?= $Data_promo->max_kupon ?> Kupon <br>
                                    <b> Berlaku </b><br>
                                    Mulai : <?= date('d F Y', strtotime($Data_promo->mulai)) ?> <br>
                                    Selesai : <?= date('d F Y', strtotime($Data_promo->selesai)) ?>
                                </td>
                                <td>
                                    <center>
                                        <?php
                                            if ($Data_promo->status == 'ACTIVE') :
                                                echo '<span class="badge outline-badge-success">ACTIVE</span>';
                                            else :
                                                echo '<span class="badge outline-badge-danger">PASSIVE</span>';
                                            endif; ?>
                                    </center>
                                </td>
                                <td class="text-center">
                                    <a id="detail_hadiah" href="javascript:void(0);" class="bs-tooltip"
                                        data-toggle="modal" data-target="#hadiah_detail" data-placement="top" title=""
                                        data-original-title="Detail" data-id_hadiah="<?= $Data_promo->id_hadiah ?>"
                                        data-nm_hadiah="<?= $Data_promo->nm_hadiah ?>"
                                        data-kd_hadiah="<?= $Data_promo->kd_hadiah ?>"
                                        data-potongan="<?= $Data_promo->potongan ?>"
                                        data-mulai="<?= $Data_promo->mulai ?>"
                                        data-selesai="<?= $Data_promo->selesai ?>"
                                        data-max_kupon="<?= $Data_promo->max_kupon ?>"
                                        data-banner="<?= $Data_promo->banner ?>"
                                        data-kategori="<?= $Data_promo->kategori ?>"
                                        data-min_order="<?= $Data_promo->min_order ?>"
                                        data-max_order="<?= $Data_promo->max_order ?>"
                                        data-status="<?= $Data_promo->status ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>
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
<?php $this->load->view('Owner/hadiah/promo/tambah_data') ?>
<?php $this->load->view('Owner/hadiah/promo/detail_data') ?>
<script>
setTimeout(function() {
    $('#gagal_tanggal').hide()
}, 3000);
setTimeout(function() {
    $('#berhasil_tanggal').hide()
}, 3000);
</script>