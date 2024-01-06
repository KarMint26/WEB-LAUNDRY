<?php

require_once '../../db/Connection.php';
$id_customer = $_GET['id_customer'];
$sql = "SELECT * FROM customer WHERE id_customer='$id_customer'";
$query = mysqli_query($koneksi, $sql);

?>

<?php session_start(); ?>
<?php if(isset($_SESSION['session_username'])) { ?>
<?php require_once '../../config/header.php'; ?>
<link rel="stylesheet" href="../../css/style.css">
<link rel="shortcut icon" href="../../images/washing-machine.ico" type="image/x-icon">
<title>Home Laundry | Edit Customer</title>
</head>

<body>
	<div class="wrapper d-flex align-items-stretch">
		<!-- Sidebar and Page Content -->
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

		<!-- Edit Customer Form -->
		<div id="content" class="p-4 p-md-5">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
						<i class="fa fa-bars"></i>
						<span class="sr-only">Toggle Menu</span>
					</button>
				</div>
			</nav>

			<?php while($customer = mysqli_fetch_assoc($query)) { ?>

			<h2 class="mb-4">Edit Customer Laundry</h2>
			<form action="./proses_edit.php" method="POST" onsubmit="event.preventDefault(); submitForm();">
				<input type="text" name="id_customer" id="id_customer" hidden
					value="<?= $customer['id_customer'] ?>">
				<div class="mb-3 mt-3">
					<label for="nama" class="form-label">Nama</label>
					<input type="text" class="form-control" name="nama" id="nama" placeholder="John Doe"
						value="<?=  $customer['nama_customer'] ?>">
				</div>
				<div class="mb-3">
					<label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
					<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="2023-06-12"
						value="<?= $customer['tgl_lahir'] ?>">
				</div>

				<div class="mb-3">
					<label for="alamat" class="form-label">Alamat</label>
					<input type="tex" class="form-control" name="alamat" id="alamat" placeholder="Jl. Pahlawan No. 5"
						value="<?= $customer['alamat'] ?>">
				</div>
				<div class="mb-3">
					<label for="kontak" class="form-label">Kontak</label>
					<input type="number" class="form-control" name="kontak" id="kontak" placeholder="0877-0992-0102"
						value="<?= $customer['kontak'] ?>">
				</div>

				<div class="mb-3 d-flex flex-column">
					<label for="gender" class="form-label">Jenis Kelamin</label>
					<select class="custom-select" aria-label="Default select example" id="gender" name="gender">
						<option selected disabled="">Pilih Jenis Kelamin</option>
						<option value="0" <?php if ($customer['gender_id_gender'] == "0") {
						    echo 'selected';
						} ?>>Perempuan
						</option>
						<option value="1" <?php if ($customer['gender_id_gender'] == "1") {
						    echo 'selected';
						} ?>>Laki-Laki
						</option>
					</select>
				</div>

				<div class="d-flex justify-content-end">
					<button type="submit" class="btn btn-info d-flex align-items-center" style="gap: .5rem;">
						<i class="fa fa-external-link"></i>
						<div>Update Data Customer</div>
					</button>
				</div>
			</form>

			<?php } ?>
		</div>
	</div>

	<!-- Include your JavaScript and footer -->
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/popper.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="../../js/main.js"></script>
	<script>
		async function submitForm() {
			// Ambil data dari form
			const id_customer = document.getElementById('id_customer').value;
			const nama = document.getElementById('nama').value;
			const tgl_lahir = document.getElementById('tgl_lahir').value;
			const alamat = document.getElementById('alamat').value;
			const kontak = document.getElementById('kontak').value;
			const gender = document.getElementById('gender').value;


			// Kirim permintaan AJAX ke server
			await fetch('./proses_edit.php', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/x-www-form-urlencoded',
					},
					body: 'id_customer=' + encodeURIComponent(id_customer) + '&nama=' + encodeURIComponent(nama) +
						'&tgl_lahir=' + encodeURIComponent(tgl_lahir) +
						'&alamat=' +
						encodeURIComponent(alamat) + '&kontak=' + encodeURIComponent(kontak) + '&gender=' +
						encodeURIComponent(gender),
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
							window.location.href = '../../views/customer.php?update_customer=sukses';
						});
					} else {
						Swal.fire(
							'Gagal!',
							'Terjadi kesalahan saat mengupdate data.',
							'error'
						);
						window.location.href = '../../views/customer.php?update_customer=gagal';
					}
				});
		}
	</script>

	<?php require_once '../../config/footer.php'; ?>
	<?php } else { ?>
	<?php header("location: ../../auth/login.php") ?>
	<?php } ?>