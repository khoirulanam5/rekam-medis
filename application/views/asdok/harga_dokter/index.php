<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Harga Dokter</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('asdok/harga_dokter/update') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $harga->id_harga_dokter ?>">

                        <div class="form-group">
                            <label for="email">Harga Dokter:</label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" name="harga" value="<?= $harga->harga ?>" class="form-control" id="format-rupiah">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>