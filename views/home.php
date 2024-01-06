<?php session_start(); ?>
<?php if(isset($_SESSION['session_username'])) { ?>
<?php require_once './config/header.php' ?>
<link rel="stylesheet" href="./css/style.css">
<link rel="shortcut icon" href="./images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active">
			<h1><a href="./" class="logo">L.</a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="active">
					<a href="./"><span class="fa fa-home"></span> Beranda</a>
				</li>
				<li>
					<a href="./views/customer.php"><span class="fa fa-users"></span> Customer</a>
				</li>
				<li>
					<a href="./views/employee.php"><span class="fa fa-id-card"></span> Karyawan</a>
				</li>
				<li>
					<a href="./views/jenislayanan.php"><span class="fa fa-cogs"></span> Layanan</a>
				</li>
				<li>
					<a href="./views/pelayanan.php"><span class="fa fa-money"></span> Pelayanan</a>
				</li>
				<li>
					<a href="./auth/logout.php"><span class="fa fa-sign-out"></span> Logout</a>
				</li>
			</ul>
			<div class="footer">
				<p>
					Copyright &copy; 2023 by <a href="https://homelaundry.my.id" class="text-white" target="_blank">Home
						Laundry</a>
				</p>
			</div>
		</nav>

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
						<i class="fa fa-bars"></i>
						<span class="sr-only">Toggle Menu</span>
					</button>
				</div>
			</nav>

			<div class="w-100 d-flex justify-content-between align-items-center">
				<div class="w-50">
					<h3 class="text-primary" style="font-weight: 600; font-size: 1.5rem;">Selamat Datang, Admin</h3>
					<h1 style="font-size: 4rem; font-weight: 600; transform: translateY(-20px);">Home Laundry</h1>
					<p style="transform: translateY(-20px);">Home Laundry Merupakan Platform Penyedia Layanan Laundry Terbaik Di Indonesia. Siap Melayani 24 Jam. Kami Ingin Pelanggan Merasa Puas Memakai Jasa Kami. Tersedia Berbagai Layanan Seperti Cuci, Setrika, Pengantaran, Pengharuman, Dan Lain Sebagainya.</p>
				</div>
				<img src="./images/Hero.svg" alt="hero" width="500px">
			</div>
		</div>
	</div>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/main.js"></script>
	<?php require_once './config/footer.php' ?>
	<?php } else { ?>
	<?php header("location: ./auth/login.php") ?>
	<?php } ?>