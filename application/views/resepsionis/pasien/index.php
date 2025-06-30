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
                                    <th>Username</th>
                                    <th>Nik</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Nomor Hp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pasien as $index => $p) : ?>
                                    <tr>
                                        <td><?= $index + 1  ?></td>
                                        <td><?= $p->username ?></td>
                                        <td><?= $p->nik ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td><?= $p->alamat ?></td>
                                        <td><?= $p->no_hp ?></td>
                                        <td>
                                            <a href="<?= base_url('resepsionis/pasien/edit/') . $p->id_pasien ?>" class="btn btn-primary">Edit</a>
                                            <!-- <a href="<?= base_url('resepsionis/pasien/delete/') . $p->id_pasien ?>" class="btn btn-danger">Hapus</a> -->
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