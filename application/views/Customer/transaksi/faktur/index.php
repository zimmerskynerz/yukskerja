<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>YUKSKERJA.COM Faktur</title>
    <link rel="stylesheet" href="<?= base_url('assets/invoice_form/') ?>css/style.css">
</head>

<body>
    <html lang="en">

    <!-- <head>
        <meta charset='UTF-8'>
        <title>Editable Invoice</title>
    </head> -->

    <body>
        <div id="page-wrap">
            <textarea id="header">INVOICE</textarea>
            <div id="identity">
                <p id="address">
                    <?= $data_login['nm_lengkap'] ?><br>
                    <?= $data_login['email'] ?>
                </p>
                <div id="logo">
                    <img id="image" style="height:50px" src="<?= base_url('assets') ?>/img/yk.png" alt="logo" /><br>
                    <a href="https://yukskerja.com">YUKSKERJA.COM</a>
                </div>
            </div>
            <div style="clear:both"></div>
            <div id="customer">
                <p id="customer-title">MARKETPLACE FREELANCER INDONESIA<br>YUKSKERJA.COM</p>
                <table id="meta">
                    <tr>
                        <td class="meta-head">Invoice #</td>
                        <td>
                            <p><?= $data_transaksi['id_transaksi'] ?></p>
                        </td>
                    </tr>
                    <tr>

                        <td class="meta-head">Transaksi</td>
                        <td>
                            <p id="date"><?= date('d F Y', strtotime($data_transaksi['tgl_mulai'])) ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="meta-head">Total</td>
                        <td>
                            <div class="due">Rp<?php
                                                if ($data_transaksi['gaji'] > 0) :
                                                    echo $data_transaksi['gaji'];
                                                else :
                                                    echo $data_transaksi['harga'];
                                                endif;
                                                ?></div>
                        </td>
                    </tr>

                </table>
            </div>
            <table id="items">

                <tr>
                    <th>Kode Item</th>
                    <th>Nama Item</th>
                    <th>Description</th>
                    <th>Freelancer</th>
                </tr>

                <tr class="item-row">
                    <td class="item-name">
                        <?= $data_transaksi['kd_jasa'] ?>
                    </td>
                    <td class="description">
                        <p><?= $data_transaksi['nm_jasa'] ?></p>
                    </td>
                    <td>
                        <p><?= $data_transaksi['ket_tambahan'] ?></p>
                    </td>
                    <td><span class="description">
                            <?= $data_transaksi['nm_lengkap'] ?>
                    </td>
                </tr>
            </table>
            <br><br><br><br>
            <div id="terms">
                <h5>Terimakasih Sudah Menggunakan Aplikasi</h5>
                <h3>YUKSKERJA.COM</h3>
            </div>
        </div>
    </body>

    </html>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="<?= base_url('assets/invoice_form/') ?>js/index.js"></script>
</body>

</html>