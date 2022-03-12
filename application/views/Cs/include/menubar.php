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
                <h6 class=""><?= $identitas['nm_lengkap'] ?></h6>
                <p class="">Customer Service / Administrasi</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <!-- Beranda -->
            <li class="menu <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/dashboard') ?>"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'dashboard' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <!-- Kelola User -->
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
                    <li class="<?php echo $this->uri->segment(3) == 'pelanggan' ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/users/pelanggan') ?>"> Pelanggan </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'konfirmasi-freelancer' ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/users/konfirmasi-freelancer') ?>"> Konfrimasi </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'freelance' ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/users/freelance') ?>"> Freelance </a>
                    </li>
                </ul>
            </li>
            <li class="menu <?php echo $this->uri->segment(2) == 'kategori' ? 'active' : '' ?>">
                <a href="<?= base_url('admin/kategori') ?>"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'kategori' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Kategori Jasa</span>
                    </div>
                </a>
            </li>
            <!-- Kelola Transaksi -->
            <li class="menu <?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : '' ?>">
                <a href="#dashboard" data-toggle="collapse"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'transaksi' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-clipboard">
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                        </svg>
                        <span>Transaksi</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu <?php echo $this->uri->segment(2) == 'transaksi' ? 'recent-submenu mini-recent-submenu' : '' ?> list-unstyled <?php echo $this->uri->segment(2) == 'transaksi' ? 'show' : '' ?>"
                    id="dashboard" data-parent="#accordionExample">
                    <li class="<?php echo $this->uri->segment(3) == 'order' ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/transaksi/order') ?>"> Order </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'selesai' ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/transaksi/selesai') ?>"> Selesai </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'komplain' ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/transaksi/komplain') ?>"> Komplain </a>
                    </li>
                </ul>
            </li>
            <!-- Kelola Keuangan -->
            <li class="menu <?php echo $this->uri->segment(2) == 'bendahara' ? 'active' : '' ?>">
                <a href="#bendahara" data-toggle="collapse"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'bendahara' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-target">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="6"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                        <span>Bendahara</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="collapse submenu <?php echo $this->uri->segment(2) == 'bendahara' ? 'recent-submenu mini-recent-submenu' : '' ?> list-unstyled <?php echo $this->uri->segment(2) == 'bendahara' ? 'show' : '' ?>"
                    id="bendahara" data-parent="#accordionExample">
                    <li class="<?php echo $this->uri->segment(3) == 'withdraw' ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/bendahara/withdraw') ?>"> Withdraw </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'operational' ? 'active' : '' ?>">
                        <a href="<?= base_url('admin/bendahara/operational') ?>"> Operational </a>
                    </li>
                </ul>
            </li>
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