<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Data</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('resepsionis/pasien/update') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $pasien->id_pasien ?>">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" value="<?= $pasien->username ?>" class="form-control" placeholder="Masukan username" required>
                        </div>
                        <div class="form-group">
                            <label>Nik:</label>
                            <input type="number" name="nik" value="<?= $pasien->nik ?>" class="form-control" placeholder="Masukan nik" required>
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" value="<?= $pasien->nama ?>" class="form-control" placeholder="Masukan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <input type="text" name="alamat" value="<?= $pasien->alamat ?>" class="form-control" placeholder="Masukan alamat lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Whatsapp:</label>
                            <input type="number" name="no_hp" value="<?= $pasien->no_hp ?>" class="form-control" placeholder="Masukan nomor wa" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>