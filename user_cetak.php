<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Daftar Pengguna</title>
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
    <h1>Laporan Daftar Pengguna</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>User</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php
	
	$rows = $db->get_results("SELECT * FROM tb_admin ORDER BY kode_user");
    $no = 0;
	foreach ($rows as $row) : ?>
		<tr>
			<td><?= ++$no ?></td>
            <td><?= $row->kode_user ?></td>
            <td><?= $row->nama_user ?></td>
            <td><?= $row->user ?></td>
            <td><?= $row->level ?></td>
		</tr>
	<?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
