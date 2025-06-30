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
                        <h4 class="card-title">Verifikasi Pendaftaran Pasien</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Nomor Hp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($verifications as $index => $verif) : ?>
                                    <tr>
                                        <td><?= $index + 1  ?></td>
                                        <td><?= $verif->nama ?></td>
                                        <td><?= $verif->alamat ?></td>
                                        <td><?= $verif->no_hp ?></td>
                                        <td>
                                            <a href="<?= base_url('resepsionis/verifikasi/setujui/') . $verif->id_pasien ?>" class="btn btn-success">Setujui</a>
                                            <!-- <a href="<?= base_url('resepsionis/verifikasi/tolak/') . $verif->id_pasien ?>" class="btn btn-danger">Tolak</a> -->
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