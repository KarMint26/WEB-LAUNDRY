<?php
require_once '../db/Connection.php';

$sql = "SELECT id_customer, nama_customer, alamat, tgl_lahir, kontak, CASE WHEN gender_id_gender = '1' THEN 'Laki-Laki' ELSE 'Perempuan' END AS gender FROM customer";

$query = mysqli_query($koneksi, $sql);
if (!$query) {
    die("Query failed: " . mysqli_error($koneksi));
}

$count = 1;
?>
<?php session_start(); ?>
<?php if(isset($_SESSION['session_username'])) { ?>
<?php require_once '../config/header.php' ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="shortcut icon" href="../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Customer</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active">
			<h1><a href="../" class="logo">L.</a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="active">
					<a href="../"><span class="fa fa-home"></span> Beranda</a>
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
				<li>
					<a href="../auth/logout.php"><span class="fa fa-sign-out"></span> Logout</a>
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

			<h2 class="mb-4">Data Customer Loundry</h2>
			<table class="table table-hover table-bordered table-md w-100 text-center">
				<div class="w-100 d-flex justify-content-between mb-3" style="gap: 1rem;">
					<div class="fs-2">Manajemen Data Customer Laundry</div>
					<a href="../controllers/Customer/tambah.php" class="btn btn-primary d-flex align-items-center"
						style="gap: .5rem;">
						<i class="fa fa-plus"></i>
						<div>Tambah Customer</div>
					</a>
				</div>
				<thead class="thead-dark">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Alamat</th>
						<th scope="col">Tanggal Lahir</th>
						<th scope="col">Kontak</th>
						<th scope="col">Gender</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php while($customer = mysqli_fetch_assoc($query)) { ?>
					<tr>
						<td scope="row">
							<p><?= $count ?></p>
						</td>
						<td><?= $customer['nama_customer'] ?>
						</td>
						<td><?= $customer['alamat'] ?>
						</td>
						<td><?= $customer['tgl_lahir'] ?>
						</td>
						<td><?= $customer['kontak'] ?>
						</td>
						<td><?= $customer['gender'] ?>
						</td>
						<td style="display: flex; justify-content: center; align-items: center; gap: 1rem;">
							<a class="btn btn-warning text-white d-flex align-items-center" style="gap: .3rem;"
								href="../controllers/Customer/edit_customer.php?id_customer=<?= $customer['id_customer'] ?>">
								<i class="fa fa-edit"></i>
								<div>Edit</div>
							</a>
							<a class="btn btn-danger text-white d-flex align-items-center"
								style="cursor: pointer; gap:.3rem;"
								onclick="deleteData(<?= $customer['id_customer'] ?>);">
								<i class="fa fa-trash"></i>
								<div>Hapus</div>
							</a>
						</td>
					</tr>
					<?php $count++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../js/main.js"></script>
	<script>
		async function deleteData(idcs) {
			// Kirim permintaan AJAX ke server
			await fetch('../controllers/Customer/hapus_customer.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'id_customer=' + encodeURIComponent(idcs),
				})
				.then(response => response.json())
				.then(data => {
					// Tampilkan pesan SweetAlert2 berdasarkan respons
					if (data.success) {
						Swal.fire(
							'Sukses!',
							'Data berhasil dihapus.',
							'success'
						).then((result) => {
							// Redirect ke halaman lain setelah pengguna menekan OK
							window.location.href = '../views/customer.php?hapus_customer=sukses';
						});
					} else {
						Swal.fire(
							'Gagal!',
							'Terjadi kesalahan saat menghapus data.',
							'error'
						);
						window.location.href = '../views/customer.php?hapus_customer=gagal';
					}
				});
		}
	</script>
	<?php require_once '../config/footer.php' ?>
	<?php } else { ?>
	<?php header("location: ../auth/login.php") ?>
	<?php } ?>