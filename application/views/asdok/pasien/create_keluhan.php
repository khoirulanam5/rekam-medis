<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Keluhan Pasien</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('asdok/pasien/keluhan/store') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $pasien->id_pasien ?>">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Nama Lengkap:</label>
                                    <input type="text" class="form-control" value="<?= $pasien->nama ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal:</label>
                                    <input type="text" class="form-control" value="<?= tgl_indo(date('Y-m-d')) ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Riwayat Penyakit:</label>
                                    <input type="text" name="riwayat_penyakit" class="form-control" placeholder="Tambahkan riwayat penyalit jika ada">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Keterangan Keluhan:</label>
                                    <textarea name="keterangan" class="form-control" cols="5" rows="2"></textarea>
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