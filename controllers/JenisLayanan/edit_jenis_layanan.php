<?php

require_once '../../db/Connection.php';
$id_layanan = $_GET['id_layanan'];
$sql = "SELECT * FROM jenis_layanan WHERE id_layanan='$id_layanan'";
$query = mysqli_query($koneksi, $sql);

?>

<?php session_start(); ?>
<?php if(isset($_SESSION['session_username'])) { ?>
<?php require_once '../../config/header.php' ?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="shortcut icon" href="../../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Edit Jenis Layanan</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active">
			<h1><a href="../../index.php" class="logo">L.</a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="active">
					<a href="../../index.php"><span class="fa fa-home"></span> Beranda</a>
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
				<li>
					<a href="../../auth/logout.php"><span class="fa fa-sign-out"></span> Logout</a>
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

			<?php while($jenis_layanan = mysqli_fetch_assoc($query)) { ?>

			<h2 class="mb-4">Edit Jenis Layanan Laundry</h2>
			<form action="./proses_edit.php" method="POST" onsubmit="event.preventDefault(); submitForm();">
				<input id="idlayanan" type="text" name="id_layanan" hidden
					value="<?= $jenis_layanan['id_layanan'] ?>">
				<div class="mb-3 mt-3">
					<label for="nama" class="form-label">Nama Layanan</label>
					<input type="text" class="form-control" name="namalayanan" id="namalayanan" placeholder="Cuci Biasa"
						value="<?= $jenis_layanan['nama_layanan'] ?>">
				</div>
				<div class="mb-3">
					<label for="harga" class="form-label">Harga</label>
					<input type="text" class="form-control" name="harga" id="harga" placeholder="5000"
						value="<?= $jenis_layanan['harga'] ?>">
				</div>
				<div class="mb-3">
					<label for="tgl" class="form-label">Estimasi Hari</label>
					<input type="text" class="form-control" name="estimasihari" id="estimasihari" placeholder="1"
						value="<?= $jenis_layanan['estimasi_hari'] ?>">
				</div>
				<div class="mb-3">
					<label for="deskripsi" class="form-label">Deskripsi</label>
					<input type="text" class="form-control" name="deskripsi" id="deskripsi"
						placeholder="Pencucian pakaian menggunakan deterjen biasa tanpa perlakuan khusus"
						value="<?= $jenis_layanan['deskripsi'] ?>">
				</div>
				<div class="d-flex justify-content-end">
					<button type="submit" class="btn btn-info d-flex align-items-center" style="gap: .5rem;">
						<i class="fa fa-external-link"></i>
						<div>Update Jenis Layanan</div>
					</button>
				</div>
			</form>
			<?php } ?>
		</div>
	</div>
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/popper.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../../js/main.js"></script>
	<script>
		async function submitForm() {
			// Ambil data dari form
			const idlayanan = document.getElementById('idlayanan').value;
			const namalayanan = document.getElementById('namalayanan').value;
			const harga = document.getElementById('harga').value;
			const estimasihari = document.getElementById('estimasihari').value;
			const deskripsi = document.getElementById('deskripsi').value;


			// Kirim permintaan AJAX ke server
			await fetch('./proses_edit_layanan.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'id_layanan=' + encodeURIComponent(idlayanan) + '&namalayanan=' + encodeURIComponent(
							namalayanan) +
						'&harga=' + encodeURIComponent(harga) + '&estimasihari=' +
						encodeURIComponent(estimasihari) + '&deskripsi=' + encodeURIComponent(deskripsi),
				})
				.then(response => response.json())
				.then(data => {
					// Tampilkan pesan SweetAlert2 berdasarkan respons
					if (data.success) {
						Swal.fire(
							'Sukses!',
							'Data berhasil diupdate.',
							'success'
						).then((result) => {
							// Redirect ke halaman lain setelah pengguna menekan OK
							window.location.href = '../../views/jenislayanan.php?update_jenis_layanan=sukses';
						});
					} else {
						Swal.fire(
							'Gagal!',
							'Terjadi kesalahan saat melakukan update data.',
							'error'
						);
						window.location.href = '../../views/jenislayanan.php?update_jenis_layanan=gagal';
					}
				});
		}
	</script>
	<?php require_once '../../config/footer.php' ?>
	<?php } else { ?>
	<?php header("location: ../../auth/login.php") ?>
	<?php } ?>