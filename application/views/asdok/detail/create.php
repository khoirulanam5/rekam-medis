<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Detail Pasien</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('asdok/detail/store') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $pasien->id_pasien ?>">
                        <div class="row">
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Nama Lengkap:</label>
                                    <input type="text" class="form-control" value="<?= $pasien->nama ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Alamat Lengkap:</label>
                                    <input type="text" class="form-control" value="<?= $pasien->alamat ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Nomor Hp:</label>
                                    <input type="text" class="form-control" value="<?= $pasien->no_hp ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Tanggal Lahir:</label>
                                    <input type="date" class="form-control" name="tgl_lahir" required>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin:</label>
                                    <select name="jekel" class="form-control" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Pekerjaan:</label>
                                    <input type="text" class="form-control" name="pekerjaan" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <label>Berat Badan:</label>
                                <div class="input-group mb-4">
                                    <input type="number" class="form-control" name="bb" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <label>Tinggi Badan:</label>
                                <div class="input-group mb-4">
                                    <input type="number" class="form-control" name="tb" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>