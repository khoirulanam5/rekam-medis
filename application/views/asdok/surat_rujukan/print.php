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
            margin-left: 50px;
        }

        table.no-border tr {
            line-height: 150%;
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
            padding-left: 30px;
            padding-right: 30px;
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
                    <h3 class="font-weight-bold">SURAT RUJUKAN PASIEN</h3>
                    <h3 class="font-weight-bold">NOMOR SURAT : <?= $surat->no_surat ?></h3>
                    <p class="font-weight-bold">Alamat: Jl. Hang Tuah No.163, Bajomulyo, Kec. Juwana, Kabupaten Pati, Jawa Tengah
                    </p>
                </td>
            </tr>
        </table>
        <div class="container">
            <div class="header-left">
                <span>Kepada Yth.</span>
                <div class="mt-5">
                    Ts. Dokter
                </div>
                <div class="mt-5">
                    Rumah Sakit : <span><?= $surat->rumah_sakit ?></span>
                </div>

                <div class="mt-30">
                    Dengan Hormat,
                </div>

                <div class="mt-20">
                    <p>Sehubungan dengan adanya pasien yang memerlukan pelayanan kesehatan, maka kami mohon bantuan Bapak/Ibu untuk dapat melayani pasien tersebut dengan baik dan benar.</p>
                </div>
            </div>
            <div>
                <table class="table no-border">
                    <tr class="ml-10">
                        <td>NIK</td>
                        <td>:</td>
                        <td><?= $surat->nik ?></td>
                    </tr>
                    <tr class="ml-10">
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><?= ucwords($surat->nama) ?></td>
                    </tr>
                    <tr class="ml-10">
                        <td>Alamat Pasien</td>
                        <td>:</td>
                        <td><?= ucwords($surat->alamat) ?></td>
                    </tr>
                    <tr class="ml-10">
                        <td>Diagnosa</td>
                        <td>:</td>
                        <td><?= $surat->diagnosa ?></td>
                    </tr>
                </table>
            </div>
            <div class="mt-10">
                <p>Demikian surat rujukan ini kami sampaikan, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</p>
            </div>
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
                            <p>Jepara, <?= tgl_indo(date('Y-m-d')) ?></p>
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
</body>
<script>
    window.print();
</script>

</html>