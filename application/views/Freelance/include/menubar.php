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
                <p class="">Freelancer</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <!-- Beranda -->
            <li class="menu <?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                <a href="<?= base_url('cust-freelance/dashboard') ?>"
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
            <!-- Produk Jasa -->
            <li class="menu <?php echo $this->uri->segment(2) == 'produk' ? 'active' : '' ?>">
                <a href="<?= base_url('cust-freelance/produk') ?>"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'produk' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-archive">
                            <polyline points="21 8 21 21 3 21 3 8"></polyline>
                            <rect x="1" y="3" width="22" height="5"></rect>
                            <line x1="10" y1="12" x2="14" y2="12"></line>
                        </svg>
                        <span>Produk</span>
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
                            class="feather feather-zap">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
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
                        <a href="<?= base_url('cust-freelance/transaksi/order') ?>"> Order </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'proses' ? 'active' : '' ?>">
                        <a href="<?= base_url('cust-freelance/transaksi/proses') ?>"> Proses </a>
                    </li>
                    <li class="<?php echo $this->uri->segment(3) == 'selesai' ? 'active' : '' ?>">
                        <a href="<?= base_url('cust-freelance/transaksi/selesai') ?>"> Selesai </a>
                    </li>
                </ul>
            </li>
            <!-- Produk Gaji -->
            <li class="menu <?php echo $this->uri->segment(2) == 'pendapatan' ? 'active' : '' ?>">
                <a href="<?= base_url('cust-freelance/pendapatan') ?>"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'pendapatan' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-credit-card">
                            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                            <line x1="1" y1="10" x2="23" y2="10"></line>
                        </svg>
                        <span>Pendapatan</span>
                    </div>
                </a>
            </li>
            <!-- Produk Profile -->
            <li class="menu <?php echo $this->uri->segment(2) == 'profile' ? 'active' : '' ?>">
                <a href="<?= base_url('cust-freelance/profile') ?>"
                    aria-expanded="<?php echo $this->uri->segment(2) == 'profile' ? 'true' : 'false' ?>"
                    class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span>Profile</span>
                    </div>
                </a>
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