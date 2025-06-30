<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title mr-6">Data Riwayat Pemeriksaan</h4> 


                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Periksa</th>
                                    <th>Diagnosa</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($riwayat as $p) : ?>
                                    <tr>
                                        <td><?= $p->nik ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td><?= $p->alamat ?></td>
                                        <td><?= tgl_indo($p->tanggal) ?></td>
                                        <td><?= $p->diagnosa ?></td>
                                        
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