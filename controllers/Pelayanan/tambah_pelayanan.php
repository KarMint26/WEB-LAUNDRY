<?php

require_once '../../db/Connection.php';
$sql = "SELECT id_layanan, nama_layanan FROM jenis_layanan";
$query = mysqli_query($koneksi, $sql);

$sql_2 = "SELECT id_customer, nama_customer FROM customer";
$query_2 = mysqli_query($koneksi, $sql_2);

$sql_3 = "SELECT id_karyawan, nama_karyawan FROM karyawan";
$query_3 = mysqli_query($koneksi, $sql_3);

?>

<?php session_start(); ?>
<?php if(isset($_SESSION['session_username'])) { ?>
<?php require_once '../../config/header.php' ?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="shortcut icon" href="../../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Tambah Pelayanan</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<nav id="sidebar" class="active">
			<h1><a href="../../" class="logo">L.</a></h1>
			<ul class="list-unstyled components mb-5">
				<li class="active">
					<a href="../../"><span class="fa fa-home"></span> Beranda</a>
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

			<h2 class="mb-4">Tambah Data Pelayanan Laundry</h2>
			<form action="./proses_tambah.php" method="POST" onsubmit="event.preventDefault(); submitForm();">
				<div class="mb-3">
					<label for="tgl_pl" class="form-label">Tanggal Pelayanan</label>
					<input type="date" class="form-control" name="tgl_pl" id="tgl_pl" placeholder="2023-06-12" required>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="id_lyn" class="form-label">ID Layanan</label>
					<select class="custom-select" aria-label="Default select example" id="id_lyn" name="id_lyn"
						required>
						<option selected disabled>Pilih ID Layanan</option>
						<?php while($ly = mysqli_fetch_assoc($query)) { ?>
						<option
							value="<?= $ly['id_layanan'] ?>"
							data-name="<?= $ly['nama_layanan'] ?>">
							<?= $ly['id_layanan'] ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="bdlayanan" class="form-label">Nama Layanan</label>
					<input type="text" class="form-control" name="bdlayanan" id="bdlayanan" placeholder="Setrika"
						required disabled>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="customer" class="form-label">Customer</label>
					<select class="custom-select" aria-label="Default select example" id="customer" name="customer"
						required>
						<option selected disabled>Pilih Customer</option>
						<?php while($customer = mysqli_fetch_assoc($query_2)) { ?>
						<option
							value="<?= $customer['id_customer'] ?>">
							<?= $customer['nama_customer'] ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="karyawan" class="form-label">Karyawan</label>
					<select class="custom-select" aria-label="Default select example" id="karyawan" name="karyawan"
						required>
						<option selected disabled>Pilih Karyawan</option>
						<?php while($karyawan = mysqli_fetch_assoc($query_3)) { ?>
						<option
							value="<?= $karyawan['id_karyawan'] ?>">
							<?= $karyawan['nama_karyawan'] ?>
						</option>
						<?php } ?>
					</select>
				</div>
				<div class="mb-3 d-flex flex-column">
					<label for="status" class="form-label">Status</label>
					<select class="custom-select" aria-label="Default select example" id="status" name="status"
						required>
						<option selected disabled>Pilih Status</option>
						<option value="0">
							Sedang Diproses
						</option>
						<option value="1">
							Selesai
						</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="bobot" class="form-label">Bobot Laundry</label>
					<input type="number" class="form-control" name="bobot" id="bobot" placeholder="10 (kg)" required>
				</div>
				<div class="mb-3">
					<label for="tarif" class="form-label">Tarif Laundry</label>
					<input type="number" class="form-control" name="tarif" id="tarif" placeholder="10000" required
						disabled>
				</div>
				<div class="mb-3">
					<label for="estimasi_hari" class="form-label">Estimasi Hari</label>
					<input type="number" class="form-control" name="estimasi_hari" id="estimasi_hari"
						placeholder="2 (Hari)" required>
				</div>
				<div class="mb-3">
					<label for="tgl_sl" class="form-label">Tanggal Selesai</label>
					<input type="date" class="form-control" name="tgl_sl" id="tgl_sl" placeholder="2023-06-14" required>
				</div>
				<div class="mb-3">
					<label for="tgl_pgbl" class="form-label">Tanggal Penambilan</label>
					<input type="date" class="form-control" name="tgl_pgbl" id="tgl_pgbl" placeholder="2023-06-15"
						required>
				</div>
				<div class="d-flex justify-content-end">
					<button type="submit" class="btn btn-success d-flex align-items-center" style="gap: .5rem;">
						<i class="fa fa-save"></i>
						<div>Simpan Data Pelayanan</div>
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
		// Penentuan karyawan yang akan memegang atau menghandle jenis layanan yang dipilih
		document.getElementById('id_lyn').addEventListener('change', function() {
			var selectedOption = this.options[this.selectedIndex];
			var layananName = selectedOption.dataset.name;
			document.getElementById('bdlayanan').value = layananName;

			// Kirim permintaan AJAX ke server
			fetch('./get_karyawan.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'bd_lyn=' + encodeURIComponent(document.getElementById('bdlayanan').value),
				})
				.then(response => response.json())
				.then(data => {
					// Ubah opsi dropdown karyawan
					var karyawanDropdown = document.getElementById('karyawan');
					karyawanDropdown.innerHTML = '';
					for (var i = 0; i < data.length; i++) {
						var option = document.createElement('option');
						option.value = data[i]['id_karyawan'];
						option.text = data[i]['nama_karyawan'];
						karyawanDropdown.add(option);
					}
				});
		});

		// Perhitungan Harga tergantung bobot
		document.getElementById('bobot').addEventListener('change', function() {
			var selectedOption = document.getElementById('id_lyn').options[document.getElementById('id_lyn')
				.selectedIndex];
			var layananId = selectedOption.value;

			// Kirim permintaan AJAX ke server
			fetch('./get_harga.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'id_lyn=' + encodeURIComponent(layananId),
				})
				.then(response => response.json())
				.then(data => {
					// Hitung tarif baru
					var tarifBaru = this.value * data['harga'];

					// Update nilai tarif
					document.getElementById('tarif').value = tarifBaru;
				});
		});

		// Tambah data
		async function submitForm() {
			// Ambil data dari form
			const tgl_pl = document.getElementById('tgl_pl').value;
			const bdlayanan = document.getElementById('bdlayanan').value;
			const estimasi_hari = document.getElementById('estimasi_hari').value;
			const customer = document.getElementById('customer').value;
			const id_lyn = document.getElementById('id_lyn').value;
			const karyawan = document.getElementById('karyawan').value;
			const status = document.getElementById('status').value;
			const bobot = document.getElementById('bobot').value;
			const tarif = document.getElementById('tarif').value;
			const tgl_sl = document.getElementById('tgl_sl').value;
			const tgl_pgbl = document.getElementById('tgl_pgbl').value;

			// Kirim permintaan AJAX ke server
			await fetch('./proses_tambah.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'tgl_pl=' + encodeURIComponent(tgl_pl) + '&bdlayanan=' + encodeURIComponent(bdlayanan) +
						'&estimasi_hari=' +
						encodeURIComponent(estimasi_hari) + '&customer=' + encodeURIComponent(customer) + '&id_lyn=' +
						encodeURIComponent(id_lyn) + '&karyawan=' + encodeURIComponent(karyawan) + '&status=' +
						encodeURIComponent(status) + '&bobot=' + encodeURIComponent(bobot) + '&tarif=' +
						encodeURIComponent(tarif) + '&tgl_sl=' + encodeURIComponent(tgl_sl) + '&tgl_pgbl=' +
						encodeURIComponent(tgl_pgbl),
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
							window.location.href = '../../views/pelayanan.php?tambah_pelayanan=sukses';
						});
					} else {
						Swal.fire(
							'Gagal!',
							'Terjadi kesalahan saat menyimpan data.',
							'error'
						);
						window.location.href = '../../views/pelayanan.php?tambah_pelayanan=gagal';
					}
				});
		}
	</script>
	<?php require_once '../../config/footer.php' ?>
	<?php } else { ?>
	<?php header("location: ../../auth/login.php") ?>
	<?php } ?>