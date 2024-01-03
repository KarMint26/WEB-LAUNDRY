<?php

require_once '../../db/Connection.php';
$sql = "SELECT nama_layanan FROM jenis_layanan";
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
			<h1><a href="../../index.php" class="logo">L.</a></h1>
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

			<h2 class="mb-4">Tambah Karyawan Laundry</h2>
			<form action="./proses_tambah.php" method="POST" onsubmit="event.preventDefault(); submitForm();">
				<div class="mb-3 mt-3">
					<label for="nama" class="form-label">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="John Doe" required>
				</div>
				<div class="mb-3">
					<label for="alamat" class="form-label">Alamat</label>
					<input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jl. Pahlawan No. 5"
						required>
				</div>
				<div class="mb-3">
					<label for="tgl" class="form-label">Tanggal Lahir</label>
					<input type="text" class="form-control" name="tgl" id="tgl" placeholder="2023-06-12" required>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="bdlayanan" class="form-label">Bidang Layanan</label>
					<select class="custom-select" aria-label="Default select example" id="bdlayanan" name="bdlayanan"
						required>
						<option selected disabled>Pilih Bidang Layanan</option>
						<?php while($layanan = mysqli_fetch_assoc($query)) { ?>
						<option
							value="<?= $layanan['nama_layanan'] ?>">
							<?= $layanan['nama_layanan'] ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="gender" class="form-label">Jenis Kelamin</label>
					<select class="custom-select" aria-label="Default select example" id="gender" name="gender"
						required>
						<option selected disabled>Pilih Jenis Kelamin</option>
						<option value="0">Perempuan</option>
						<option value="1">Laki-Laki</option>
					</select>
				</div>
				<div class="d-flex justify-content-end">
					<button type="submit" class="btn btn-success d-flex align-items-center" style="gap: .5rem;">
						<i class="fa fa-save"></i>
						<div>Simpan Data</div>
					</button>
				</div>
			</form>
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
			const nama = document.getElementById('nama').value;
			const alamat = document.getElementById('alamat').value;
			const tgl = document.getElementById('tgl').value;
			const bdlayanan = document.getElementById('bdlayanan').value;
			const gender = document.getElementById('gender').value;

			// Kirim permintaan AJAX ke server
			await fetch('./proses_tambah.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'nama=' + encodeURIComponent(nama) + '&alamat=' + encodeURIComponent(alamat) + '&tgl=' +
						encodeURIComponent(tgl) + '&bdlayanan=' + encodeURIComponent(bdlayanan) + '&gender=' +
						encodeURIComponent(gender),
				})
				.then(response => response.json())
				.then(data => {
					// Tampilkan pesan SweetAlert2 berdasarkan respons
					if (data.success) {
						Swal.fire(
							'Sukses!',
							'Data berhasil disimpan.',
							'success'
						).then((result) => {
							// Redirect ke halaman lain setelah pengguna menekan OK
							window.location.href = '../../views/employee.php';
						});
					} else {
						Swal.fire(
							'Gagal!',
							'Terjadi kesalahan saat menyimpan data.',
							'error'
						);
					}
				});
		}
	</script>
	<?php require_once '../../config/footer.php' ?>