<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
        <?= $this->session->flashdata('message'); ?>
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
                        <h4 class="card-title">Data User</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row justify-content-between mb-4">
                            <div class="col-sm-6 col-md-6">
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <div class="user-list-files d-flex">
                                    <a href="<?= base_url('resepsionis/user/create') ?>" class="btn btn-sm btn-primary">Tambah Data</a>
                                </div>
                            </div>
                        </div>
                        <table id="datatable" class="table data-table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nomor Hp</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user as $index => $u) : ?>
                                    <tr>
                                        <td><?= $index + 1  ?></td>
                                        <td><?= $u->username ?></td>
                                        <td><?= $u->nama ?></td>
                                        <td><?= $u->alamat ?></td>
                                        <td><?= $u->no_hp ?></td>
                                        <td><?= $u->jabatan ?></td>
                                        <td>
                                            <a href="<?= base_url('resepsionis/user/edit/') . $u->id_user ?>" class="btn btn-primary">Edit</a>
                                            <a href="<?= base_url('resepsionis/user/delete/') . $u->id_user ?>" class="btn btn-danger">Hapus</a>
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