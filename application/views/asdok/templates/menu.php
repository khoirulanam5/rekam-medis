<div class="iq-sidebar  rtl-iq-sidebar sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="<?php echo site_url('asdok/dashboard') ?>" class="header-logo">
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
                    <a href="<?php echo site_url('asdok/dashboard') ?>"><i class="las la-home"></i><span>Dashboards</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'antrian' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('asdok/antrian') ?>"><i class="las la-sort-numeric-down-alt"></i><span>Antrian</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'pasien' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('asdok/pasien') ?>"><i class="las la-user-friends"></i><span>Pasien</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'pemeriksaan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('asdok/pemeriksaan') ?>"><i class="las la-stethoscope"></i><span>Pemeriksaan</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'obat' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('asdok/obat') ?>"><i class="las la-capsules"></i><span>Resep</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'rekam_medis' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('asdok/rekam_medis') ?>"><i class="las la-file-medical-alt"></i><span>Rekam Medis</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'surat_rujukan' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('asdok/surat_rujukan') ?>"><i class="las la-comment-medical"></i><span>Surat Rujukan</span></a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'harga_dokter' ? 'active' : '' ?>">
                    <a href="<?php echo site_url('asdok/harga_dokter') ?>"><i class="las la-diagnoses"></i><span>Harga
                            Dokter</span></a>
                </li>
            </ul>
        </nav>
    </div>
</div>