<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Pasien</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Nomor Hp</th>
                                    <th class="text-center">Keluhan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pasien as $index => $p) : ?>
                                    <tr>
                                        <td><?= $index + 1  ?></td>
                                        <td><?= $p->username ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td><?= $p->alamat ?></td>
                                        <td><?= $p->no_hp ?></td>
                                        <td class="text-center"><a href="<?= base_url('asdok/pasien/keluhan/') . $p->id_pasien ?>" class="btn btn-success">Lihat</a></td>
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