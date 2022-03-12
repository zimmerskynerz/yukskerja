<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-account-invoice-three">
                    <div class="widget-heading">
                        <div class="wallet-usr-info">
                            <div class="usr-name">
                                <span><img src="<?= base_url('assets/') ?>img/profile-32.jpg" alt="admin-profile"
                                        class="img-fluid">
                                    <?= $identitas['nm_lengkap'] ?>
                                </span>
                            </div>
                        </div>
                        <div class="wallet-balance">
                            <p>Saldo</p>
                            <h5 class=""><span class="w-currency"><?= $identitas['saldo'] ?>,-</h5>
                        </div>
                        <div class="wallet-balance">
                            <p>Withdraw</p>
                            <h5 class=""><span class="w-currency">
                                    <?php if ($pengeluaran['pengeluaran'] > 0) :
                                        echo $pengeluaran['pengeluaran'];
                                    else :
                                        echo 0;
                                    endif; ?>,-</h5>
                        </div>
                    </div>
                    <div class="widget-content">
                        <div class="bills-stats">
                            <span>Kerjaan Proses</span>
                        </div>
                        <div class="invoice-list">
                            <div class="inv-detail">
                                <?php
                                $no = 1;
                                foreach ($transaksi_proses as $Transaksi_proses) : ?>
                                <div class="info-detail-<?= $no ?>">
                                    <p><?= $Transaksi_proses->id_transaksi ?></p>
                                    <p><span class="w-currency"></span> <span class="bill-amount">Rp
                                            <?= $Transaksi_proses->jml_bayar ?></span></p>
                                </div>
                                <?php $no++;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tm-action-btn" style="text-align: center; padding-bottom: 12px">
                        <a href="<?= base_url('cust-freelance/transaksi/proses') ?>">
                            <button class="btn" type="submit"
                                action="<?= base_url('cust-freelance/transaksi/proses') ?>">
                                <span>Lihat Semua</span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </button>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-12 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-table-two">

                    <div class="widget-heading">
                        <h5 class="">History Order</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="th-content">Tanggal</div>
                                        </th>
                                        <th>
                                            <div class="th-content">Invoice</div>
                                        </th>
                                        <th>
                                            <div class="th-content">Product</div>
                                        </th>
                                        <th>
                                            <div class="th-content th-heading">Price</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_transaksi as $Data_transaksi) : ?>
                                    <tr>
                                        <td>
                                            <div class="td-content customer-name">
                                                <?= date('d F Y', strtotime($Data_transaksi->tgl_transaksi)) ?></div>
                                        </td>
                                        <td>
                                            <div class="td-content product-brand text-primary">
                                                <?= $Data_transaksi->nm_jasa ?></div>
                                        </td>
                                        <td>
                                            <div class="td-content product-invoice">
                                                #<?= $Data_transaksi->nm_jasa ?>id_transaksi</div>
                                        </td>
                                        <td>
                                            <div class="td-content pricing"><span
                                                    class=""><?= $Data_transaksi->jml_bayar ?></span></div>
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
<script>
setTimeout(function() {
    $('#data_berhasil').hide()
}, 3000);
</script>