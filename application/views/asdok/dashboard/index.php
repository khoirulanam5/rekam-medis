<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Data Grafik</h4>
        </div>
    </div>
    <!-- End Breadcrumb-->
    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="chart-container-8">
                                <canvas id="chartContent"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Evaluasi</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pasien sembuh</th>
                                    <th>Pasien dirujuk</th>
                                    <th>Pasien meninggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($evaluasi as $index => $p) : ?>
                                    <tr>
                                        <td><?= $index + 1  ?></td>
                                        <td><?= $p->sembuh ?></td>
                                        <td><?= $p->dirujuk ?></td>
                                        <td><?= $p->meninggal ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        (function(window, document, $, undefined) {
            "use strict";
            $(function() {
                if ($('#chartContent').length) {
                    var ctx = document.getElementById("chartContent").getContext('2d');

                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ["Sembuh", "Meninggal", "Dirujuk"],
                            datasets: [{
                                label: 'Jumlah Pasien',
                                data: [<?= $hasil->sembuh ?>, <?= $hasil->meninggal ?>, <?= $hasil->dirujuk ?>],
                                backgroundColor: [
                                    'rgb(75, 192, 192)',
                                    'rgb(255, 99, 132)',
                                    'rgb(255, 205, 86)'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                        },
                    });
                }
            });
        })(window, document, jQuery);
    </script>