<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <?= $this->session->flashdata('berhasil_update'); ?>
                    <table id="zero-config" class="table dt-table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th style="text-align: center; font-weight: bold">No</th>
                                <th style="text-align: center; font-weight: bold">Tanggal</th>
                                <th style="text-align: center; font-weight: bold">Nama</th>
                                <th style="text-align: center; font-weight: bold">Nominal</th>
                                <th class="no-content" style="text-align: center; font-weight: bold">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_wd as $WD) : ?>
                            <tr>
                                <td class="text-center"><?= $no ?></td>
                                <td><?= date('d F Y', strtotime($WD->tgl_wd)) ?></td>
                                <td><?= $WD->id_user ?> - <?= $WD->nm_lengkap ?></td>
                                <td class="text-right">Rp <?= $WD->nominal ?>,-</td>
                                <td class="text-center">
                                    <?php if ($WD->WD_STATUS == 'BERHASIL') : ?>
                                    <span class="badge outline-badge-success">SELESAI</span>
                                    <?php elseif ($WD->WD_STATUS == 'GAGAL') : ?>
                                    <span class="badge outline-badge-danger">GAGAL</span>
                                    <?php else : ?>
                                    <a id="detail_wd" href="javascript:void(0);" class="bs-tooltip" data-toggle="modal"
                                        data-target="#wd_detail" data-placement="top" title=""
                                        data-original-title="Detail"
                                        <?php foreach ($data_freelance as $Data_freelance) :
                                                                                                                                                                                                                        if ($WD->id_user == $Data_freelance->id_user) : ?>
                                        data-id_user="<?= $Data_freelance->id_user ?>"
                                        data-nm_bank="<?= $Data_freelance->nm_bank ?> - <?= $Data_freelance->cabang ?>"
                                        data-cabang="<?= $Data_freelance->cabang ?>"
                                        data-no_rek="<?= $Data_freelance->no_rek ?>"
                                        data-an_bank="<?= $Data_freelance->an_bank ?>"
                                        <?php endif;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            endforeach ?>
                                        data-nominal="<?= $WD->nominal ?>" data-id_wd="<?= $WD->id_wd ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                    </a>
                                    <?php endif; ?>
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
<?php $this->load->view('Cs/bendahara/withdraw/detail_data') ?>
<script>
setTimeout(function() {
    $('#berhasil_update').hide()
}, 3000);
</script>