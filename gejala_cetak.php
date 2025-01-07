<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Gejala</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .kop {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 40px;
        }
        .kop-logo {
            margin-right: 20px;
        }
        .kop h2, .kop h4 {
            margin: 0;
        }
        .footer {
            margin-top: 40px;
        }
        .footer table {
            width: 100%;
            border: none;
        }
        .footer td {
            padding: 20px;
            border: none;
        }
        .no-print {
            display: none;
        }
        @media print {
            body {
                margin: 0;
            }
            .no-print {
                display: block;
            }
            h1 {
                margin-top: 0;
            }
        }
    </style>
</head>
<body>

<div class="kop">
    <img src="assets/images/logo.jpg" alt="Logo" class="kop-logo" width="100">
    <div>
        <h2>The Clinic unindraisme</h2>
        <p>Jl. Abdul Majid Raya Jl. Cipete Utara No.40D, RT.7/RW.2, Cipete Sel., Kec. Cilandak, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12410</p>
        <p>Telepon: 0821-6713-9000</p>
    </div>
</div>

<h1>Laporan Gejala</h1>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Gejala</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $q = esc_field(_get('q'));
        $rows = $db->get_results("SELECT * FROM tb_gejala 
        WHERE kode_gejala LIKE '%$q%' OR nama_gejala LIKE '%$q%' OR keterangan LIKE '%$q%' 
        ORDER BY kode_gejala");
        $no = 0;
        foreach ($rows as $row) : ?>
            <tr>
                <td><?= ++$no ?></td>
                <td><?= $row->kode_gejala ?></td>
                <td><?= $row->nama_gejala ?></td>
                <td><?= $row->keterangan ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<div class="footer">
    <table>
        <tr>
            <td></td>
            <td style="text-align: right;">
                <p>Jakarta, <?= date("d-m-Y") ?></p>
                <p>Manajer</p>
               <br><br>
                <p>______________________</p>
                <p>Signature</p>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
