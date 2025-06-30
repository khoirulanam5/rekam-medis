<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Golongan Obat</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('apoteker/kategori/update') ?>" method="POST">
                        <input type="hidden" value="<?= $kategori->id_kategori ?>" name="id">
                        <div class="form-group">
                            <label for="email">Nama Golongan:</label>
                            <input type="text" name="nama_kategori" value="<?= $kategori->nama_kategori ?>" class="form-control" placeholder="Masukan nama kategori" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>