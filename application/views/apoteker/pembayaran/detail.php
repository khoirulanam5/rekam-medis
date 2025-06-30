<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-block card-stretch card-height print rounded">
                <div class="card-header d-flex justify-content-between bg-primary header-invoice">
                    <div class="iq-header-title">
                        <h4 class="card-title mb-0">Invoice#<?= $kode ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-12 ">
                            <table>
                                <thead>
                                    <tr>
                                        <td>Nama </td>
                                        <td>: </td>
                                        <td><?= $pembayaran->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat </td>
                                        <td>: </td>
                                        <td><?= $pembayaran->alamat ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Hp </td>
                                        <td>: </td>
                                        <td><?= $pembayaran->no_hp ?></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Tanggal Periksa</th>
                                            <th scope="col">Biaya Obat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= tgl_indo($pembayaran->tanggal_periksa) ?></td>
                                            <td>
                                                Rp. <?= number_format($pembayaran->harga_obat, 0, ".", ".") ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5 class="mb-3">Rincian Obat</h5>
                            <div class="table-responsive-sm">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col"></th>
                                            <th scope="col">Obat</th>
                                            <th scope="col">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resep as $index => $p) : ?>
                                            <tr>
                                                <th class="text-center" scope="row"><?= $index + 1 ?></th>
                                                <td>
                                                    <h6 class="mb-0"><?= $p->nama_obat ?></h6>
                                                    <p class="mb-0">1 Hari <?= $p->takaran ?>x
                                                    </p>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0"><?= $p->jumlah ?></h6>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <form action="<?= base_url('apoteker/pembayaran/store') ?>" method="POST">
                        <input type="hidden" name="id" value="<?= $pembayaran->id_rekam_medis ?>">
                        <input type="hidden" name="id_pasien" value="<?= $pembayaran->id_pasien ?>">
                        <input type="hidden" name="kode" value="<?= $kode ?>">
                        <div class="d-flex justify-content-center">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="email">Biaya Dokter:</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" value="<?= $dokter->harga  ?>" class="form-control rupiah" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email">Jumlah Visit:</label>
                                    <div class="input-group mb-4">
                                        <input type="number" name="jumlah_visit" value="<?= $pembayaran->jumlah_visit ?>" id="jmlVisit" class="form-control" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">x</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email">Biaya Opname:</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" value="<?= $pembayaran->harga_opname  ?>" class="form-control rupiah" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="email">Jumlah Hari:</label>
                                    <div class="input-group mb-4">
                                        <input type="number" name="jumlah_hari" value="<?= $pembayaran->jumlah_hari ?>" id="jmlHari" class="form-control" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">x</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="email">Jumlah Pembayaran:</label>
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" name="jumlah_pembayaran" value="<?= $pembayaran->harga_obat ?>" class="form-control" id="format-rupiah" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-block btn-primary">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        var dokter = <?= $dokter->harga ?>;
        var opname = <?= $pembayaran->harga_opname ?>;
        var obat = <?= $pembayaran->harga_obat ?>;
        var visit = $('#jmlVisit').val() * dokter;
        var rawat = $('#jmlHari').val() * opname;
        var total = visit + rawat + obat;
        $('#format-rupiah').val(total);

    });
</script>