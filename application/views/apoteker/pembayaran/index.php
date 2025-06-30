<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        <?php if ($this->session->flashdata('success') == TRUE) : ?>
                            <div class="alert text-white bg-success" role="alert">
                                <div class="iq-alert-text"><?= $this->session->flashdata('success') ?></div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ri-close-line"></i>
                                </button>
                            </div>
                        <?php endif; ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Pembayaran</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pasien</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pembayaran as $p) : ?>
                                    <tr>
                                        <td><?= $no++  ?></td>
                                        <td><?= $p->nama ?></td>
                                        <td>Rp. <?= number_format(($p->harga_opname) + ($p->harga_dokter * $p->jumlah_visit) + $p->harga_obat + $p->harga_tindakan, 0, ".", ".") ?></td>
                                        <td>
                                            <a href="<?= base_url('apoteker/pembayaran/detail/') . $p->id_rekam_medis ?>" class="btn btn-primary">Detail & Bayar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>