<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div style="padding-left: 15px; padding-top: 15px;">
                        <h2><b>Data Customer</b></h2>
                    </div>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-weight: bold">No</th>
                                <th style="text-align: center; font-weight: bold">Profile</th>
                                <th style="text-align: center; font-weight: bold">Nama</th>
                                <th style="text-align: center; font-weight: bold">Email</th>
                                <th style="text-align: center; font-weight: bold">No HP</th>
                                <th style="text-align: center; font-weight: bold">Gabung</th>
                                <th style="text-align: center; font-weight: bold">Status</th>
                                <th style="text-align: center; font-weight: bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_customer as $Data_customer) : ?>
                            <tr>
                                <td class="text-center"><?= $no ?></td>
                                <td class="text-center">
                                    <center>
                                        <img src="<?= base_url('assets/profile/' . $Data_customer->profile) ?>"
                                            style="width: 48px;"></img>
                                    </center>
                                </td>
                                <td>
                                    <?= $Data_customer->nm_lengkap ?>
                                </td>
                                <td><?= $Data_customer->email ?></td>
                                <td>
                                    <center>
                                        <?= $Data_customer->no_hp ?><br><?php
                                                                            if ($Data_customer->j_kelamin == 0) :
                                                                                echo '<span class="badge outline-badge-success">Perempuan</span>';
                                                                            else :
                                                                                echo '<span class="badge outline-badge-primary">Laki-laki</span>';
                                                                            endif; ?>
                                    </center>
                                </td>
                                <td class="text-center"><?= date('d F Y', strtotime($Data_customer->tgl_gabung)) ?></td>
                                <td>
                                    <center>
                                        <?php
                                            if ($Data_customer->status_login == 'AKTIF') :
                                                echo '<span class="badge outline-badge-success">Aktive</span>';
                                            else :
                                                echo '<span class="badge outline-badge-danger">Resign/Offline</span>';
                                            endif; ?>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <a href="<?= base_url('owner/users/customer/detail/' . $Data_customer->id_user) ?>"
                                            class="bs-tooltip" data-placement="top" title=""
                                            data-original-title="Detail">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-external-link">
                                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6">
                                                </path>
                                                <polyline points="15 3 21 3 21 9"></polyline>
                                                <line x1="10" y1="14" x2="21" y2="3"></line>
                                            </svg>
                                        </a>
                                    </center>
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