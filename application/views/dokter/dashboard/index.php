<!-- Tambahkan ini di <head> atau sebelum script Chart dipanggil -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container-fluid">
    <!-- Breadcrumb-->
    <div class="row pt-2 pb-2">
        <div class="col-sm-9">
            <h4 class="page-title">Data Grafik</h4>
        </div>
    </div>

    <!-- Grafik Donut -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="chart-container-8" style="height: 300px;">
                                <canvas id="chartContent" style="height: 100%; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Evaluasi -->
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
                                <?php foreach ($evaluasi as $index => $p): ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
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

    <!-- Chart Initialization Script -->
    <script type="text/javascript">
        (function(window, document, $, undefined) {
            "use strict";
            $(function() {
                var ctx = document.getElementById("chartContent");
                if (ctx) {
                    var chart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: ["Sembuh", "Meninggal", "Dirujuk"],
                            datasets: [{
                                label: 'Jumlah Pasien',
                                data: [
                                    <?= isset($hasil->sembuh) ? $hasil->sembuh : 0 ?>,
                                    <?= isset($hasil->meninggal) ? $hasil->meninggal : 0 ?>,
                                    <?= isset($hasil->dirujuk) ? $hasil->dirujuk : 0 ?>
                                ],
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
                        }
                    });
                }
            });
        })(window, document, jQuery);
    </script>
</div>
