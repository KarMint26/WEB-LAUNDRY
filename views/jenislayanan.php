<?php
require_once '../db/Connection.php';

$sql = "SELECT * FROM jenis_layanan";
$query = mysqli_query($koneksi, $sql);

$count = 1;
?>

<?php require_once '../config/header.php' ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="shortcut icon" href="../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Layanan</title>
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

			<h2 class="mb-4">Jenis Layanan Laundry</h2>
			<table class="table table-hover table-bordered table-md w-100 text-center">
				<div class="w-100 d-flex justify-content-between mb-3" style="gap: 1rem;">
					<div class="fs-2">Manajemen Data Karyawan Laundry</div>
					<a href="../controllers/JenisLayanan/tmbh_jenis_layanan.php"
						class="btn btn-primary d-flex align-items-center" style="gap: .5rem;">
						<i class="fa fa-plus"></i>
						<div>Tambah Jenis Layanan</div>
					</a>
				</div>
				<thead class="thead-dark">
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama Layanan</th>
						<th scope="col">Harga</th>
						<th scope="col">Estimasi Hari</th>
						<th scope="col">Deskripsi</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php while($jenis_layanan = mysqli_fetch_assoc($query)) { ?>
					<tr>
						<td scope="row">
							<?= $count ?>
						</td>
						<td><?= $jenis_layanan['nama_layanan'] ?>
						</td>
						<td><?= $jenis_layanan['harga'] ?>
						</td>
						<td><?= $jenis_layanan['estimasi_hari'] ?>
						</td>
						<td><?= $jenis_layanan['deskripsi'] ?>
						</td>
						<td style="display: flex; justify-content: center; align-items: center; gap: 1rem;">
							<a class="btn btn-warning text-white d-flex align-items-center" style="gap: .3rem;"
								href="../controllers/JenisLayanan/edit_jenis_layanan.php?id_layanan=<?= $jenis_layanan['id_layanan'] ?>">
								<i class="fa fa-edit"></i>
								<div>Edit</div>
							</a>
							<a class="btn btn-danger text-white d-flex align-items-center"
								style="cursor: pointer; gap: .3rem;"
								onclick="deleteData(<?= $jenis_layanan['id_layanan'] ?>);">
								<i class="fa fa-trash"></i>
								<div>Hapus</div>
							</a>
						</td>
					</tr>
					<?php $count++; } ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../js/main.js"></script>
	<script>
		async function deleteData(id_layanan) {
			// Kirim permintaan AJAX ke server
			await fetch('../controllers/JenisLayanan/hapus_jenis_layanan.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'id_layanan=' + encodeURIComponent(id_layanan),
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
							window.location.href = '../views/jenislayanan.php';
						});
					} else {
						Swal.fire(
							'Gagal!',
							'Terjadi kesalahan saat menghapus data.',
							'error'
						);
					}
				});
		}
	</script>
	<?php require_once '../config/footer.php' ?>