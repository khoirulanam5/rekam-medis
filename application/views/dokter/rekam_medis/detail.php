<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-block p-card">
                <div class="profile-box">
                    <div class="profile-card rounded">
                        <h3 class="font-600 text-white text-center mb-0"><?= $rekam->nama ?></h3>
                        <p class="text-white text-center mb-5"></p>
                    </div>
                    <div class="pro-content rounded">
                        <div class="d-flex align-items-center mb-2">
                            <?= tgl_indo($detail->tgl_lahir) ?>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <?= $detail->jekel ?>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <?= $detail->bb ?> Kg
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <?= $detail->tb ?> Cm
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <?= $detail->pekerjaan ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card card-block mb-3">

                <?php foreach ($detailRekam as $p) : ?>
                    <div class="card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title mb-0">Tanggal Periksa</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p><?= tgl_indo($p->tanggal_periksa) ?></p>
                        <h5 class="mb-2 mt-4">Keluhan</h5>
                        <p><?= $p->keterangan ?> </p>
                        <h5 class="mb-2 mt-4">Diagnosa Pemeriksaan</h5>
                        <p><?= $p->diagnosa ?></p>
                        <?php if ($p->rawat_inap == 'ya') : ?>
                            <p>Rawat Inap</p>
                            <!-- <p>Kontrol : <?= tgl_indo($p->tanggal_kontrol) ?></p> -->
                        <?php else : ?>
                            <p>Rawat Jalan</p>
                        <?php endif; ?>
                        <h5 class="mb-2">Obat</h5>
                        <ul class="list-unstyled mb-0 rtl-list-unstyled">
                            <?php foreach ($p->obat as $q) : ?>
                                <li class="mb-3"><i class="fa fa-check-circle text-primary fa-lg mr-2 rtl-ml-2 rtl-mr-0"></i><?= $q->nama_obat ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            </div>
            <a href="<?= base_url('dokter/rekam_medis/cetak/') . $rekam->no_rekam ?>" target="_blank" class="btn btn-primary float-right">Cetak</a>

        </div>
    </div>
</div>