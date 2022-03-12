<nav class="navbar navbar-expand-lg navbar-green bg-green osahan-nav-mid px-0 border-top shadow-sm" style="background-color: #04AA6D;">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="dropdown">
                    <div class="dropdown">
                        <a href="<?= base_url() ?>"><button class="dropbtn">Home</button></a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="dropdown">
                        <a href="<?= base_url('about') ?>"><button class="dropbtn">About</button></a>
                    </div>
                </li>
                <li class="dropdown">
                    <div class="dropdown">
                        <a href="<?= base_url('contact') ?>"><button class="dropbtn">Contact</button></a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <div class="dropdown">
                        <button class="dropbtn">Kategori</button>
                        <div class="dropdown-content">
                            <?php foreach ($data_kategori as $Data_kategori) : ?>
                                <a href="<?php
                                            $kategori = $Data_kategori->nm_kategori;
                                            $text = str_replace(' ', '-', $kategori);
                                            $link_asli = strtolower($text);
                                            echo base_url('kategori/' . $link_asli) ?>"><?= $Data_kategori->nm_kategori ?></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <?php if ($data_identitas > 0) : ?>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="<?= base_url('customer') ?>"><button class="dropbtn">Dashboard</button></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a href="<?= base_url('logout') ?>"><button class="dropbtn">Logout</button></a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <div class="dropdown">
                            <button class="dropbtn">Akun</button>
                            <div class="dropdown-content">
                                <a class="dropdown-item" href="<?= base_url('login') ?>">Login</a>
                                <a class="dropdown-item" href="<?= base_url('register') ?>">Daftar</a>
                            </div>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>