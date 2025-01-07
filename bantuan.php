<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - Sistem Pakar Diagnose Perawatan Kulit Wajah</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .content h4 {
            color: #333;
            margin-bottom: 20px;
            font-weight: 400;
        }
        .content p {
            color: #666;
            line-height: 1.8;
        }
        .content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        .custom-list {
            padding-left: 20px;
            list-style-type: none;
        }
        .custom-list li {
            position: relative;
            margin-bottom: 10px;
        }
        .custom-list li::before {
            content: "✔";
            position: absolute;
            left: -20px;
            color: #28a745;
        }
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            .content h4, .content p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tentang Sistem</h1>
        </div>
        <div class="content" style="text-align: justify;">
            <h4 class="text-center">
                Sistem Pakar Diagnose Perawatan Kulit Wajah adalah aplikasi kesehatan berbasis AI yang membantu Anda dalam mendiagnosa dan merawat kulit wajah menggunakan metode Certainty Factor.
            </h4>
            <div class="text-center">
                <img class="mb-5" src="assets/images/main.png" alt="Perawatan Kulit Wajah">
            </div>
            <h4>
                <p><b>Memungkinkan Anda untuk mengontrol kesehatan kulit wajah Anda</b></p>
                <p>Kami mendukung setiap orang yang mengalami masalah kulit wajah dengan prediksi berdasarkan gejala yang dipersonalisasi, asisten kesehatan virtual, dan wawasan tentang perawatan kulit wajah.</p>
            </h4>
            <h4>
                <p><b>Memberikan informasi kesehatan ahli untuk semua</b></p>
                <p>Informasi kesehatan berbasis bukti harus tanpa syarat dan tersedia untuk semua orang. Kami bekerja sama dengan tim besar ahli dermatologi dan organisasi kesehatan kulit untuk menyediakan informasi yang dapat Anda percayai.</p>
            </h4>
            <h4>
                <p><b>Menjaga informasi pribadi tetap pribadi dan aman</b></p>
                <p>Privasi di era digital adalah yang paling penting. Sistem kami menyediakan platform yang aman untuk semua orang.</p>
            </h4>
        </div>
        
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
