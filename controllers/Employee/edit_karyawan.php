<?php

require_once '../../db/Connection.php';
$id_karyawan = $_GET['id_karyawan'];
$sql = "SELECT * FROM karyawan WHERE id_karyawan='$id_karyawan'";
$query = mysqli_query($koneksi, $sql);

?>

<?php require_once '../../config/header.php' ?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="shortcut icon" href="../../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Tambah Karyawan</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active">
			<h1><a href="../index.php" class="logo">L.</a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="active">
					<a href="../../index.php"><span class="fa fa-home"></span> Home</a>
				</li>
				<li>
					<a href="../../views/customer.php"><span class="fa fa-users"></span> Customer</a>
				</li>
				<li>
					<a href="../../views/employee.php"><span class="fa fa-id-card"></span> Karyawan</a>
				</li>
				<li>
					<a href="../../views/jenislayanan.php"><span class="fa fa-cogs"></span> Layanan</a>
				</li>
				<li>
					<a href="../../views/pelayanan.php"><span class="fa fa-money"></span> Pelayanan</a>
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

			<?php while($karyawan = mysqli_fetch_assoc($query)) { ?>

			<h2 class="mb-4">Edit Karyawan Laundry</h2>
			<form action="./proses_edit.php" method="GET">
				<input type="text" name="id_karyawan" hidden
					value="<?= $karyawan['id_karyawan'] ?>">
				<div class="mb-3 mt-3">
					<label for="nama" class="form-label">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="John Doe"
						value="<?= $karyawan['nama_karyawan'] ?>">
				</div>
				<div class="mb-3">
					<label for="alamat" class="form-label">Alamat</label>
					<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jl. Pahlawan No. 5"
						value="<?= $karyawan['alamat'] ?>">
				</div>
				<div class="mb-3">
					<label for="tgl" class="form-label">Tanggal Lahir</label>
					<input type="text" class="form-control" name="tgl" id="tgl" placeholder="2023-06-12"
						value="<?= $karyawan['tgl_lahir'] ?>">
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="bdlayanan" class="form-label">Bidang Layanan</label>
					<select class="custom-select" aria-label="Default select example" id="bdlayanan" name="bdlayanan">
						<option value="">Pilih Bidang Layanan</option>
						<option value="Setrika" <?php if ($karyawan['bidang_layanan'] == "Setrika") {
						    echo 'selected';
						} ?>>Setrika
						</option>
						<option value="Cuci Kering" <?php if ($karyawan['bidang_layanan'] == "Cuci Kering") {
						    echo 'selected';
						} ?>>Cuci
							Kering</option>
						<option value="Cuci Biasa" <?php if ($karyawan['bidang_layanan'] == "Cuci Biasa") {
						    echo 'selected';
						} ?>>Cuci
							Biasa</option>
						<option value="Layanan Pengharuman" <?php if ($karyawan['bidang_layanan'] == "Layanan Pengharuman") {
						    echo 'selected';
						} ?>>Layanan
							Pengharuman</option>
						<option value="Layanan Pengantaran" <?php if ($karyawan['bidang_layanan'] == "Layanan Pengantaran") {
						    echo 'selected';
						} ?>>Layanan
							Pengantaran</option>
					</select>

				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="gender" class="form-label">Jenis Kelamin</label>
					<select class="custom-select" aria-label="Default select example" id="gender" name="gender">
						<option value="">Pilih Jenis Kelamin</option>
						<option value="0" <?php if ($karyawan['gender_id_gender'] == "0") {
						    echo 'selected';
						} ?>>Perempuan
						</option>
						<option value="1" <?php if ($karyawan['gender_id_gender'] == "1") {
						    echo 'selected';
						} ?>>Laki-Laki
						</option>
					</select>

				</div>
				<div class="d-flex justify-content-end">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>

			<?php } ?>
		</div>
	</div>
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/popper.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/main.js"></script>
	<?php require_once '../../config/footer.php' ?>