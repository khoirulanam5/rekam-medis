<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Antrian Pasien</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row justify-content-between mb-4">
                            <div class="col-sm-6 col-md-6">
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="user-list-files d-flex">
                                    <a href="<?= base_url('resepsionis/antrian/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nomor Antrian</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($antrians as $index => $antrian) : ?>
                                    <tr>
                                        <td><?= tgl_indo($antrian->tanggal) ?></td>
                                        <td><?= $antrian->no_antrian ?></td>
                                        <td><?= $antrian->nama ?></td>
                                        <td>
                                            <?php if ($antrian->status_antrian == 'tunggu') : ?>
                                                <span class="badge badge-danger">Belum Dipanggil</span>
                                            <?php else : ?>
                                                <span class="badge badge-success">Selesai</span>
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
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Antrian Belum Dipanggil</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row justify-content-between mb-4">
                            <div class="col-sm-6 col-md-6">
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="user-list-files d-flex">
                                    <a href="<?= base_url('resepsionis/antrian/destroy_all') ?>" class="btn btn-sm btn-danger">Hapus Semua</a>
                                </div>
                            </div>
                        </div>
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nomor Antrian</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($belum as $index => $antrian) : ?>
                                    <tr>
                                        <td><?= tgl_indo($antrian->tanggal) ?></td>
                                        <td><?= $antrian->no_antrian ?></td>
                                        <td><?= $antrian->nama ?></td>
                                        <td>
                                            <a href="<?= base_url('resepsionis/antrian/destroy/' . $antrian->id_antrian) ?>" class="btn btn-sm btn-danger">Hapus</a>
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