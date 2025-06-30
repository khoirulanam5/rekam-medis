<div class="iq-sidebar  rtl-iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?php echo site_url('apoteker/dashboard') ?>" class="header-logo">
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
                    <a href="<?php echo site_url('apoteker/dashboard') ?>"><i class="las la-home"></i><span>Dashboards</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'kategori' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('apoteker/kategori') ?>"><i class="las la-sort-numeric-down-alt"></i><span>Kategori</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'obat' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('apoteker/obat') ?>"><i class="las la-capsules"></i><span>Obat</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'obat_keluar' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('apoteker/obat_keluar') ?>"><i class="las la-file-medical"></i><span>Obat Keluar</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'pembayaran' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('apoteker/pembayaran') ?>"><i class="las la-money-bill-wave"></i><span>Pembayaran</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'riwayat_pembayaran' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('apoteker/riwayat_pembayaran') ?>"><i class="las la-receipt"></i><span>Riwayat Pembayaran</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>