<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row invoice layout-top-spacing layout-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="doc-container">

                    <div class="row">

                        <div class="col-xl-9">

                            <div class="invoice-container">
                                <div class="invoice-inbox">

                                    <div id="ct" class="">

                                        <div class="invoice-00001">
                                            <div class="content-section">

                                                <div class="inv--head-section inv--detail-section">

                                                    <div class="row">

                                                        <div class="col-sm-6 col-12 mr-auto">
                                                            <div class="d-flex">
                                                                <img class="company-logo"
                                                                    src="<?= base_url('assets') ?>/img/yk.png"
                                                                    alt="company">
                                                                <h3 class="in-heading align-self-center">Yuks Kerja.
                                                                </h3>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 text-sm-right">
                                                            <p class="inv-list-number"><span class="inv-title">Invoice :
                                                                </span> <span
                                                                    class="inv-number">#<?= $id_transaksi ?></span>
                                                            </p>
                                                        </div>

                                                        <div class="col-sm-6 align-self-center mt-3">
                                                            <p class="inv-street-addr">YuksKerja.com</p>
                                                            <p class="inv-email-address">cs@yukskerja.com</p>
                                                            <p class="inv-email-address">(+62) 85727746700)</p>
                                                        </div>
                                                        <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                            <p class="inv-created-date"><span class="inv-title">Invoice
                                                                    Date : </span><br>
                                                                <span
                                                                    class="inv-date"><?= date('d F Y', strtotime($data_transaksi['tgl_transaksi'])) ?></span><br>
                                                                <?php if ($data_transaksi['status_transaksi'] == 'PROSES') : ?>
                                                                <span class="badge outline-badge-warning">PROSES</span>
                                                                <?php elseif ($data_transaksi['status_transaksi'] == 'SELESAI' or 'GAJIAN') : ?>
                                                                <span class="badge outline-badge-success">SELESAI</span>
                                                                <?php else : ?>
                                                                <span class="badge outline-badge-danger">KOMPLAIN</span>
                                                                <?php endif;
                                                                ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="inv--detail-section inv--customer-detail-section">

                                                    <div class="row">

                                                        <div
                                                            class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                            <p class="inv-to">Invoice Kepada</p>
                                                        </div>

                                                        <div
                                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 inv--payment-info">
                                                            <h6 class=" inv-title">Freelance:</h6>
                                                        </div>

                                                        <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                            <p class="inv-customer-name">
                                                                <?= $data_pelanggan['nm_lengkap'] ?></p>
                                                            <p class="inv-street-addr"><?= $data_pelanggan['alamat'] ?>
                                                            </p>
                                                            <p class="inv-email-address"><?= $data_pelanggan['email'] ?>
                                                            </p>
                                                            <p class="inv-email-address"><?= $data_pelanggan['no_hp'] ?>
                                                            </p>
                                                        </div>

                                                        <div
                                                            class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">
                                                            <div class="inv--payment-info">
                                                                <p>
                                                                    <span><?= $data_freelance['nm_lengkap'] ?></span>
                                                                </p>
                                                                <p>
                                                                    <span><?= $data_freelance['email'] ?></span>
                                                                </p>
                                                                <p>
                                                                    <?= $data_freelance['no_hp'] ?>
                                                                <p>
                                                                    <span><?= $data_freelance['alamat'] ?></span>
                                                                </p>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                                <div class="inv--product-table-section">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class="">
                                                                <tr>
                                                                    <th scope="col">S.No</th>
                                                                    <th scope="col">Items</th>
                                                                    <th class="text-right" scope="col">Qty</th>
                                                                    <th class="text-right" scope="col">Price
                                                                    </th>
                                                                    <th class="text-right" scope="col">Amount
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><?= $data_freelance['nm_jasa'] ?></td>
                                                                    <td class="text-right">1</td>
                                                                    <td class="text-right">
                                                                        <?= $data_freelance['harga'] ?>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <?= $data_freelance['harga'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="inv--total-amounts">

                                                    <div class="row mt-4">
                                                        <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                        </div>
                                                        <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                            <div class="text-sm-right">
                                                                <div class="row">
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class="">Sub Total: </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class=""><?= $data_freelance['harga'] ?></p>
                                                                    </div>
                                                                    <!-- <div class="col-sm-8 col-7">
                                                                        <p class="">Tax Amount: </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">-</p>
                                                                    </div>
                                                                    <div class="col-sm-8 col-7">
                                                                        <p class=" discount-rate">Discount :
                                                                            <span class="discount-percentage">5%</span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5">
                                                                        <p class="">$10</p>
                                                                    </div> -->
                                                                    <div class="col-sm-8 col-7 grand-total-title">
                                                                        <h4 class="">Grand Total : </h4>
                                                                    </div>
                                                                    <div class="col-sm-4 col-5 grand-total-amount">
                                                                        <h4 class=""><?= $data_freelance['harga'] ?>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="inv--note">

                                                    <div class="row mt-4">
                                                        <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                            <p>Note: Terimakasih sudah menggunakan jasa kami.</p>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                </div>

                            </div>

                        </div>

                        <div class="col-xl-3">

                            <div class="invoice-actions-btn">

                                <div class="invoice-action-btn">

                                    <div class="row">
                                        <div class="col-xl-12 col-md-3 col-sm-6">
                                            <a href="javascript:void(0);"
                                                class="btn btn-secondary btn-print  action-print">Print</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

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