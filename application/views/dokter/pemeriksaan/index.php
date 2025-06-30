<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Pemeriksaan</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pasien</th>
                                    <th>Keluhan</th>
                                    <th>Diagnosa</th>
                                    <th>Rawat Inap</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pemeriksaan as $index => $p) : ?>
                                    <tr>
                                        <td><?= $index + 1 ?></td>
                                        <td><?= tgl_indo($p->tanggal_periksa) ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td><?= $p->keterangan ?></td>
                                        <td><?= $p->diagnosa ?></td>
                                        <td>
                                            <?php if ($p->rawat_inap == 'ya') : ?>
                                                <span class="badge badge-success">Ya</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger">Tidak</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>