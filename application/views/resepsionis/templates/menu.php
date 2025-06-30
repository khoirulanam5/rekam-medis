<div class="iq-sidebar  rtl-iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?php echo site_url('resepsionis/dashboard') ?>" class="header-logo">
            <img src="<?= base_url('assets/images/logo.png') ?>" class="img-fluid rounded-normal light-logo" alt="logo">
            <img src="<?= base_url('assets/images/logo-white.png') ?>" class="img-fluid rounded-normal darkmode-logo" alt="logo">
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-bars wrapper-menu"></i>
        </div>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="iq-menu">
                <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('resepsionis/dashboard') ?>"><i class="las la-home"></i><span>Dashboards</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'verifikasi' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('resepsionis/verifikasi') ?>"><i class="las la-tasks"></i><span>Verifikasi</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'antrian' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('resepsionis/antrian') ?>"><i class="las la-sort-numeric-down-alt"></i><span>Antrian</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('resepsionis/user') ?>"><i class="las la-user"></i><span>User</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'pasien' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('resepsionis/pasien') ?>"><i class="las la-user-friends"></i><span>Pasien</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'rawat_jalan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('resepsionis/rawat_jalan') ?>"><i class="las la-notes-medical"></i><span>Rawat Jalan</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>