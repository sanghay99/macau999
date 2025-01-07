<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pakar Diagnose Perawatan Kulit Wajah</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .page-header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
        }
        .entry-title {
            margin: 0;
        }
        .entry-body {
            padding: 20px;
        }
        .card {
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .bg-primary {
            background-color: #007bff !important;
        }
    </style>
</head>
<body>

<div class="page-header text-center" style="background-color: #85C1E9;">
    <h1 class="entry-title" style="font-size: 32px;">Sistem Pakar Diagnose Perawatan Kulit Wajah</h1>
</div>
<div class="row">
            <div class="col-sm-6 col-lg-6 text-center">
                <div class="card mb-4 text-white" style="background-color: #85C1E9;font-size: 18px;">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <?php
                            $q = esc_field(_get('q'));
                            $rows = $db->get_results("SELECT * FROM tb_gejala WHERE nama_gejala LIKE '%$q%' ORDER BY kode_gejala");
                            $jumlah_gejala = count($rows);
                        ?>
                        <h1><?php echo $jumlah_gejala; ?></h1>
                        <div>Data Gejala</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 text-center">
                <div class="card mb-4 text-white" style="background-color: #85C1E9;font-size: 18px">
                    <div class="card-body pb-0 d-flex justify-content-between align-items-start">
                        <?php
                            $q = esc_field(_get('q'));
                            $rows = $db->get_results("SELECT * FROM tb_diagnosa WHERE nama_diagnosa LIKE '%$q%' ORDER BY kode_diagnosa");
                            $jumlah_penyakit = count($rows);
                        ?>
                        <h1><?php echo $jumlah_penyakit; ?></h1>
                        <div>Data Penyakit</div>
                    </div>
                </div>
            </div>
        </div>
<div class="entry-body flex-grow-1 px-3">
    <h2 class="text-center" style="font-size:26px"><b>
        Dapatkan Perawatan Kulit Wajah yang Tepat</b>
    </h2>
    <p class="text-center" style="font-size:12px">
        Kami bertujuan untuk membantu Anda mendapatkan kulit wajah yang sehat dan terawat dengan mendiagnosa kondisi kulit menggunakan metode Certainy Factor.
    </p>
    <br>
     <div class="container">
        <div class="row" style="border: 1px;">
            <div class="col-md-6 text-center">
                <h3 style="font-size:22px"><b>Prediksi Akurat Berbasis AI</b></h3>
                <p style="font-size:12px">
                    Sistem kami memberikan prediksi akurat tentang kondisi kulit wajah Anda dengan menggunakan metode Certainy Factor, mengidentifikasi berbagai gejala dan kondisi kulit untuk memberikan rekomendasi perawatan yang tepat.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <h3 style="font-size:22px"><b>Temukan Pola dan Solusi Perawatan Kulit Anda</b></h3>
                <p style="font-size:12px">
                    Pahami kondisi unik kulit wajah Anda, temukan pola dari gejala yang muncul, dan ketahui apakah kondisi yang Anda alami memerlukan perawatan khusus.
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
