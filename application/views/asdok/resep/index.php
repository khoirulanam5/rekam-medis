<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Buat Resep</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="target" action="<?= base_url('asdok/obat/store') ?>" method="POST">
                        <input type="hidden" name="total_obat">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Pasien:</label>
                                    <select name="pasien" class="form-control" required>
                                        <option value="">Pilih Pasien</option>
                                        <?php foreach ($pasien as $p) : ?>
                                        <option value="<?= $p->id_periksa ?>"><?= $p->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group mt-3">
                                    <label>Resep :</label>
                                    <table class="table table-bordered" id="tablecreate">
                                        <colgroup>
                                            <col width="50%">
                                            <col width="40%">
                                            <col width="10%">
                                        </colgroup>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <label>Obat : </label>
                                                        <select name="obat[]" class="form-control" required>
                                                            <option value="">Pilih Obat</option>
                                                            <?php foreach ($obat as $p) : ?>
                                                            <option value="<?= $p->id_obat ?>"
                                                                data-harga="<?= $p->harga ?>"><?= $p->nama_obat ?>
                                                            </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label>Takaran :</label>
                                                        <div class="input-group mb-4">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">1 Hari</span>
                                                            </div>
                                                            <input type="number" class="form-control" name="takaran[]">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">X</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="actiontd">
                                                    <div class="d-flex align-items-center" style="gap:5px">
                                                        <button type="button" class="btn btn-danger hps mr-1 mt-1"
                                                            style="display:none">X</button>
                                                        <button type="button"
                                                            class="btn btn-success add ml-1 mt-1">Tambah</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label class="mr-3">Kontrol <small class="text-danger">Ceklist jika opname</small>
                                        :</label>
                                    <div class="custom-control custom-checkbox custom-control-inline rtl-mr-0">
                                        <input type="checkbox" class="custom-control-input" name="kontrol" id="customCheck5">
                                        <label class="custom-control-label" for="customCheck5">Ya</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="tgl_kontrol" style="display: none;">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Tanggal Kontrol :</label>
                                    <input type="date" class="form-control" name="tgl_kontrol">
                                </div>
                            </div>
                        </div> -->
                        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('.add').on('click', function () {
        let elm = $('#tablecreate tr:first').clone();
        elm.find('.actiontd .add').remove();
        elm.find('.actiontd .hps').show();
        elm.find('select').val('').trigger('change');
        elm.find('input').val('');
        $(elm).insertAfter('#tablecreate tr:first')
    });
    $('#tablecreate').on('click', '.hps', function () {
        let parent = $(this).parent().parent().parent().remove();
    });

    $("#target").submit(function (event) {
        event.preventDefault();
        let total = 0;
        $('select[name="obat[]"] option:selected').each((i, v) => {
            total += Number($(v).data('harga'))
        });
        $('input[name=total_obat]').val(total);
        this.submit();
    });
    var checkbox = document.getElementById('customCheck5');
    var delivery_div = document.getElementById('tgl_kontrol');
    checkbox.onclick = function () {
        if (this.checked) {
            delivery_div.style['display'] = 'block';
        } else {
            delivery_div.style['display'] = 'none';
        }
    };
</script>