<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('dokter/templates/head'); ?>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <?php $this->load->view('dokter/templates/menu'); ?>
        <?php $this->load->view('dokter/templates/navbar'); ?>
        <div class="content-page rtl-page">
            <?php $this->load->view('dokter/' . $folder . '/' . $page); ?>
        </div>
    </div>

    <footer class="iq-footer rtl-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-right ">
                    Copyright 2025 <a href="#">Klinik Pratama</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>

    <?php $this->load->view('dokter/templates/js'); ?>

</body>

</html>