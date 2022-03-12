<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="account-settings-container layout-top-spacing">
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll"
                    data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h6 class="">Data <?= $detail_customer['nm_lengkap'] ?></h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" id="input-file-max-fs" name="foto_baru"
                                                        class="dropify"
                                                        data-default-file="<?= base_url('assets/profile/' . $detail_customer['profile']) ?>"
                                                        data-max-file-size="10M" />
                                                    <input type="text" id="foto_lama" name="foto_lama" hidden
                                                        value="<?= $detail_customer['profile'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control mb-4" id="email"
                                                            readonly placeholder="Masukkan Email Anda"
                                                            value="<?= $detail_customer['email'] ?>">
                                                        <input type="text" id="id_user" name="id_user" hidden
                                                            value="<?= $detail_customer['id_user'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">Nomor HP</label>
                                                        <?php if ($detail_customer['no_hp'] > 0) : ?>
                                                        <input type="text" class="form-control mb-4" readonly id="no_hp"
                                                            readonly placeholder="Masukkan Email Anda"
                                                            value="<?= $detail_customer['no_hp'] ?>">
                                                        <?php else : ?>
                                                        <input type="text" class="form-control mb-4" readonly id="no_hp"
                                                            placeholder="Masukkan Nomor HP Anda">
                                                        <?php endif;
                                                        ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="nm_lengkap">Nama Lengkap</label>
                                                                <input type="text" readonly class="form-control mb-4"
                                                                    id="nm_lengkap"
                                                                    placeholder="Masukkan Nama Lengkap Anda"
                                                                    value="<?= $detail_customer['nm_lengkap'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="dob-input">Tanggal Lahir</label>
                                                            <div class="d-sm-flex d-block">
                                                                <div class="form-group mr-1">
                                                                    <select readonly class="form-control"
                                                                        id="exampleFormControlSelect1" name="hari">
                                                                        <option>Day</option>
                                                                        <option value="1" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 1) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>1</option>
                                                                        <option value="2" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 2) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>2</option>
                                                                        <option value="3" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 3) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>3</option>
                                                                        <option value="4" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 4) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>4</option>
                                                                        <option value="5" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 5) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>5</option>
                                                                        <option value="6" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 6) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>6</option>
                                                                        <option value="7" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 7) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>7</option>
                                                                        <option value="8" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 8) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>8</option>
                                                                        <option value="9" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 9) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>9</option>
                                                                        <option value="10" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 10) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>10</option>
                                                                        <option value="11" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 11) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>11</option>
                                                                        <option value="12" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 12) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>12</option>
                                                                        <option value="13" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 13) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>13</option>
                                                                        <option value="14" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 14) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>14</option>
                                                                        <option value="15" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 15) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>15</option>
                                                                        <option value="16" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 16) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>16</option>
                                                                        <option value="17" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 17) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>17</option>
                                                                        <option value="18" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 18) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>18</option>
                                                                        <option value="19" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 19) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>19</option>
                                                                        <option value="20" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 20) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>20</option>
                                                                        <option value="21" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 21) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>21</option>
                                                                        <option value="22" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 22) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>22</option>
                                                                        <option value="23" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 23) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>23</option>
                                                                        <option value="24" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 24) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>24</option>
                                                                        <option value="25" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 25) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>25</option>
                                                                        <option value="26" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 26) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>26</option>
                                                                        <option value="27" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 27) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>27</option>
                                                                        <option value="28" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 28) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>28</option>
                                                                        <option value="29" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 29) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>29</option>
                                                                        <option value="30" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 30) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>30</option>
                                                                        <option value="31" <?php
                                                                                            $tgl_lahir = date('d', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 31) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>31</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mr-1">
                                                                    <select readonly class="form-control" id="month">
                                                                        <option>Bulan Lahir</option>
                                                                        <option value="01" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 01) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Jan</option>
                                                                        <option value="02" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 02) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Feb</option>
                                                                        <option value="03" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 03) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Mar</option>
                                                                        <option value="04" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 04) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Apr</option>
                                                                        <option value="05" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 05) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>May</option>
                                                                        <option value="06" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 06) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Jun</option>
                                                                        <option value="07" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == 07) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Jul</option>
                                                                        <option value="08" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == '08') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Aug</option>
                                                                        <option value="09" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == '09') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Sep</option>
                                                                        <option value="10" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == '10') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Oct</option>
                                                                        <option value="11" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == '11') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Nov</option>
                                                                        <option value="12" <?php
                                                                                            $tgl_lahir = date('m', strtotime($detail_customer['tgl_lahir']));
                                                                                            if ($tgl_lahir == '12') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Dec</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mr-1">
                                                                    <select readonly class="form-control" id="year">
                                                                        <?php if ($detail_customer['tgl_lahir'] == null) :
                                                                            # code...
                                                                            echo "<option selected=”selected”>Tahun</option>";
                                                                        else :
                                                                            echo "<option selected=”selected” value=" . date('Y', strtotime($detail_customer['tgl_lahir'])) . ">" . date('Y', strtotime($detail_customer['tgl_lahir'])) . "</option>";
                                                                        endif; ?>
                                                                        <?php
                                                                        for ($i = date('Y') - 17; $i >= date('Y') - 50; $i -= 1) {
                                                                            echo "<option value=’$i’> $i </option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="nm_lengkap">Jenis detail_customer</label>
                                                                <select readonly class="form-control" id="month">
                                                                    <option value="<?= $detail_customer['jid'] ?>"> <?php
                                                                                                                    if ($detail_customer['jid'] == "KTP") :
                                                                                                                        echo 'Kartu Tanda Penduduk';
                                                                                                                    elseif ($detail_customer['jid'] == "SIM") :
                                                                                                                        echo 'Surat Izin Mengemudi';
                                                                                                                    elseif ($detail_customer['jid'] == "KITAS") :
                                                                                                                        echo 'Kartu Ijin Tinggal Terbatas';
                                                                                                                    elseif ($detail_customer['jid'] == "PASPOR") :
                                                                                                                        echo 'Paspor';
                                                                                                                    else :
                                                                                                                        echo 'Pilih detail_customer';
                                                                                                                    endif;
                                                                                                                    ?>
                                                                    </option>
                                                                    <option value="KTP">Kartu Tanda Penduduk</option>
                                                                    <option value="SIM">Surat Izin Mengemudi</option>
                                                                    <option value="KITAS">Kartu Ijin Tinggal Terbatas
                                                                    </option>
                                                                    <option value="PASPOR">Paspor</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="nm_lengkap">Nomor detail_customer</label>
                                                                <input type="text" readonly class="form-control mb-4"
                                                                    id="no_id" placeholder="Masukkan Nama Lengkap Anda"
                                                                    value="<?= $detail_customer['no_id'] ?>">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat Lengkap</label>
                                                        <textarea name="alamat" readonly id="alamat" cols="30" rows="3"
                                                            class="form-control mb-4"><?= $detail_customer['alamat'] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">Jenis Kelamin</label>
                                                        <select readonly class="form-control" id="kelamin"
                                                            name="kelamin">
                                                            <option value="<?= $detail_customer['j_kelamin'] ?>"> <?php
                                                                                                                    if ($detail_customer['j_kelamin'] == 1) :
                                                                                                                        echo 'Laki-laki';
                                                                                                                    else :
                                                                                                                        echo 'Perempuan';
                                                                                                                    endif;
                                                                                                                    ?>
                                                            </option>
                                                            <option value="0">Perempuan</option>
                                                            <option value="1">Laki-laki</option>
                                                        </select>
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
            </div>
        </div>
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <?= $this->session->flashdata('data_berhasil'); ?>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-weight: bold">No</th>
                                <th style="text-align: center; font-weight: bold">Kode Transaksi</th>
                                <th style="text-align: center; font-weight: bold">Tanggal Transaksi</th>
                                <th style="text-align: center; font-weight: bold">Harga</th>
                                <th style="text-align: center; font-weight: bold">Keterangan</th>
                                <th class="no-content" style="text-align: center; font-weight: bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_transaksi as $Data_transaksi) : ?>
                            <tr>
                                <td class="text-center"><?= $no ?></td>
                                <td class="text-center"><?= $Data_transaksi->id_transaksi ?></td>
                                <td class="text-center"><?= date('d F Y', strtotime($Data_transaksi->tgl_transaksi)) ?>
                                </td>
                                <td class="text-center"><?= $Data_transaksi->jml_bayar ?></td>
                                <td class="text-center"><?= $Data_transaksi->ket_tambahan ?></td>
                                <td class="text-center">
                                    <a id="detail_order"
                                        href="<?= base_url('admin/transaksi/invoice/' . $Data_transaksi->id_transaksi) ?>"
                                        class="bs-tooltip" data-target="#order_detail" data-placement="top" title=""
                                        data-original-title="Invoice">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-inbox">
                                            <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                            <path
                                                d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z">
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