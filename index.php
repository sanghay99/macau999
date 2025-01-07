<?php
include 'functions.php';
//if(empty(_session('login')))
//header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="assets/images/logo.jpg" />

	<title>Sistem Pakar Perawatan Kulit Wajah</title>
	<link href="assets/css/yeti-bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/general.css" rel="stylesheet" />
	<link href="assets/css/select2.min.css" rel="stylesheet" />
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/select2.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$("select:not(.default)").select2();
		})
	</script>
	<style type="text/css">
		.navbar-brand img {
    height: auto;
    max-height: 40px; /* Sesuaikan ukuran logo sesuai kebutuhan */
}
	</style>
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #D1F2EB">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					
				</button>
				
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a class="navbar-brand" href="?">
					    <img src="assets/images/logo.jpg" alt="Nama Aplikasi" style="max-height: 100%; max-width: 100%;">
					</a>
					</li>
					<li><a class="navbar-brand" href="?"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
					<?php if (_session('level') == 'admin') : ?>
						<li><a href="?m=user"><span class="glyphicon glyphicon-user"></span> Daftar Pengguna</a></li>
						<li><a href="?m=diagnosa"><span class="glyphicon glyphicon-pushpin"></span> Diagnosa</a></li>
						<li><a href="?m=gejala"><span class="glyphicon glyphicon-flash"></span> Gejala</a></li>
						<li><a href="?m=relasi"><span class="glyphicon glyphicon-star"></span> Relasi</a></li>
						<li><a href="?m=rule"><span class="glyphicon glyphicon-star"></span> Rule</a></li>
						<li><a href="aksi.php?m=konsultasi&act=new"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li>
						<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
						<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout (<?= _session('login') ?>)</a></li>
					<?php elseif (_session('level') == 'user') : ?>
						<li><a href="?m=diagnosa_user"><span class="glyphicon glyphicon-pushpin"></span> Diagnosa</a></li>
						<li><a href="?m=gejala_user"><span class="glyphicon glyphicon-flash"></span> Gejala</a></li>
						<li><a href="aksi.php?m=konsultasi&act=new"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li>
						<li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
						<li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout (<?= _session('login') ?>)</a></li>
					<?php else : ?>
						<li><a href="?m=bantuan"><span class="glyphicon glyphicon-lock"></span> Bantuan</a></li>
						<li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li>
						<li><a href="?m=signup"><span class="glyphicon glyphicon-log-in"></span> Daftar</a></li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<?php
		if (!_session('login') && in_array($mod, array('diagnosa', 'gejala', 'relasi', 'rule', 'password')))
			$mod = 'home';

		if (file_exists($mod . '.php'))
			include $mod . '.php';
		else
			include 'home.php';
		?>
	</div>
	<footer class="footer" >
		<div class="container">
			<p>Copyright &copy; <?= date('Y') ?> The Clinic unindraisme | By kelompok z <em class="pull-right">Metode Certainy Factor</em></p>
		</div>
	</footer>
</body>

</html>