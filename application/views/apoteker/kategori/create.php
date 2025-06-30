<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Golongan Obat</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('apoteker/kategori/store') ?>" method="POST">
                        <div class="form-group">
                            <label for="email">Nama Golongan:</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Masukan nama kategori" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>