<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Obat Keluar</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Kode Obat</th>
                                    <th>Nama Obat</th>
                                    <th>Merk Obat</th>
                                    <th>Harga Obat</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($obat as $p) : ?>
                                    <tr>
                                        <td><?= tgl_indo($p->tanggal_keluar)  ?></td>
                                        <td><?= $p->kode_obat ?></td>
                                        <td><?= $p->nama_obat ?></td>
                                        <td><?= $p->merk_obat ?></td>
                                        <td>Rp. <?= number_format($p->harga, 0, ".", ".") ?></td>
                                        <td><?= $p->jumlah ?> </td>
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