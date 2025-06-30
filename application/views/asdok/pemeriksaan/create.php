<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Data Pemeriksaan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('asdok/pemeriksaan/store') ?>" method="POST">
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Pasien:</label>
                                    <select name="pasien" class="form-control" required>
                                        <option value="">Pilih Pasien</option>
                                        <?php foreach ($pasien as $p) : ?>
                                            <option value="<?= $p->id_keluhan ?>"><?= $p->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Diagnosa:</label>
                                    <textarea name="diagnosa" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Tindakan Dokter:</label>
                                    <input type="text" name="tindakan" class="form-control" placeholder="Contoh : Infus" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Tindakan:</label>
                                    <br>
                                    <!-- <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline rtl-mr-0">
                                        <input type="radio" id="customRadio-1" name="rawat_inap" value="ya" class="custom-control-input bg-primary">
                                        <label class="custom-control-label" for="customRadio-1"> Ya </label>
                                    </div> -->
                                    <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline rtl-mr-0">
                                        <input type="radio" id="customRadio-2" name="rawat_inap" value="tidak" class="custom-control-input bg-danger">
                                        <label class="custom-control-label" for="customRadio-2"> Klik radio </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row" id="showKamar">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Pilih Kamar</label>
                                    <select name="kamar" class="form-control">
                                        <option value="">Pilih Kamar</option>
                                        <?php foreach ($kamar as $k) : ?>
                                            <optgroup label="<?= $k->nama_tingkat ?>">
                                                <option value="<?= $k->id_kamar ?>"><?= $k->nama_kamar ?></option>
                                            </optgroup>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div> -->
                        <div class="row" id="ShowStatus">
                            <div class="col-sm-12 col-lg-12">
                                <div class="form-group">
                                    <label>Status:</label>
                                    <br>
                                    <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline rtl-mr-0">
                                        <input type="radio" id="customRadioHasil-1" name="hasil_pemeriksaan" value="sembuh" class="custom-control-input bg-primary">
                                        <label class="custom-control-label" for="customRadioHasil-1"> Sembuh </label>
                                    </div>
                                    <!-- <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline rtl-mr-0">
                                        <input type="radio" id="customRadioHasil-2" name="hasil_pemeriksaan" value="meninggal" class="custom-control-input bg-danger">
                                        <label class="custom-control-label" for="customRadioHasil-2"> Meninggal </label>
                                    </div> -->
                                    <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline rtl-mr-0">
                                        <input type="radio" id="customRadioHasil-3" name="hasil_pemeriksaan" value="dirujuk" class="custom-control-input bg-warning">
                                        <label class="custom-control-label" for="customRadioHasil-3"> Dirujuk </label>
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
<script>
    $(document).ready(function() {
        $("#ShowStatus").hide();
        $("#showKamar").hide();
        $("#customRadio-1").on("change", function() {
            if ($(this).is(":checked")) {
                $("#ShowStatus").hide();
                $("#showKamar").show();
                $("input[name='kamar']").prop('required', true);
            }
        });
        $("#customRadio-2").on("change", function() {
            if ($(this).is(":checked")) {
                $("#ShowStatus").show();
                $("#showKamar").hide();
                $("input[name='kamar']").prop('required', false);
            }
        });
    });
</script>