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
                    <form action="<?= base_url('resepsionis/user/update') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $user->id_user ?>">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" value="<?= $user->username ?>" class="form-control" placeholder="Masukan username" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" value="<?= $user->password ?>" class="form-control" placeholder="Masukan password" required>
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <input type="text" name="nama" value="<?= $user->nama ?>" class="form-control" placeholder="Masukan nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat:</label>
                            <input type="text" name="alamat" value="<?= $user->alamat ?>" class="form-control" placeholder="Masukan alamat lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Nomor Whatsapp:</label>
                            <input type="number" name="no_hp" value="<?= $user->no_hp ?>" class="form-control" placeholder="Masukan nomor wa" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan:</label>
                            <select name="jabatan" class="form-control" required>
                                <option value="">-- Pilih Jabatan --</option>
                                <option value="dokter" <?= $user->jabatan == 'dokter' ? 'selected' : '' ?>>Dokter</option>
                                <option value="asdok" <?= $user->jabatan == 'asdok' ? 'selected' : '' ?>>Asisten Dokter</option>
                                <option value="apoteker" <?= $user->jabatan == 'apoteker' ? 'selected' : '' ?>>Apoteker</option>
                                <option value="resepsionis" <?= $user->jabatan == 'resepsionis' ? 'selected' : '' ?>>Resepsionis</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>