<?php $this->load->view('HalamanUtama/head') ?>

<body>
    <?php $this->load->view('HalamanUtama/navbar') ?>

    <section class="py-5 p-list-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 view_slider recommended">
                    <div class="row">
                        <?php
                        foreach ($data_produk as $Data_jasa) : ?>
                            <div class="col-md-4">
                                <a href="<?= base_url('produk/detail/' . $Data_jasa->kd_jasa) ?>">
                                    <img class="img-fluid" src="<?= base_url('assets/portfolio/' . $Data_jasa->foto_portfolio . '') ?>" />
                                </a>
                                <div class="inner-slider">
                                    <div class="inner-wrapper">
                                        <div class="d-flex align-items-center">
                                            <span class="seller-image">
                                                <img class="img-fluid" src="<?= base_url('assets/profile/' . $Data_jasa->profile) ?>" alt='' />
                                            </span>
                                            <span class="seller-name">
                                                <a href="<?= base_url('produk/detail/' . $Data_jasa->kd_jasa) ?>"><?= $Data_jasa->nm_lengkap ?></a>
                                            </span>
                                        </div>
                                        <h3>
                                            <?php
                                            $num_char = 30;
                                            $text = $Data_jasa->nm_jasa;
                                            echo substr($text, 0, $num_char) . '...';
                                            ?>
                                        </h3>
                                        <div class="footer">
                                            <div class="price">
                                                <a href="<?= base_url('produk/detail/' . $Data_jasa->kd_jasa) ?>">
                                                    Rp <span><?= $Data_jasa->harga ?>,-</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('HalamanUtama/footer') ?>

</body>

<!-- Mirrored from askbootstrap.com/preview/miver/product2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Feb 2022 03:46:20 GMT -->

</html>