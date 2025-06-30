<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('apoteker/templates/head'); ?>

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <?php $this->load->view('apoteker/templates/menu'); ?>
        <?php $this->load->view('apoteker/templates/navbar'); ?>
        <div class="content-page rtl-page">
            <?php $this->load->view('apoteker/' . $folder . '/' . $page); ?>
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

    <?php $this->load->view('apoteker/templates/js'); ?>

</body>

</html>