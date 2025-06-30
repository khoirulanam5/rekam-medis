<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">

            <div class="card card-block card-stretch card-height rounded">
                <div class="card-body">
                    <h6 class="text-center mb-2">Nomor Antrian Anda</h6>
                    <div class="text-center">
                        <h2><?= $antrian->no_antrian ?></h2>
                        <?php if ($antrian->status_antrian == 'tunggu') : ?>
                            <span class="badge badge-danger">Tunggu / Belum Dipanggil</span>
                        <?php else : ?>
                            <span class="badge badge-success">Selesai</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>