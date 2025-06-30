<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Riwayat Pembayaran</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama Pasien</th>
                                    <th>Kode</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat as $p) : ?>
                                    <tr>
                                        <td><?= tgl_indo($p->tanggal) ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td><?= $p->kode_pembayaran ?></td>
                                        <td>Rp. <?= number_format($p->jumlah_pembayaran, 0, ".", ".") ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('apoteker/riwayat_pembayaran/cetak/') . $p->id_pembayaran ?>" target="_blank" class="btn btn-primary"><i class="ri-printer-fill"></i></a>
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