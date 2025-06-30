<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Data</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('resepsionis/antrian/store') ?>" method="POST">
                        <div class="form-group">
                            <label>Pilih Pasien:</label>
                            <select class="form-control" name="pasien" required>
                                <option value="">Pilih Pasien</option>
                                <?php foreach ($pasiens as $index => $pasien) : ?>
                                    <option value="<?= $pasien->id_pasien ?>"><?= $pasien->no_rekam ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>