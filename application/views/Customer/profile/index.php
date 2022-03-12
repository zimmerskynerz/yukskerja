<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            <div class="info">
                                <h6 class="">Identitas Customer</h6>
                                <?= $this->session->flashdata('gagal_simpan'); ?>
                                <?= $this->session->flashdata('berhasil_simpan'); ?>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" id="input-file-max-fs" name="foto_baru" class="dropify" data-default-file="<?= base_url('assets/profile/' . $identitas['profile']) ?>" data-max-file-size="10M" />
                                                    <input type="text" id="foto_lama" name="foto_lama" hidden value="<?= $identitas['profile'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control mb-4" id="email" readonly placeholder="Masukkan Email Anda" value="<?= $identitas['email'] ?>">
                                                        <input type="text" id="id_user" name="id_user" hidden value="<?= $identitas['id_user'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">Nomor HP</label>
                                                        <?php if ($identitas['no_hp'] > 0) : ?>
                                                            <input type="text" class="form-control mb-4" id="no_hp" readonly placeholder="Masukkan Email Anda" value="<?= $identitas['no_hp'] ?>">
                                                        <?php else : ?>
                                                            <input type="text" class="form-control mb-4" id="no_hp" placeholder="Masukkan Nomor HP Anda">
                                                        <?php endif;
                                                        ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="nm_lengkap">Nama Lengkap</label>
                                                                <input type="text" class="form-control mb-4" id="nm_lengkap" placeholder="Masukkan Nama Lengkap Anda" value="<?= $identitas['nm_lengkap'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label class="dob-input">Tanggal Lahir</label>
                                                            <div class="d-sm-flex d-block">
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control" id="exampleFormControlSelect1" name="hari">
                                                                        <option>Day</option>
                                                                        <option value="1" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 1) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>1</option>
                                                                        <option value="2" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 2) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>2</option>
                                                                        <option value="3" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 3) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>3</option>
                                                                        <option value="4" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 4) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>4</option>
                                                                        <option value="5" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 5) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>5</option>
                                                                        <option value="6" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 6) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>6</option>
                                                                        <option value="7" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 7) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>7</option>
                                                                        <option value="8" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 8) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>8</option>
                                                                        <option value="9" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 9) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>9</option>
                                                                        <option value="10" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 10) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>10</option>
                                                                        <option value="11" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 11) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>11</option>
                                                                        <option value="12" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 12) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>12</option>
                                                                        <option value="13" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 13) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>13</option>
                                                                        <option value="14" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 14) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>14</option>
                                                                        <option value="15" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 15) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>15</option>
                                                                        <option value="16" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 16) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>16</option>
                                                                        <option value="17" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 17) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>17</option>
                                                                        <option value="18" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 18) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>18</option>
                                                                        <option value="19" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 19) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>19</option>
                                                                        <option value="20" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 20) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>20</option>
                                                                        <option value="21" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 21) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>21</option>
                                                                        <option value="22" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 22) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>22</option>
                                                                        <option value="23" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 23) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>23</option>
                                                                        <option value="24" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 24) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>24</option>
                                                                        <option value="25" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 25) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>25</option>
                                                                        <option value="26" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 26) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>26</option>
                                                                        <option value="27" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 27) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>27</option>
                                                                        <option value="28" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 28) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>28</option>
                                                                        <option value="29" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 29) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>29</option>
                                                                        <option value="30" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 30) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>30</option>
                                                                        <option value="31" <?php
                                                                                            $tgl_lahir = date('d', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 31) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>31</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control" id="month">
                                                                        <option>Bulan Lahir</option>
                                                                        <option value="01" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 01) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Jan</option>
                                                                        <option value="02" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 02) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Feb</option>
                                                                        <option value="03" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 03) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Mar</option>
                                                                        <option value="04" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 04) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Apr</option>
                                                                        <option value="05" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 05) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>May</option>
                                                                        <option value="06" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 06) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Jun</option>
                                                                        <option value="07" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == 07) :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Jul</option>
                                                                        <option value="08" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == '08') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Aug</option>
                                                                        <option value="09" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == '09') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Sep</option>
                                                                        <option value="10" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == '10') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Oct</option>
                                                                        <option value="11" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == '11') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Nov</option>
                                                                        <option value="12" <?php
                                                                                            $tgl_lahir = date('m', strtotime($identitas['tgl_lahir']));
                                                                                            if ($tgl_lahir == '12') :
                                                                                                echo 'selected';
                                                                                            endif;
                                                                                            ?>>Dec</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mr-1">
                                                                    <select class="form-control" id="year">
                                                                        <?php if ($identitas['tgl_lahir'] == null) :
                                                                            # code...
                                                                            echo "<option selected=”selected”>Tahun</option>";
                                                                        else :
                                                                            echo "<option selected=”selected” value=" . date('Y', strtotime($identitas['tgl_lahir'])) . ">" . date('Y', strtotime($identitas['tgl_lahir'])) . "</option>";
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
                                                                <label for="nm_lengkap">Jenis Identitas</label>
                                                                <select class="form-control" id="month">
                                                                    <option value="<?= $identitas['jid'] ?>"> <?php
                                                                                                                if ($identitas['jid'] == "KTP") :
                                                                                                                    echo 'Kartu Tanda Penduduk';
                                                                                                                elseif ($identitas['jid'] == "SIM") :
                                                                                                                    echo 'Surat Izin Mengemudi';
                                                                                                                elseif ($identitas['jid'] == "KITAS") :
                                                                                                                    echo 'Kartu Ijin Tinggal Terbatas';
                                                                                                                elseif ($identitas['jid'] == "PASPOR") :
                                                                                                                    echo 'Paspor';
                                                                                                                else :
                                                                                                                    echo 'Pilih Identitas';
                                                                                                                endif;
                                                                                                                ?></option>
                                                                    <option value="KTP">Kartu Tanda Penduduk</option>
                                                                    <option value="SIM">Surat Izin Mengemudi</option>
                                                                    <option value="KITAS">Kartu Ijin Tinggal Terbatas</option>
                                                                    <option value="PASPOR">Paspor</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="nm_lengkap">Nomor Identitas</label>
                                                                <input type="text" class="form-control mb-4" id="no_id" placeholder="Masukkan Nama Lengkap Anda" value="<?= $identitas['no_id'] ?>">

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat Lengkap</label>
                                                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control mb-4"><?= $identitas['alamat'] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="no_hp">Jenis Kelamin</label>
                                                        <select class="form-control" id="kelamin" name="kelamin">
                                                            <option value="<?= $identitas['j_kelamin'] ?>"> <?php
                                                                                                            if ($identitas['j_kelamin'] == 1) :
                                                                                                                echo 'Laki-laki';
                                                                                                            else :
                                                                                                                echo 'Perempuan';
                                                                                                            endif;
                                                                                                            ?></option>
                                                            <option value="0">Perempuan</option>
                                                            <option value="1">Laki-laki</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 text-right mb-5">
                                                        <button type="button" class="btn btn-secondary mb-1" style="margin-top: 14px; margin-left: 14px;" data-toggle="modal" data-target="#ubahEmail" id="#ubahEmailBaru">Ubah Email</button>
                                                        <button type="button" class="btn btn-danger mb-1" style="margin-top: 14px; margin-left: 14px;" data-toggle="modal" data-target="#ubahPass" id="#ubahPassBaru">Ubah Password</button>
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
    </div>
    <?php $this->load->view('Customer/profile/ubahemail') ?>
    <?php $this->load->view('Customer/profile/ubahpassword') ?>
    <script>
        setTimeout(function() {
            $('#gagal_simpan').hide()
        }, 3000);
        setTimeout(function() {
            $('#berhasil_simpan').hide()
        }, 3000);
    </script>