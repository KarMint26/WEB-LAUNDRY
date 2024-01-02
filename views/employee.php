<?php
require_once '../db/Connection.php';

$sql = "SELECT id_karyawan, nama_karyawan, alamat, tgl_lahir, bidang_layanan, CASE WHEN gender_id_gender = '1' THEN 'Laki-Laki' ELSE 'Perempuan' END AS gender FROM karyawan";
$query = mysqli_query($koneksi, $sql);
?>

<?php require_once '../config/header.php' ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="shortcut icon" href="../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Karyawan</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active">
			<h1><a href="../index.php" class="logo">L.</a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="active">
					<a href="../index.php"><span class="fa fa-home"></span> Home</a>
				</li>
				<li>
					<a href="./customer.php"><span class="fa fa-users"></span> Customer</a>
				</li>
				<li>
					<a href="./employee.php"><span class="fa fa-id-card"></span> Karyawan</a>
				</li>
				<li>
					<a href="./jenislayanan.php"><span class="fa fa-cogs"></span> Layanan</a>
				</li>
				<li>
					<a href="./pelayanan.php"><span class="fa fa-money"></span> Pelayanan</a>
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

			<h2 class="mb-4">Data Karyawan Laundry</h2>
			<table class="table table-hover table-bordered table-md w-100 text-center">
			<div class="w-100 d-flex justify-content-end mb-3" style="gap: 1rem;">
				<a href="../controllers/Employee/tambah_karyawan.php" class="btn btn-primary">Tambah</a>
			</div>
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Bidang Layanan</th>
	  <th scope="col">Gender</th>
	  <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php while($karyawan = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td scope="row"><?= $karyawan['id_karyawan'] ?></td>
            <td><?= $karyawan['nama_karyawan'] ?></td>
            <td><?= $karyawan['alamat'] ?></td>
			<td><?= $karyawan['tgl_lahir'] ?></td>
			<td><?= $karyawan['bidang_layanan'] ?></td>
			<td><?= $karyawan['gender'] ?></td>
            <td style="display: flex; justify-content: center; align-items: center; gap: 1.5rem;">
                <a class="btn btn-warning" href="../controllers/Employee/edit_karyawan.php?id_karyawan=<?= $karyawan['id_karyawan'] ?>">Edit</a>
                <a class="btn btn-danger" href="../controllers/Employee/hapus_karyawan.php?id_karyawan=<?= $karyawan['id_karyawan'] ?>">Hapus</a>
            </td>
        </tr>
    <?php } ?>
  </tbody>
</table>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main.js"></script>
	<?php require_once '../config/footer.php' ?>