<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <div class="card card-block card-stretch card-height rounded">
                <div class="card-body">
                    <?php if (!$antrian) : ?>
                        <h6 class="text-center mb-2">Tidak Ada Antrian Hari Ini</h6>
                    <?php else : ?>
                        <h6 class="text-center mb-2">Nomor Antrian</h6>
                        <div class="text-center">
                            <h2><?= $antrian->no_antrian ?></h2>
                            <div class="mb-2">
                                <span>Nama Pasien : <?= $antrian->nama ?></span>
                            </div>
                            <a href="<?= base_url('asdok/antrian/panggil/') . $antrian->id_antrian ?>" class="btn btn-primary">Panggil</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>