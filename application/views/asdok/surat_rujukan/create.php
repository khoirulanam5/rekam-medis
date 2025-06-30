<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Surat Rujukan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('asdok/surat_rujukan/store') ?>" method="POST">
                        <input type="hidden" name="id_pasien" value="<?= $pemeriksaan->id_pasien ?>">
                        <input type="hidden" name="id_periksa" value="<?= $pemeriksaan->id_periksa ?>">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Surat:</label>
                                    <input type="text" class="form-control" name="no_surat" value="<?= tgl_indo(date('Y-m-d')) ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="form-group">
                                    <label>Nomor Surat:</label>
                                    <input type="text" class="form-control" name="no_surat" value="<?= 'PRATAMA-' . date('dmY') . rand(1, 1000) ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Nik Pasien:</label>
                                    <input type="text" class="form-control" value="<?= $pemeriksaan->nik ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Nama Pasien:</label>
                                    <input type="text" class="form-control" value="<?= $pemeriksaan->nama ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Alamat Pasien:</label>
                                    <input type="text" class="form-control" value="<?= $pemeriksaan->alamat ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3 col-lg-3">
                                <div class="form-group">
                                    <label>Nomor Hp:</label>
                                    <input type="text" class="form-control" value="<?= $pemeriksaan->no_hp ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Tanggal Lahir:</label>
                                    <input type="text" class="form-control" value="<?= tgl_indo($pasien->tgl_lahir) ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Jenis Kelamin:</label>
                                    <input type="text" class="form-control" value="<?= $pasien->jekel ?>" readonly>
                                </div>
                            </div>
                            <div class="col-sm-4 col-lg-4">
                                <div class="form-group">
                                    <label>Pekerjaan:</label>
                                    <input type="text" class="form-control" value="<?= $pasien->pekerjaan ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Rumah Sakit Tujuan:</label>
                                    <input type="text" name="rumah_sakit" class="form-control" placeholder="Contoh :RS Mardi Rahayu">
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