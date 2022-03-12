<?php $this->load->view('HalamanUtama/head') ?>

<?php $this->load->view('HalamanUtama/navbar') ?>

<div class="main-page py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 left">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Produk</li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $kd_jasa ?></li>
                    </ol>
                </nav>
                <h2><?= $data_produk['nm_jasa'] ?></h2>
                <div class="slider mt-4">
                    <div id="aniimated-thumbnials" class="slider-for slick-slider-single">
                        <a href="<?= base_url('assets/') ?>portfolio/<?= $data_produk['foto_portfolio'] ?>">
                            <img class="img-fluid"
                                src="<?= base_url('assets/') ?>portfolio/<?= $data_produk['foto_portfolio'] ?>" />
                        </a>
                    </div>
                </div>
                <div id="description" class="description">
                    <h3>Deskripsi</h3>
                    <p><?= html_entity_decode($data_produk['ket_jasa']) ?></p>
                    <h3>Alur Kerja</h3>
                    <p><?= html_entity_decode($data_produk['ketentuan']) ?></p>
                </div>
                <div class="profile-card">
                    <div class="user-profile-image d-flex">
                        <label class="profile-pict" for="profile_image">
                            <img src="<?= base_url('assets/profile/' . $data_produk['profile']) ?>"
                                class="profile-pict-img img-fluid" alt="">
                        </label>
                        <div class="right">
                            <div class="profile-name">
                                <span class="user-status">
                                    <a href="<?= base_url('freelancer/' . $data_produk['id_user']) ?>"
                                        class="seller-link"><?= $data_produk['nm_lengkap'] ?></a>
                                </span>
                                <div class="seller-level"><?= date('d F Y', strtotime($data_produk['tgl_gabung'])) ?>
                                </div>
                            </div>
                            <div class="user-info">
                                <a href="mailto:<?= $data_produk['email'] ?>">Contact Me</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="reviews" class="review-section">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="m-0"> Reviews <?php
                                                    if ($jml_review > 0) :
                                                        echo '( ' . $jml_review . ' )';
                                                    else :
                                                        echo '( 0 )';
                                                    endif;
                                                    ?></h4>
                    </div>
                </div>
                <div class="review-list">
                    <ul>
                        <?php foreach ($data_review as $Data_review) : ?>
                        <li>
                            <div class="d-flex">
                                <div class="left">
                                    <span>
                                        <img src="<?= base_url('assets/') ?>images/user/s5.png"
                                            class="profile-pict-img img-fluid" alt="">
                                    </span>
                                </div>
                                <div class="right">
                                    <h4>
                                        <?= $Data_review->nm_lengkap ?>
                                    </h4>
                                    <div class="review-description">
                                        <p>
                                            <?= $Data_review->komentar ?>
                                        </p>
                                    </div>
                                    <span class="publish py-3 d-inline-block w-100">Published
                                        <?= date('d F Y', strtotime($Data_review->tgl_review)) ?></span>
                                </div>
                            </div>
                        </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 right">
                <div class="sticky">
                    <div class="tab-content">
                        <div id="basic" class="tab-pane fade show active">
                            <div class="header">
                                <h3><b class="title">Harga Jasa</b><span class="price">Rp
                                        <?= $data_produk['harga'] ?>,-</span></h3>
                                <p><?= $data_produk['nm_jasa'] ?>
                                </p>
                            </div>
                            <?php
                            if ($data_identitas > 0) :
                                if ($data_identitas['level'] == 'CUSTOMER') : ?>
                            <form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
                                <?= $this->session->flashdata('email_sudah'); ?>
                                <div class="form" id="payment-form">
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                        value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                    <div id="email-field" class="field-wrapper input">
                                        <input id="kd_jasa" name="kd_jasa" type="text"
                                            value="<?= $data_produk['kd_jasa'] ?>" hidden class="form-control"
                                            placeholder="Masukkan Nama Lengkap Anda">
                                        <input id="nm_lengkap" name="nm_lengkap" type="text"
                                            value="<?= $data_identitas['nm_lengkap'] ?>" hidden class="form-control"
                                            placeholder="Masukkan Nama Lengkap Anda">
                                        <input id="email" name="email" type="text"
                                            value="<?= $data_identitas['email'] ?>" hidden class="form-control"
                                            placeholder="Masukkan Nama Lengkap Anda">
                                        <input id="id_user" name="id_user" type="text"
                                            value="<?= $data_identitas['id_user'] ?>" hidden class="form-control"
                                            placeholder="Masukkan Nama Lengkap Anda">
                                        <input id="nm_jasa" name="nm_jasa" type="text"
                                            value="<?= $data_produk['nm_jasa'] ?>" hidden class="form-control"
                                            placeholder="Masukkan Nama Lengkap Anda">
                                        <input id="harga" name="harga" type="text" value="<?= $data_produk['harga'] ?>"
                                            hidden class="form-control" placeholder="Masukkan Nama Lengkap Anda">
                                        <textarea id="ket_sewa" name="ket_sewa" required type="text"
                                            class="form-control"
                                            placeholder="Masukkan Pesan Keterangan Jasa Anda"></textarea><br>
                                        <input type="text" name="result_type" id="result-type" style="display: none;">
                                        <input type="text" name="result_data" id="result-data" style="display: none;">
                                    </div>
                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper">
                                            <button id="pay-button">Sewa</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php
                                endif;
                            else : ?>
                            <a href="<?= base_url('login') ?>">
                                <button>Sewa Jasa</button>
                            </a>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#pay-button').click(function(event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
    var kd_jasa = $("#kd_jasa").val();
    var nm_jasa = $("#nm_jasa").val();
    var harga = $("#harga").val();
    var nm_lengkap = $("#nm_lengkap").val();
    var email = $("#email").val();
    var ket_sewa = $("#ket_sewa").val();
    $.ajax({
        url: '<?= site_url() ?>snap/token',
        type: 'POST',
        data: {
            kd_jasa: kd_jasa,
            nm_jasa: nm_jasa,
            harga: harga,
            nm_lengkap: nm_lengkap,
            email: email,
            ket_sewa: ket_sewa
        },
        cache: false,

        success: function(data) {
            //location = data;

            console.log('token = ' + data);

            var resultType = document.getElementById('result-type');
            var resultData = document.getElementById('result-data');

            function changeResult(type, data) {
                $("#result-type").val(type);
                $("#result-data").val(JSON.stringify(data));
                //resultType.innerHTML = type;
                //resultData.innerHTML = JSON.stringify(data);
            }

            snap.pay(data, {

                onSuccess: function(result) {
                    changeResult('success', result);
                    console.log(result.status_message);
                    console.log(result);
                    $("#payment-form").submit();
                },
                onPending: function(result) {
                    changeResult('pending', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                },
                onError: function(result) {
                    changeResult('error', result);
                    console.log(result.status_message);
                    $("#payment-form").submit();
                }
            });
        }
    });
});
</script>
<script>
setTimeout(function() {
    $('#email_sudah').hide()
}, 3000);
</script>
<?php $this->load->view('HalamanUtama/footer') ?>

</html>