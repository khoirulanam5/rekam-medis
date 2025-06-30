<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Rekam Medis</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No Rekam Medis</th>
                                    <th>Pasien</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rekam as $p) : ?>
                                    <tr>
                                        <td><?= $p->no_rekam ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td>
                                            <a href="<?= base_url('dokter/rekam_medis/detail/') . $p->no_rekam ?>" class="btn btn-primary">Detail</a>
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