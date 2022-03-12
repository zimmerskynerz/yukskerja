<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <?php
                    if ($data_freelance['username'] != null) : ?>
                    <button type="button" class="btn btn-primary mb-1" style="margin-top: 14px; margin-left: 14px;"
                        data-toggle="modal" data-target="#tambahJasa" id="#tambahJasaBaru">
                        <i class="fas fa-user-graduate"></i>
                        Tambah
                    </button>
                    <?php
                    else : ?>
                    <button type="button" class="btn btn-primary mb-1" style="margin-top: 14px; margin-left: 14px;"
                        data-toggle="modal" data-target="#lengkapiData" id="#lengkapiDataBaru">
                        <i class="fas fa-user-graduate"></i>
                        Lengkapi Data
                    </button>
                    <?php endif;
                    ?>
                    <?= $this->session->flashdata('berhasil_update'); ?>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-weight: bold">No</th>
                                <th style="text-align: center; font-weight: bold">Jasa</th>
                                <th style="text-align: center; font-weight: bold">Harga</th>
                                <th style="text-align: center; font-weight: bold">Status</th>
                                <th style="text-align: center; font-weight: bold">Transaksi</th>
                                <th style="text-align: center; font-weight: bold">Komentar</th>
                                <th class="no-content" style="text-align: center; font-weight: bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_jasa as $Data_jasa) : ?>
                            <tr>
                                <td class="text-center"><?= $no ?></td>
                                <td><?= $Data_jasa->nm_jasa ?></td>
                                <td class="text-center"><?= $Data_jasa->harga ?></td>
                                <td class="text-center">
                                    <?php if ($Data_jasa->status_jasa == 'ACTIVE') : ?>
                                    <span class="badge outline-badge-success">AKTIF</span>
                                    <?php else :
                                        ?>
                                    <span class="badge outline-badge-danger">PASSIVE</span>
                                    <?php
                                        endif;
                                        ?>
                                </td>
                                <td class="text-center">
                                    <?php foreach ($data_transaksi as $Data_transaksi) :
                                            if ($Data_transaksi->kd_jasa2 == $Data_jasa->kd_jasa) :
                                                echo $Data_transaksi->jml_transaksi . " Transaksi";
                                            endif;
                                        endforeach; ?>
                                </td>
                                <td class="text-center">
                                    <?php foreach ($data_review as $Data_review) :
                                            if ($Data_review->kd_jasa2 == $Data_jasa->kd_jasa) :
                                                echo $Data_review->jml_review . " Review";
                                            endif;
                                        endforeach; ?>
                                </td>
                                <td class="text-center">
                                    <a id="detail_jasa" href="javascript:void(0);" class="bs-tooltip"
                                        data-toggle="modal" data-target="#jasa_detail" data-placement="top" title=""
                                        data-original-title="Detail" data-id_user="<?= $Data_jasa->id_user ?>"
                                        data-id_kategori="<?= $Data_jasa->id_kategori ?>"
                                        data-kd_jasa="<?= $Data_jasa->kd_jasa ?>"
                                        data-nm_jasa="<?= $Data_jasa->nm_jasa ?>"
                                        data-ket_jasa="<?= $Data_jasa->ket_jasa ?>"
                                        data-ketentuan="<?= $Data_jasa->ketentuan ?>"
                                        data-harga="<?= $Data_jasa->harga ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>
                                    <a href="<?= base_url('cust-freelance/produk/portfolio/' . $Data_jasa->kd_jasa) ?>"
                                        class="bs-tooltip" data-original-title="Portfolio">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-paperclip">
                                            <path
                                                d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48">
                                            </path>
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
<?php $this->load->view('Freelance/jasa/tambah_data') ?>
<?php $this->load->view('Freelance/jasa/detail_data') ?>
<script>
setTimeout(function() {
    $('#berhasil_update').hide()
}, 3000);
</script>