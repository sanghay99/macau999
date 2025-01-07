<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Diagnosa</title>
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

<h1>Hasil Diagnosa Perawatan Kulit Wajah</h1>
<?php
echo "<p>Tanggal Cetak: " . date("d-m-Y") . "</p>";

$rows = $db->get_results("SELECT * FROM tb_gejala WHERE kode_gejala IN (SELECT kode_gejala FROM tb_konsultasi WHERE jawaban='Ya')");
?>
<h3>Gejala Terpilih</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Gejala</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row->nama_gejala ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php
$rows = $db->get_results("SELECT * 
    FROM tb_relasi r INNER JOIN tb_diagnosa d ON d.kode_diagnosa = r.kode_diagnosa      
    WHERE r.kode_gejala IN (SELECT kode_gejala FROM tb_konsultasi WHERE jawaban='Ya') ORDER BY r.kode_diagnosa, r.kode_gejala");
$diagnosa = array();
foreach ($rows as $row) {
    if (!isset($diagnosa[$row->kode_diagnosa]['cf']))
        $diagnosa[$row->kode_diagnosa]['cf'] = 0;
    $diagnosa[$row->kode_diagnosa]['cf'] = $diagnosa[$row->kode_diagnosa]['cf'] + $row->cf * (1 - $diagnosa[$row->kode_diagnosa]['cf']);
}
?>
<h3>Hasil Analisa</h3>
<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Diagnosa</th>
            <th>Kepercayaan</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    function ranking($array)
    {
        $new_arr = array();
        foreach ($array as $key => $value) {
            $new_arr[$key] = $value['cf'];
        }
        arsort($new_arr);

        $result = array();
        $no = 0;
        foreach ($new_arr as $key => $value) {
            $result[$key] = ++$no;
        }
        return $result;
    }

    $rank = ranking($diagnosa);

    foreach ($rank as $key => $value) : ?>
        <tr class="<?= ($value == 1) ? 'text-primary' : '' ?>">
            <td><?= $no++ ?></td>
            <td><?= $DIAGNOSA[$key]->nama_diagnosa ?></td>
            <td><?= round($diagnosa[$key]['cf'] * 100, 2) ?>%</td>
        </tr>
    <?php endforeach;
    reset($rank);
    ?>
</table>

<table>
    <tr>
        <td>Diagnosa</td>
        <td><?= $DIAGNOSA[key($rank)]->nama_diagnosa ?></td>
    </tr>
    <tr>
        <td>Solusi</td>
        <td><?= $DIAGNOSA[key($rank)]->keterangan ?></td>
    </tr>
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
