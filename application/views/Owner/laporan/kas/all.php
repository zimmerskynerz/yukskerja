<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LAPORAN TRANSAKSI YUKSKERJA.COM</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css" rel="nofollow">
    <style>
    @page {
        size: A4
    }

    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th {
        padding: 8px 8px;
        border: 1px solid #000000;
        text-align: center;
    }

    .table td {
        padding: 3px 3px;
        border: 1px solid #000000;
    }

    .text-center {
        text-align: center;
    }
    </style>
</head>

<body class="A4">
    <section class="sheet padding-10mm">
        <h1>LAPORAN KAS YUKSKERJA.COM</h1>
        <center>
            <p>Jl. Sumber - Bulusan, No.69, RT.05/RW.05, Ds. Hadipolo
                <br>Kec. Jekulo, Kab. Kudus - Jawa Tengah. Kode Pos : 59382
            </p>
        </center>
        <p>================================================================================</p>
        <table>
            <tr>
                <th align="left">Jumlah Pemasukan</th>
                <th>:</th>
                <th>Rp <?= $jumlah_pemasukan['jumlah_pemasukan'] ?>,-</th>
            </tr>
            <tr>
                <th align="left">Jumlah Pengeluaran</th>
                <th>:</th>
                <th>Rp <?= $jumlah_pengeluaran['jumlah_pengeluaran'] ?>,-</th>
            </tr>
            <tr>
                <th align="left">Total Saldo</th>
                <th>:</th>
                <th>Rp <?= $saldo ?>,-</th>
            </tr>
        </table>
        <br>
        <p>================================================================================</p>
        <table class="table">
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
        <p>================================================================================</p>
        <table>
            <tr>
                <th></th>
                <th></th>
                <th>Kudus, 23 Febuari 2022</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <br>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th>Lukito Prayogo</th>
            </tr>
        </table>
    </section>
</body>
<script>
window.print();
</script>

</html>