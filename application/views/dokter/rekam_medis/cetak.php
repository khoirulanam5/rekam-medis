<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Medis</title>
</head>

<body>
    <style type="text/css">
        body {
            background: #efefef;
            font-family: arial;
        }

        #wrapshopcart {
            width: 70%;
            margin: 3em auto;
            padding: 30px;
            background: #fff;
            box-shadow: 0 0 15px #ddd;
        }

        h1 {
            margin: 0;
            padding: 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        p {
            font-size: 1em;
            margin: 0;
        }

        table {
            margin: 2em 0 0 0;
            border: 1px solid #eee;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        table th {
            background: #fafafa;
            border: none;
            padding: 20px;
            font-weight: normal;
            text-align: left;
        }

        table td {
            background: #fff;
            border: none;
            padding: 12px 20px;
            font-weight: normal;
            text-align: left;
            border-top: 1px solid #eee;
        }

        table tr.total td {
            font-size: 1.5em;
        }

        .btnsubmit {
            display: inline-block;
            padding: 10px;
            border: 1px solid #ddd;
            background: #eee;
            color: #000;
            text-decoration: none;
            margin: 2em 0;
        }

        form {
            margin: 2em 0 0 0;
        }

        label {
            display: inline-block;
            width: auto;
        }

        input[type=text] {
            border: 1px solid #bbb;
            padding: 10px;
            width: 30em;
        }

        textarea {
            border: 1px solid #bbb;
            padding: 10px;
            width: 30em;
            height: 5em;
            vertical-align: text-top;
            margin: 0.3em 0 0 0;
        }

        .submitbtn {
            font-size: 1.5em;
            display: inline-block;
            padding: 10px;
            border: 1px solid #ddd;
            background: #eee;
            color: #000;
            text-decoration: none;
            margin: 0.5em 0 0 8em;
        }

        ;
    </style>
</body>
<div id="wrapshopcart">
    <center>
        <h2>REKAM MEDIS PASIEN <BR />KLINIK PRATAMA BEN MARI JUWANA</h2>
        </p>
    </center>
    <table width="100%" border="0">
        <tr>
            <td>Nama Pasien</td>
            <td><?= $rekam->nama ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td> <?= tgl_indo($detail->tgl_lahir) ?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?= $detail->jekel ?></td>
        </tr>
        <tr>
            <td>Berat Badan</td>
            <td><?= $detail->bb ?> Kg</td>
        </tr>
        <tr>
            <td>Tinggi Badan</td>
            <td><?= $detail->tb ?> Cm</td>
        </tr>
    </table>
    <?php foreach ($detailRekam as $p) : ?>
        <center>
            <h3>Tanggal Periksa</h3>
        </center>
        <table width="100%" border="0">
            <tr>
                <td>Tanggal Periksa</td>
                <td><?= tgl_indo($p->tanggal_periksa) ?></td>
            </tr>
        </table>
        <center>
            <h3>Keluhan</h3>
        </center>
        <table width="100%" border="0">
            <tr>
                <td>Keluhan</td>
                <td><?= $p->keterangan ?></td>
            </tr>
        </table>
        <center>
            <h3>Diagnosa Pemeriksaan</h3>
        </center>
        <table width="100%" border="0">
            <tr>
                <td>Diagnosa</td>
                <td><?= $p->diagnosa ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <?php if ($p->rawat_inap == 'ya') : ?>
                        <!-- Rawat Inap (Kontrol : <?= tgl_indo($p->tanggal_kontrol) ?>) -->
                    <?php else : ?>
                        Rawat Jalan
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <center>
            <h3>Resep</h3>
        </center>
        <table width="100%" border="0">
            <?php foreach ($p->obat as $q) : ?>
                <tr>
                    <td>Obat</td>
                    <td><?= $q->nama_obat ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endforeach; ?>

</html>
<script>
    window.print();
</script>