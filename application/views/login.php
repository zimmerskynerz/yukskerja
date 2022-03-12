<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo6/auth_login_boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Aug 2021 03:59:55 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Selamat Datang Di Yuks Kerja.com | Menu Login</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/yk.png" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url('assets') ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets') ?>/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets') ?>/css/authentication/form-2.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/forms/switches.css">
</head>

<body class="form">
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class=""><a href="<?= base_url() ?>"><img src="<?= base_url('assets') ?>/img/yk.png"
                                    style="width : 5pc"></img></a></h1>
                        <form class="text-left" action="<?= base_url('cek_login') ?>" method="post">
                            <?= $this->session->flashdata('email_takterdaftar'); ?>
                            <?= $this->session->flashdata('password_gagal'); ?>
                            <?= $this->session->flashdata('berhasil_daftar'); ?>
                            <div class="form">
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                    value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                                <div id="username-field" class="field-wrapper input">
                                    <label for="username">EMAIL</label>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="email" name="email" type="email" class="form-control"
                                        placeholder="contoh@yukskerja.com">
                                </div>
                                <div id="password-field" class="field-wrapper input mb-2">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">PASSWORD</label>
                                        <a href="<?= base_url('reset') ?>" class="forgot-pass-link">Lupa Password?</a>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" class="form-control"
                                        placeholder="Password">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">MASUK</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="signup-link">Belum Punya Akun ? <a href="<?= base_url('register') ?>">Daftar!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('assets') ?>/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?= base_url('assets') ?>/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('assets') ?>/bootstrap/js/bootstrap.min.js"></script>
    <script>
    setTimeout(function() {
        $('#email_takterdaftar').hide()
    }, 3000);
    setTimeout(function() {
        $('#password_gagal').hide()
    }, 3000);
    setTimeout(function() {
        $('#email_sudah').hide()
    }, 3000);
    setTimeout(function() {
        $('#berhasil_daftar').hide()
    }, 3000);
    </script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="<?= base_url('assets') ?>/js/authentication/form-2.js"></script>

</body>

</html>