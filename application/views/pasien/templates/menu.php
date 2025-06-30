<div class="iq-sidebar  rtl-iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?php echo site_url('pasien/dashboard') ?>" class="header-logo">
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
                    <a href="<?php echo site_url('pasien/dashboard') ?>"><i class="las la-home"></i><span>Dashboards</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'antrian' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('pasien/antrian') ?>"><i class="las la-sort-numeric-down-alt"></i><span>Antrian</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'riwayat_pemeriksaan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('pasien/riwayat_pemeriksaan') ?>"><i class="las la-receipt"></i><span>Riwayat Pemeriksaan</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>