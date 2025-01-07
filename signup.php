<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan - Sistem Pakar Diagnose Perawatan Kulit Wajah</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
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
<div class="login-container">
    <h1>Daftar</h1>
        <?php if ($_POST) include 'aksi.php'; ?>
        <form method="post">
            <div class="form-group" hidden>
                <label>Kode <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="kode" value="<?= set_value('kode_user', kode_oto('kode_user', 'tb_admin', 'U', 3)) ?>" />
            </div>
            <div class="form-group">
                <label>Nama Lengkap <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap" autofocus />
            </div>
            <div class="form-group">
                <label>Username <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Username" name="user" autofocus />
            </div>
            <div class="form-group">
                <label>Password <span class="text-danger">*</span></label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="pass" />
            </div>
           <!--  <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level">
                    <option value="">&nbsp;</option>
                    <?= get_level_option('level') ?>
                </select>
            </div> -->
              <div class="form-group">
                <label>Level</label>
                <input type="text" class="form-control" value="user" name="level" readonly autofocus />
            </div>
             <div class="form-group">
                <button class="btn btn-primary" style="width:100%" type="submit"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
            </div>
        </form>
      </div>

 <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            var icon = document.getElementById('togglePassword');
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>