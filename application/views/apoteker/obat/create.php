<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Data Obat</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('apoteker/obat/store') ?>" method="POST">
                        <div class="form-group">
                            <label for="email">Kode Obat:</label>
                            <input type="text" name="kode_obat" value="<?= $kode ?>" class="form-control" readonly>
                            <small class="text-danger">Kode otomatis generate oleh sistem</small>
                        </div>
                        <div class="form-group">
                            <label for="email">Nama Obat:</label>
                            <input type="text" name="nama_obat" class="form-control" placeholder="Masukan nama obat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Golongan Obat:</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">-- Pilih Golongan --</option>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat->id_kategori ?>"><?= $kat->nama_kategori ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="email">Merk Obat:</label>
                            <input type="text" name="merk_obat" class="form-control" placeholder="Masukan merk obat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Harga Obat:</label>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" name="harga" class="form-control" id="format-rupiah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">Stock Obat:</label>
                            <input type="number" min="1" name="stock" class="form-control" placeholder="Jumlah stock obat" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Tanggal Kadaluarsa:</label>
                            <input type="date" name="expired" class="form-control" id="exampleInputdate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>