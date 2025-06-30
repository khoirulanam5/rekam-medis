<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Data Obat</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('apoteker/obat/update') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $obat->id_obat ?>">
                        <div class="form-group">
                            <label for="email">Nama Obat:</label>
                            <input type="text" name="nama_obat" value="<?= $obat->nama_obat ?>" class="form-control" placeholder="Masukan nama obat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Golongan Obat:</label>
                            <select name="kategori" class="form-control" required>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat->id_kategori ?>" <?= $kat->id_kategori == $obat->id_kategori ? 'selected' : ''  ?>><?= $kat->nama_kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Merk Obat:</label>
                            <input type="text" value="<?= $obat->merk_obat ?>" name="merk_obat" class="form-control" placeholder="Masukan merk obat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Harga Obat:</label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" value="<?= number_format($obat->harga, 0, ".", ".") ?>" name="harga" class="form-control" id="format-rupiah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Stock Obat:</label>
                            <input type="number" value="<?= $obat->stock ?>" min="1" name="stock" class="form-control" placeholder="Jumlah stock obat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Tanggal Kadaluarsa:</label>
                            <input type="date" value="<?= $obat->expired ?>" name="expired" class="form-control" id="exampleInputdate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>