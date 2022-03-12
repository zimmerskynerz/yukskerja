<?php $this->load->view('HalamanUtama/head') ?>

<body>
    <?php $this->load->view('HalamanUtama/navbar') ?>
    <section class="py-5 homepage-search-block text-center homepage-search-block-2 bg-dark position-relative">
        <div class="container">
            <div class="row py-lg-5">
                <div class="col-lg-8 mx-auto">
                    <div class="homepage-search-title">
                        <h1 class="mb-3 text-shadow text-white font-weight-bold">Menyediakan Banyak Pekerja Lepas
                            Professional Di Bidangnya</h1>
                        <h5 class="mb-5 text-shadow text-white-50 font-weight-normal">Siap Mengubah Ide Anda Menjadi
                            Kenyataan.
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <ul class="trusted-by">
        <li><img src="<?= base_url('assets/') ?>images/facebook.png"></li>
        <li><img src="<?= base_url('assets/') ?>images/google.png"></li>
        <li><img src="<?= base_url('assets/') ?>images/mit.png"></li>
        <li><img src="<?= base_url('assets/') ?>images/netflix.png"></li>
        <li><img src="<?= base_url('assets/') ?>images/paypal.png"></li>
        <li><img src="<?= base_url('assets/') ?>images/intuit.png"></li>
        <li><img src="<?= base_url('assets/') ?>images/facebook.png"></li>
    </ul>


    <div class="services-wrapper bg-white py-5">
        <div class="container">
            <h2>Freelancer Populer</h2>
            <div class="row service-slider">
                <?php foreach ($data_jasa as $Data_jasa) : ?>
                <div class="col">
                    <a href="<?= base_url('produk/detail/' . $Data_jasa->kd_jasa) ?>">
                        <div class="service">
                            <img style="width: 250;"
                                src="<?= base_url('assets/') ?>portfolio/<?= $Data_jasa->foto_portfolio ?>">
                            <h3><span><?= $Data_jasa->nm_lengkap ?></span> <?= $Data_jasa->nm_kategori ?></h3>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="about-section py-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Kenapa Harus Yuks Kerja?
                    </h2>
                    <ul>
                        <li><span><img src="<?= base_url('assets/') ?>images/checkmark.svg"> Jaminan Kerja</span>
                            Uang Anda akan kami lindungi, dan Freelancer akan mulai bekerja mengerjakan project Anda.
                        </li>
                        <li><span><img src="<?= base_url('assets/') ?>images/checkmark.svg"> TOP Freelance
                            </span>Freelancer telah melalui seleksi dan proses verifikasi dari Fastwork.
                        </li>
                        <li><span><img src="<?= base_url('assets/') ?>images/checkmark.svg"> Customer Service</span>
                            Jaminan layanan customer service 24jam dalam 7 hari untuk memenuhi kebutuhan anda.
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url('assets/') ?>images/video.svg" class="video-img w-100">
                </div>
            </div>
        </div>
    </div>

    <div class="market-wrapper py-5 bg-white">
        <div class="container">
            <h2 class="text-center">Kategori Freelance Market</h2>
            <ul class="categories-list mb-0">
                <li>
                    <a href="<?php foreach ($data_kategori as $Data_kategori) :
                                    $kategori = $Data_kategori->nm_kategori;
                                    $text = str_replace(' ', '-', $kategori);
                                    $link_asli = strtolower($text);
                                    if ($Data_kategori->nm_kategori == 'Design Grafis') :
                                        echo base_url('kategori/' . $link_asli);
                                    endif;
                                endforeach; ?>">
                        <img src="<?= base_url('assets/') ?>images/graphics.svg" alt="" loading="lazy">Graphics &amp;
                        Design
                    </a>
                </li>
                <li>
                    <a href="<?php foreach ($data_kategori as $Data_kategori) :
                                    $kategori = $Data_kategori->nm_kategori;
                                    $text = str_replace(' ', '-', $kategori);
                                    $link_asli = strtolower($text);
                                    if ($Data_kategori->nm_kategori == 'Digital Marketing') :
                                        echo base_url('kategori/' . $link_asli);
                                    endif;
                                endforeach; ?>">
                        <img src="<?= base_url('assets/') ?>images/online-marketing.svg" alt="Digital Marketing"
                            loading="lazy">Digital Marketing
                    </a>
                </li>
                <li>
                    <a href="<?php foreach ($data_kategori as $Data_kategori) :
                                    $kategori = $Data_kategori->nm_kategori;
                                    $text = str_replace(' ', '-', $kategori);
                                    $link_asli = strtolower($text);
                                    if ($Data_kategori->nm_kategori == 'Writing Translation') :
                                        echo base_url('kategori/' . $link_asli);
                                    endif;
                                endforeach; ?>">
                        <img src="<?= base_url('assets/') ?>images/writing-translation.svg"
                            alt="Writing &amp; Translation" loading="lazy">Writing &amp; Translation
                    </a>
                </li>
                <li>
                    <a href="<?php foreach ($data_kategori as $Data_kategori) :
                                    $kategori = $Data_kategori->nm_kategori;
                                    $text = str_replace(' ', '-', $kategori);
                                    $link_asli = strtolower($text);
                                    if ($Data_kategori->nm_kategori == 'Vidio Editing Animasi') :
                                        echo base_url('kategori/' . $link_asli);
                                    endif;
                                endforeach; ?>">
                        <img src="<?= base_url('assets/') ?>images/video-animation.svg" alt="Video &amp; Animation"
                            loading="lazy">Video &amp; Animation
                    </a>
                </li>
                <li>
                    <a href="<?php foreach ($data_kategori as $Data_kategori) :
                                    $kategori = $Data_kategori->nm_kategori;
                                    $text = str_replace(' ', '-', $kategori);
                                    $link_asli = strtolower($text);
                                    if ($Data_kategori->nm_kategori == 'Music Audio') :
                                        echo base_url('kategori/' . $link_asli);
                                    endif;
                                endforeach; ?>">
                        <img src="<?= base_url('assets/') ?>images/music-audio.svg" alt="Music &amp; Audio"
                            loading="lazy">Music &amp; Audio</a>
                </li>
                <li>
                    <a href="<?php foreach ($data_kategori as $Data_kategori) :
                                    $kategori = $Data_kategori->nm_kategori;
                                    $text = str_replace(' ', '-', $kategori);
                                    $link_asli = strtolower($text);
                                    if ($Data_kategori->nm_kategori == 'Programming Teknologi') :
                                        echo base_url('kategori/' . $link_asli);
                                    endif;
                                endforeach; ?>">
                        <img src="<?= base_url('assets/') ?>images/programming.svg" alt="Programming &amp; Tech"
                            loading="lazy">Programming &amp; Tech
                    </a>
                </li>
                <li>
                    <a href="<?php foreach ($data_kategori as $Data_kategori) :
                                    $kategori = $Data_kategori->nm_kategori;
                                    $text = str_replace(' ', '-', $kategori);
                                    $link_asli = strtolower($text);
                                    if ($Data_kategori->nm_kategori == 'Bussiness Planning') :
                                        echo base_url('kategori/' . $link_asli);
                                    endif;
                                endforeach; ?>">
                        <img src="<?= base_url('assets/') ?>images/business.svg" alt="Business"
                            loading="lazy">Business</a>
                </li>
                <li>
                    <a href="<?php foreach ($data_kategori as $Data_kategori) :
                                    $kategori = $Data_kategori->nm_kategori;
                                    $text = str_replace(' ', '-', $kategori);
                                    $link_asli = strtolower($text);
                                    if ($Data_kategori->nm_kategori == 'Lifstyle') :
                                        echo base_url('kategori/' . $link_asli);
                                    endif;
                                endforeach; ?>">
                        <img src="<?= base_url('assets/') ?>images/lifestyle.svg" alt="Lifestyle"
                            loading="lazy">Lifestyle
                    </a>
                </li>
            </ul>
        </div>
    </div>


    <div class="freelance-projects py-5">
        <div class="container">
            <h2>
                Cari pekerja yang sesuai dengan anda?
                <a href="<?= base_url('list-produk') ?>" class="float-right">Selanjutnya ></a>
            </h2>
            <div class="row freelance-slider">
                <?php foreach ($data_jasa as $Data_jasa) : ?>
                <div class="col">
                    <a href="<?= base_url('produk/detail/' . $Data_jasa->kd_jasa) ?>">
                        <div class="freelancer">
                            <img src="<?= base_url('assets/') ?>portfolio/<?= $Data_jasa->foto_portfolio ?>">
                            <div class="freelancer-footer">
                                <h5><?= $Data_jasa->nm_jasa ?>
                                    <span>by <i><?= $Data_jasa->nm_lengkap ?></i></span>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <div class="guide-wrapper py-5">
        <div class="container">
            <h2>
                Yuks Kerja Helper
            </h2>
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="guide">
                        <img src="<?= base_url('assets/') ?>images/guide-01.jpg">
                        <div class="content">
                            <h6>Transaksi Freelancer</h6>
                            <p>Belajar pertama kali menggunakan YuksKerja.com</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="guide">
                        <img src="<?= base_url('assets/') ?>images/guide-02.jpg">
                        <div class="content">
                            <h6>Profil Pekerja Lepas</h6>
                            <p>Pengetahuan tentang pekerja lepas secara umum</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="guide">
                        <img src="<?= base_url('assets/') ?>images/guide-03.jpg">
                        <div class="content">
                            <h6>Kontrak Transaksi</h6>
                            <p>Pengetahuan alur kerja dan garansi yang ditawarkan YuksKerja.com</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div>
        <div class="get-started">
            <div class="content">
                <h2>Cari Dan Temukan Pekerja Lepas Yang Akan Membantu Kegiatanmu </h2>
                <p>Kami memiliki pekerja lepas professional untuk anda ajak kerja sama.</p>
                <a href="#" class="c-btn c-fill-color-btn">Mulai Sekarang</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="order_detail" tabindex="-1" role="dialog" aria-labelledby="order_detailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content" style="background-color: ghostwhite;">
                <div class="modal-header" style="padding-top: 0px; padding-bottom: 0px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body"
                    style="padding-left: 0px; padding-top: 0; padding-bottom: 0; padding-right: 0px;">
                    <div>
                        <center>
                            <img src="<?= base_url('assets/img/popup.png') ?>" width="100%" alt="">
                        </center>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                        Close</button>
                    <a href="<?= base_url('contact') ?>">
                        <button class="btn btn-primary">Bantu Kami</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
    // angka 500 dibawah ini artinya pesan akan muncul dalam 0,5 detik setelah document ready
    $(document).ready(function() {
        setTimeout(function() {
            $('#order_detail').modal('show');
        }, 500);
    });
    // angka 3000 dibawah ini artinya pesan akan hilang dalam 3 detik setelah muncul
    // setTimeout(function() {
    //     $('#order_detail').modal('hide');
    // }, 3000);
    </script>
    <?php $this->load->view('HalamanUtama/footer') ?>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
</body>

<!-- Mirrored from askbootstrap.com/preview/miver/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 02 Feb 2022 03:46:17 GMT -->

</html>