<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <?php if ($identitas['profile'] == null) : ?>
                <img src="<?= base_url('assets/') ?>img/profile-1.jpg" alt="avatar">
                <?php else : ?>
                <img src="<?= base_url('assets/profile/' . $identitas['profile']) ?>" alt="avatar">
                <?php endif; ?>
                <h6 class="">Lukito Prayogo</h6>
                <p class="">CEO Yuks Kerja</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <!-- Menu Beranda -->
            <li class="menu <?php echo $this->uri->segment(2) == 'beranda' ? 'active' : '' ?>">
                <a href="<?= base_url('owner/beranda') ?>"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'beranda' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Beranda</span>
                    </div>
                </a>
            </li>
            <!-- Menu Kelola User's -->
            <li class="menu <?php echo $this->uri->segment(2) == 'users' ? 'active' : '' ?>">
                <a href="#kelola_user" data-toggle="collapse"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'users' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>Data Users</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu <?php echo $this->uri->segment(2) == 'users' ? 'recent-submenu mini-recent-submenu' : '' ?> list-unstyled <?php echo $this->uri->segment(2) == 'users' ? 'show' : '' ?>"
                    id="kelola_user" data-parent="#accordionExample">
                    <li class="<?php echo $this->uri->segment(3) == 'service' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/users/service') ?>"> Customer Service </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'customer' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/users/customer') ?>"> Pelanggan </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'freelancer' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/users/freelancer') ?>"> Freelancer </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Laporan -->
            <li class="menu <?php echo $this->uri->segment(2) == 'reports' ? 'active' : '' ?>">
                <a href="#kelola_reports" data-toggle="collapse"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'reports' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-clipboard">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <span>Laporan</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu <?php echo $this->uri->segment(2) == 'reports' ? 'recent-submenu mini-recent-submenu' : '' ?> list-unstyled <?php echo $this->uri->segment(2) == 'reports' ? 'show' : '' ?>"
                    id="kelola_reports" data-parent="#accordionExample">
                    <li class="<?php echo $this->uri->segment(3) == 'transaksi' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/reports/transaksi') ?>"> Transaksi </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'buku-kas' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/reports/buku-kas') ?>"> Buku Kas </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'gaji' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/reports/gaji') ?>"> Gaji </a>
                    </li>
                </ul>
            </li>
            <!-- Menu Konsumen Gift -->
            <!-- <li class="menu <?php echo $this->uri->segment(2) == 'hadiah' ? 'active' : '' ?>">
                <a href="#kelola_hadiah" data-toggle="collapse"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'hadiah' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-gift">
                            <polyline points="20 12 20 22 4 22 4 12"></polyline>
                            <rect x="2" y="7" width="20" height="5"></rect>
                            <line x1="12" y1="22" x2="12" y2="7"></line>
                            <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                            <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                        </svg>
                        <span>Data Hadiah</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu <?php echo $this->uri->segment(2) == 'hadiah' ? 'recent-submenu mini-recent-submenu' : '' ?> list-unstyled <?php echo $this->uri->segment(2) == 'hadiah' ? 'show' : '' ?>"
                    id="kelola_hadiah" data-parent="#accordionExample">
                    <li class="<?php echo $this->uri->segment(3) == 'kupon' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/hadiah/kupon') ?>"> Kupon </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'promo' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/hadiah/promo') ?>"> Promo </a>
                    </li>
                </ul>
            </li> -->
            <!-- Menu Setting -->
            <li class="menu <?php echo $this->uri->segment(2) == 'settings' ? 'active' : '' ?>">
                <a href="#kelola_settings" data-toggle="collapse"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'settings' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-settings">
                            <circle cx="12" cy="12" r="3"></circle>
                            <path
                                d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                            </path>
                        </svg>
                        <span>Settings</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu <?php echo $this->uri->segment(2) == 'settings' ? 'recent-submenu mini-recent-submenu' : '' ?> list-unstyled <?php echo $this->uri->segment(2) == 'settings' ? 'show' : '' ?>"
                    id="kelola_settings" data-parent="#accordionExample">
                    <li class="<?php echo $this->uri->segment(3) == 'biaya' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/settings/biaya') ?>"> Biaya </a>
                    </li>
                    <!-- <li class="<?php echo $this->uri->segment(3) == 'syarat-dan-ketentuan' ? 'active' : '' ?>">
                        <a href="<?= base_url('owner/settings/syarat-dan-ketentuan') ?>"> S & K </a>
                    </li> -->
                </ul>
            </li>
            <!-- Menu Midtrans -->
            <li class="menu <?php echo $this->uri->segment(2) == 'midtrans' ? 'active' : '' ?>">
                <a href="<?= base_url('owner/midtrans') ?>"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'midtrans' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-credit-card">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        <span>Midtrans</span>
                    </div>
                </a>
            </li>
            <!-- Menu SMTP -->
            <li class="menu <?php echo $this->uri->segment(2) == 'smtp' ? 'active' : '' ?>">
                <a href="<?= base_url('owner/smtp') ?>"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'smtp' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span>SMTP</span>
                    </div>
                </a>
            </li>
            <!-- Menu Logout -->
            <li class="menu">
                <a href="<?= base_url('logout') ?>" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-log-out">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span>Logout</span>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</div>