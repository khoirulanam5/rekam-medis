<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Keluhan</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row justify-content-between mb-4">
                            <div class="col-sm-6 col-md-6">
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="user-list-files d-flex">
                                    <a href="<?= base_url('resepsionis/pasien/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Lengkap</th>
                                    <th>Keluhan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($keluhan as $index => $p) : ?>
                                    <tr>
                                        <td><?= $index + 1  ?></td>
                                        <td><?= tgl_indo($p->tanggal) ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td><?= $p->keterangan ?></td>
                                        <td>
                                            <a href="<?= base_url('resepsionis/pasien/edit/') . $p->id_keluhan ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?= base_url('resepsionis/pasien/delete/') . $p->id_keluhan ?>" class="btn btn-danger">Hapus</a>
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