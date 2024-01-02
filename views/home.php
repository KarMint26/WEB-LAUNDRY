<?php require_once './config/header.php' ?>
<link rel="stylesheet" href="./css/style.css">
<link rel="shortcut icon" href="./images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active">
			<h1><a href="./index.php" class="logo">L.</a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="active">
					<a href="./index.php"><span class="fa fa-home"></span> Home</a>
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
					<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<i class="fa fa-bars"></i>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="#">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#about">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#contact">Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<h2 class="mb-4">Home Laundry</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
				fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
				dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
				ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
				fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
				deserunt mollit anim id est laborum.</p>

			<div id="carouselExampleIndicators" class="carousel slide w-50" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100 rounded" src="https://images.pexels.com/photos/5591956/pexels-photo-5591956.jpeg?auto=compress&cs=tinysrgb&w=600" alt="First slide" />
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 rounded" src="https://images.pexels.com/photos/4700400/pexels-photo-4700400.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Second slide /">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100 rounded" src="https://images.pexels.com/photos/5591460/pexels-photo-5591460.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Third slide" />
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<script src="./js/jquery.min.js"></script>
	<script src="./js/popper.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/main.js"></script>
	<?php require_once './config/footer.php' ?>