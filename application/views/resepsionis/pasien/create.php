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
                    <form action="<?= base_url('resepsionis/pasien/store') ?>" method="POST">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukan username" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukan password" required>
                        </div>
                        <div class="form-group">
                            <label>Nik:</label>
                            <input type="number" name="nik" class="form-control" placeholder="Masukan nik" required>
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Masukan alamat lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Whatsapp:</label>
                            <input type="number" name="no_hp" class="form-control" placeholder="Masukan nomor wa" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>