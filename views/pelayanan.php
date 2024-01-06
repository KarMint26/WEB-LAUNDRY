<?php
require_once '../db/Connection.php';

// Set default page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 10;

$count = 1;

if($page > 1) {
    $count = (($page - 1) * 10) + 1;
} else {
    $count = 1;
}

// Get total records
$sql = "SELECT COUNT(*) FROM pelayanan";
$query = mysqli_query($koneksi, $sql);
$total_records = mysqli_fetch_array($query)[0];

// Calculate total pages
$total_pages = ceil($total_records / $records_per_page);

// Get offset
$offset = ($page - 1) * $records_per_page;

// Get records for current page
$sql = "SELECT * FROM pelayanan LIMIT $offset,$records_per_page";
$query = mysqli_query($koneksi, $sql);


?>

<?php session_start(); ?>
<?php if(isset($_SESSION['session_username'])) { ?>
<?php require_once '../config/header.php' ?>
<link rel="stylesheet" href="../css/style.css">
<link rel="shortcut icon" href="../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Pelayanan</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active">
			<h1><a href="../index.php" class="logo">L.</a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="active">
					<a href="../index.php"><span class="fa fa-home"></span> Beranda</a>
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

			<h2 class="mb-4">Pelayanan</h2>
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-md w-100 text-center">
					<div class="w-100 d-flex justify-content-between mb-3" style="gap: 1rem;">
						<div class="fs-2">Manajemen Data Karyawan Laundry</div>
						<a href="../controllers/Pelayanan/tambah_pelayanan.php"
							class="btn btn-primary d-flex align-items-center" style="gap: .5rem;">
							<i class="fa fa-plus"></i>
							<div>Tambah Pelayanan</div>
						</a>
					</div>
					<thead class="thead-dark">
						<tr>
							<th scope="col">No</th>
							<th scope="col">Tgl Pelayanan</th>
							<th scope="col">Nama Layanan</th>
							<th scope="col">Estimasi Hari</th>
							<th scope="col">Customer ID</th>
							<th scope="col">Jenis Layanan ID</th>
							<th scope="col">Karyawan ID</th>
							<th scope="col">Status</th>
							<th scope="col">Bobot</th>
							<th scope="col">Tarif</th>
							<th scope="col">Tgl Selesai</th>
							<th scope="col">Tgl Pengambilan</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php while($pelayanan = mysqli_fetch_assoc($query)) { ?>
						<tr>
							<td scope="row">
								<?= $count ?>
							</td>
							<td><?= $pelayanan['tgl_pelayanan'] ?>
							</td>
							<td><?= $pelayanan['nama_layanan'] ?>
							</td>
							<td><?= $pelayanan['estimasi_hari'] ?>
							</td>
							<td><?= $pelayanan['customer_id_customer'] ?>
							</td>
							<td><?= $pelayanan['jenis_layanan_id_layanan'] ?>
							</td>
							<td><?= $pelayanan['karyawan_id_karyawan'] ?>
							</td>
							<td><?= $pelayanan['status_id_status'] == 0 ? "Sedang Diproses" : "Selesai" ?>
							</td>
							<td><?= $pelayanan['bobot'] ?>
							</td>
							<td><?= $pelayanan['tarif'] ?>
							</td>
							<td><?= $pelayanan['tgl_selesai'] ?>
							</td>
							<td><?= $pelayanan['tgl_pengambilan'] ?>
							</td>
							<td
								style="display: flex; justify-content: center; align-items: center; gap: 1rem; height: 80px;">
								<a class="btn btn-danger text-white d-flex align-items-center"
									style="cursor: pointer; gap: .5rem; width: 190px;"
									onclick="deleteData(<?= $pelayanan['id_pelayanan'] ?>);">
									<i class="fa fa-trash"></i>
									<div>Hapus Pelayanan</div>
								</a>
							</td>
						</tr>
						<?php $count++;
						} ?>
					</tbody>
				</table>
				<nav aria-label="Page navigation example" class="text-center"
					style="width: 600px; margin: 1rem auto 0;">
					<h1 style="font-size: 1.5rem;">Navigation Page</h1>
					<ul class="pagination justify-content-center flex-wrap" style="gap: .5rem;">
						<?php
						    for ($i = 1; $i <= $total_pages; $i++) {
						        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
						    }
    ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/popper.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../js/main.js"></script>
	<script>
		async function deleteData(id_ply) {
			// Kirim permintaan AJAX ke server
			await fetch('../controllers/Pelayanan/hapus_pelayanan.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'id_ply=' + encodeURIComponent(id_ply),
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
							window.location.href = '../views/pelayanan.php?hapus_pelayanan=sukses';
						});
					} else {
						Swal.fire(
							'Gagal!',
							'Terjadi kesalahan saat menghapus data.',
							'error'
						);
						window.location.href = '../views/pelayanan.php?hapus_pelayanan=gagal';
					}
				});
		}
	</script>
	<?php require_once '../config/footer.php' ?>
	<?php } else { ?>
	<?php header("location: ../auth/login.php") ?>
	<?php } ?>