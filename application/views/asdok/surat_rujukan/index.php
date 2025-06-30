<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Surat Rujukan</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nomor Surat</th>
                                    <th>Nama Pasien</th>
                                    <th>Alamat</th>
                                    <th>Nomor Hp</th>
                                    <th>Rumah Sakit Tujuan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($surat as $index => $p) : ?>
                                    <tr>
                                        <td><?= tgl_indo($p->tanggal) ?></td>
                                        <td><?= $p->no_surat ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td><?= $p->alamat ?></td>
                                        <td><?= $p->no_hp ?></td>
                                        <td><?= $p->rumah_sakit ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('asdok/surat_rujukan/print/' . $p->id_surat) ?>" class="btn btn-primary" target="_blank"><i class="ri-printer-fill"></i></a>
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