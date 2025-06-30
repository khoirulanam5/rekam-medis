<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style type="text/css">
        body {
            font-family: arial;
            background-color: #ffffff;
        }

        .rangkasurat {
            width: 980px;
            margin: 0 auto;
            background-color: #ffffff;
            height: auto;
            padding: 20px;
        }

        .background-image {
            opacity: 0.1;
            position: absolute;
            left: 40%;
            top: 35%;
            width: 25%;
            height: 30%;
            background-position: 50%;
        }

        table {
            border-bottom: 5px solid #000;
            padding: 2px;
        }

        .tengah-header {
            text-align: center;
            line-height: 10px;
            font-weight: 400;
            color: #007b21;
        }

        .align-center {
            text-align: center;
        }

        .gambar {
            margin-left: 20px;
        }

        .font-weight-bold {
            font-weight: 900;
        }

        .line {
            height: 1px;
            border-top: 2px solid #007b21;
            border-bottom: 2px solid #007b21;
        }

        .align-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        table.no-border,
        table.no-border td {
            border: 0;
        }

        table.no-border tr {
            line-height: 150%;
        }

        table.with-border {
            width: 100%;
            border-bottom: 0;
            border: 1px solid #000;
            border-collapse: collapse;
        }

        table.with-border td,
        table.with-border th,
        table.with-border tr {
            border: 1px solid #000;
            border-collapse: collapse;
        }

        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .row {
            display: flow-root;
            flex-wrap: wrap;
        }

        .form {
            padding-left: 35px;
            padding-right: 30px;
        }

        .note-kriteria {
            font-size: 17px;
            font-weight: 900;
        }

        .mt-5 {
            margin-top: 5px;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .mt-40 {
            margin-top: 40px;
        }

        .mt-50 {
            margin-top: 50px;
        }

        .mt-100 {
            margin-top: 100px;
        }

        .col-6-left {
            float: left;
        }

        .col-6-right {
            float: right;
        }

        .form-control {
            border: 1px solid #000;
            padding: 5px;
            width: 100%;
        }

        .header-left {
            padding-top: 40px;
            float: left;
        }
    </style>
</head>

<body>
    <div class="rangkasurat">
        <table width="100%">
            <tr>
                <td class="tengah-header">
                    <h2 class="font-weight-bold">KLINIK PRATAMA BEN MARI JUWANA</h2>
                    <h3 class="font-weight-bold">BUKTI PEMBAYARAN</h3>
                    <h3 class="font-weight-bold">KODE PEMBAYARAN : <?= $pembayaran->kode_pembayaran ?></h3>
                    <p class="font-weight-bold">Alamat: Jl. Hang Tuah No.163, Bajomulyo, Kec. Juwana, Kabupaten Pati, Jawa Tengah</p>
                </td>
            </tr>
        </table>
        <div class="container">
            <div class="row">
                <div class="col-6-left">
                    <table class="table no-border">
                        <tr>
                            <td>NO. R.M</td>
                            <td>:</td>
                            <td><?= $pembayaran->no_rekam ?></td>
                        </tr>
                        <tr>
                            <td>NIK</td>
                            <td>:</td>
                            <td><?= $pembayaran->nik ?></td>
                        </tr>
                        <tr>
                            <td>Pasien</td>
                            <td>:</td>
                            <td><?= $pembayaran->nama ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td><?= $pembayaran->alamat ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-6-right">
                    <table class="table no-border">
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?= tgl_indo($pembayaran->tanggal) ?></td>
                        </tr>
                        <tr>
                            <td>KLINIK</td>
                            <td>:</td>
                            <td>PRATAMA BEN MARI JUWANA</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="mt-20">
                <span class="font-weight-bold">OBAT : </span>
            </div>
            <div class="mt-10">
                <table class="table with-border">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Obat</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Takaran</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php $no = 1;
                            $total = 0;
                            foreach ($resep as $row) :
                                $total += $row->harga * $row->jumlah;
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="text-center"><?= $row->nama_obat ?></td>
                                    <td class="text-center">Rp. <?= number_format($row->harga, 0, ".", ".") ?></td>
                                    <td class="text-center"><?= $row->jumlah ?></td>
                                    <td class="text-center"><?= $row->takaran ?>x Sehari</td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div>
                <div>
                    <div class="mt-50">
                        <div class="col-6-left">
                            <div class="text-center">
                                <p>Mengetahui,</p>
                                <p>Dokter Pemeriksa</p>
                                <div class="mt-100">
                                    <p>____________________</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-6-right">
                            <div class="text-center">
                                <p>Pati, <?= tgl_indo(date('Y-m-d')) ?></p>
                                <p>Klinik Pratama</p>
                                <div class="mt-100">
                                    <p>____________________</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    window.print();
</script>

</html>