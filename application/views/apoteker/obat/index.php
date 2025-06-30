<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Obat</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row justify-content-between mb-4">
                            <div class="col-sm-6 col-md-6">
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="user-list-files d-flex">
                                    <a href="<?= base_url('apoteker/obat/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <?php if ($notif) : ?>
                            <?php foreach ($notif as $n) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <div class="iq-alert-text"><?= $n->nama_obat ?> Stok tersisa : <?= $n->stock ?></div>
                                </div>
                            <?php endforeach; ?>

                        <?php else : ?>
                        <?php endif; ?>
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Obat</th>
                                    <th>Kategori</th>
                                    <th>Nama Obat</th>
                                    <th>Merk Obat</th>
                                    <th>Harga Obat</th>
                                    <th>Stock</th>
                                    <th>Expired</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($obat as $p) : ?>
                                    <tr>
                                        <td><?= $no++  ?></td>
                                        <td><?= $p->kode_obat ?></td>
                                        <td><?= $p->nama_kategori ?></td>
                                        <td><?= $p->nama_obat ?></td>
                                        <td><?= $p->merk_obat ?></td>
                                        <td>Rp. <?= number_format($p->harga, 0, ".", ".") ?></td>
                                        <td><?= $p->stock ?> </td>
                                        <td>
                                            <?= tgl_indo($p->expired); ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('apoteker/obat/edit/') . $p->id_obat ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?= base_url('apoteker/obat/delete/') . $p->id_obat ?>" class="btn btn-danger">Hapus</a>
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