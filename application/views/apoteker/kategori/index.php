<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Golongan Obat</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row justify-content-between mb-4">
                            <div class="col-sm-6 col-md-6">
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="user-list-files d-flex">
                                    <a href="<?= base_url('apoteker/kategori/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Golongan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($kategori as $kat) : ?>
                                    <tr>
                                        <td><?= $no++  ?></td>
                                        <td><?= $kat->nama_kategori ?></td>
                                        <td>
                                            <a href="<?= base_url('apoteker/kategori/edit/') . $kat->id_kategori ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?= base_url('apoteker/kategori/delete/') . $kat->id_kategori ?>" class="btn btn-danger">Hapus</a>
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