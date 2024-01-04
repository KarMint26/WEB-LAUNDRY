<?php require_once '../../config/header.php' ?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="shortcut icon" href="../../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Jenis Layanan</title>
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

			<h2 class="mb-4">Tambah Jenis Layanan</h2>
			<form action="./proses_tambah.php" method="POST" onsubmit="event.preventDefault(); submitForm();">
				<div class="mb-3 mt-3">
					<label for="namalayanan" class="form-label">Nama Layanan</label>
					<input type="text" class="form-control" name="namalayanan" id="namalayanan"
						placeholder="Cuci Biasa">
				</div>
				<div class="mb-3">
					<label for="harga" class="form-label">Harga</label>
					<input type="text" class="form-control" name="harga" id="harga" placeholder="5000">
				</div>
				<div class="mb-3">
					<label for="estimasihari" class="form-label">Estimasi Hari</label>
					<input type="text" class="form-control" name="estimasihari" id="estimasihari" placeholder="2">
				</div>
				<div class="mb-3">
					<label for="deskripsi" class="form-label">Deskripsi</label>
					<input type="text" class="form-control" name="deskripsi" id="deskripsi"
						placeholder="Pencucian pakaian menggunakan deterjen biasa tanpa perlakuan khusus.">
				</div>
				<div class="d-flex justify-content-end">
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	<script src="../../js/jquery.min.js">
		< /> <
		script src = "../../js/popper.js" >
	</script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../../js/main.js"></script>
	<script>
		async function submitForm() {
			// Ambil data dari form
			const namalayanan = document.getElementById('namalayanan').value;
			const harga = document.getElementById('harga').value;
			const estimasihari = document.getElementById('estimasihari').value;
			const deskripsi = document.getElementById('deskripsi').value;

			// Kirim permintaan AJAX ke server
			await fetch('./proses_tambah.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'namalayanan=' + encodeURIComponent(namalayanan) + '&harga=' + encodeURIComponent(harga) +
						'&estimasihari=' +
						encodeURIComponent(estimasihari) + '&deskripsi=' + encodeURIComponent(deskripsi),
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
							window.location.href = '../../views/jenislayanan.php';
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