<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-one">
                    <div class="w-chart" style="display: flex; align-items: center; height: 100%;">
                        <div class="w-chart-section total-visits-content">
                            <div class="w-detail">
                                <p class="w-title">Total Customer</p>
                                <p class="w-stats"><?= $jml_pelanggan ?></p>
                            </div>
                        </div>
                        <div class="w-chart-section paid-visits-content">
                            <div class="w-detail">
                                <p class="w-title">Total Freelance</p>
                                <p class="w-stats"><?= $jml_freelance ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value">Penghasilan</h6>
                            </div>
                        </div>
                        <div class="w-content">
                            <div class="w-info">
                                <p class="value">Rp <?= $data_penghasilan ?>,- <span>
                                        <?=
                                        date('F Y') ?></span> </p>
                            </div>

                        </div>

                        <div class="w-progress-stats">
                            <div class="progress">

                            </div>
                            <div class="">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-account-invoice-two">
                    <div class="widget-content">
                        <div class="account-box">
                            <div class="info">
                                <div class="inv-title">
                                    <h5 class="">Total Kas</h5>
                                </div>
                                <div class="inv-balance-info">

                                    <p class="inv-balance">Rp <?= $saldo_kas ?></p>


                                </div>
                            </div>
                            <div class="acc-action">
                                <div class="">

                                </div>
                                <a href="<?= base_url('admin/bendahara/operational') ?>">Buku Besar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-activity-four">
                    <div class="widget-heading" style="padding-top: 30px;">
                        <h5 class="">Withdraw Activities</h5>
                    </div>
                    <div class="widget-content">
                        <div class="mt-container mx-auto">
                            <div class="timeline-line">
                                <?php
                                foreach ($data_wd as $WD) : ?>
                                <div class="item-timeline timeline-success">
                                    <div class="t-dot" data-original-title="" title="">
                                    </div>
                                    <div class="t-text">
                                        <p>[<?= date('d/m/Y', strtotime($WD->tgl_wd)) ?>] <?= $WD->nm_lengkap ?></a></p>
                                        <?php if ($WD->WD_STATUS == 'PROSES') : ?>
                                        <span class="badge">Proses</span>
                                        <?php elseif ($WD->WD_STATUS == 'BERHASIL') : ?>
                                        <span class="badge">Berhasil</span>
                                        <?php else : ?>
                                        <span class="badge">Gagal</span>
                                        <?php endif; ?>
                                        <p class="t-time">Rp <?= $WD->nominal ?>,-</p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="tm-action-btn">
                            <a href="<?= base_url('admin/bendahara/withdraw') ?>">
                                <button class="btn" type="submit" action="<?= base_url('admin/bendahara/withdraw') ?>">
                                    <span>View All</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                <div class="widget widget-table-two">
                    <div class="widget-heading" style="padding-top: 30px; padding-left: 20px;">
                        <h5 class="">Histori Pemesanan</h5>
                    </div>
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-content">Invoice</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Nama Pembeli</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Username</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Total Harga</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_transaksi as $Data_transaksi) : ?>
                                    <tr>
                                        <td>
                                            <div class="td-content product-invoice">
                                                #<?= $Data_transaksi->id_transaksi ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content product-invoice"><?= $Data_transaksi->nm_lengkap ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content product-invoice"><?= $Data_transaksi->username ?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="td-content pricing"><span
                                                    class=""><?= $Data_transaksi->jml_bayar ?></span></div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights
                reserved.</p>
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