    <!-- Footer -->
    <footer class="bg-white">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="footer-list">
                    <h2>Categories</h2>
                    <ul class="list">
                        <?php foreach ($data_kategori as $Data_kategori) :
                            $kategori = $Data_kategori->nm_kategori;
                            $text = str_replace(' ', '-', $kategori);
                            $link_asli = strtolower($text);
                        ?>
                        <li><a href="<?= base_url('kategori/' . $link_asli) ?>"><?= $Data_kategori->nm_kategori ?></a>
                        </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
                <div class="footer-list">
                    <h2>About</h2>
                    <ul class="list">
                        <li><a href="<?= base_url('careers') ?>">Careers</a></li>
                        <li><a href="<?= base_url('partnerships') ?>">Partnerships</a></li>
                        <li><a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a></li>
                        <li><a href="<?= base_url('terms-of-service') ?>">Terms of Service</a></li>
                        <li><a href="<?= base_url('investor-relations') ?>">Investor Relations</a></li>
                    </ul>
                </div>
                <div class="footer-list">
                    <h2>Support</h2>
                    <ul class="list">
                        <li><a href="<?= base_url('help') ?>">Help &amp; Support</a></li>
                        <li><a href="<?= base_url('selling') ?>">Selling on YuksKerja
                            </a>
                        </li>
                        <li><a href="<?= base_url('buying') ?>">Buying on YuksKerja
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer-list">
                    <h2>Community</h2>
                    <ul class="list">
                        <li><a href="https://blogs.yukskerja.com/events">Events</a></li>
                        <li><a href="https://blogs.yukskerja.com">Blog</a></li>
                        <li><a href="https://blogs.yukskerja.com/forum">Forum</a></li>
                        <li><a href="https://blogs.yukskerja.com/podcast">Podcast</a></li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <div class="logo">
                    <a href="index-2.html">
                        <img src="<?= base_url('assets') ?>/img/yk.png">
                    </a>
                </div>
                <p>© Copyright <?= date('Y') ?> YuksKerja.com. All Rights Reserved
                </p>
            </div>
        </div>
    </footer>
    <script data-cfasync="false"
        src="https://ajax.cloudflare.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js" type="85f3c601a16eda99c2b6cb5a-text/javascript">
    </script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"
        type="85f3c601a16eda99c2b6cb5a-text/javascript"></script>
    <script src="<?= base_url('assets/') ?>js/jqBootstrapValidation.js" type="85f3c601a16eda99c2b6cb5a-text/javascript">
    </script>
    <script src="<?= base_url('assets/') ?>js/contact_me.js" type="85f3c601a16eda99c2b6cb5a-text/javascript"></script>
    <script src="<?= base_url('assets/') ?>vendor/slick-master/slick/slick.js"
        type="85f3c601a16eda99c2b6cb5a-text/javascript" charset="utf-8"></script>
    <script src="<?= base_url('assets/') ?>vendor/lightgallery-master/dist/js/lightgallery-all.min.js"
        type="85f3c601a16eda99c2b6cb5a-text/javascript"></script>
    <script src="<?= base_url('assets/') ?>vendor/select2/js/select2.min.js"
        type="85f3c601a16eda99c2b6cb5a-text/javascript"></script>
    <script src="<?= base_url('assets/') ?>js/custom_depan.js" type="85f3c601a16eda99c2b6cb5a-text/javascript"></script>
    <script src="https://ajax.cloudflare.com//cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="38dc5055b20230501d80f968-|49" defer=""></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"6d706d6708a54804","version":"2021.12.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}'
        crossorigin="anonymous"></script>
    </body>