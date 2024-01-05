<?php

require_once '../../db/Connection.php';

$tgl_pl = $_POST['tgl_pl'];
$bdlayanan = $_POST['bdlayanan'];
$estimasi_hari = $_POST['estimasi_hari'];
$customer = $_POST['customer'];
$id_lyn = $_POST['id_lyn'];
$karyawan = $_POST['karyawan'];
$status = $_POST['status'];
$bobot = $_POST['bobot'];
$tarif = $_POST['tarif'];
$tgl_sl = $_POST['tgl_sl'];
$tgl_pgbl = $_POST['tgl_pgbl'];

// Mendapatkan nilai maksimum id_pelayanan dari tabel pelayanan
$sql_max_id = "SELECT MAX(id_pelayanan) AS max_id FROM pelayanan";
$result = mysqli_query($koneksi, $sql_max_id);

if ($result) {
   $row = mysqli_fetch_assoc($result);
   $max_id = $row['max_id'];

   // Menambahkan 1 untuk nilai berikutnya
   $idpelayanan = $max_id + 1;

   // Query untuk memasukkan data baru dengan id_pelayanan yang sudah di-generate
   $sql = "INSERT INTO pelayanan (id_pelayanan, tgl_pelayanan, nama_layanan, estimasi_hari, customer_id_customer, jenis_layanan_id_layanan, karyawan_id_karyawan, status_id_status, bobot, tarif, tgl_selesai, tgl_pengambilan) VALUES ('$idpelayanan', '$tgl_pl', '$bdlayanan', '$estimasi_hari', '$customer', '$id_lyn', '$karyawan', '$status', '$bobot', '$tarif', '$tgl_sl', '$tgl_pgbl')";

   $query = mysqli_query($koneksi, $sql);

   if ($query) {
       echo json_encode(['success' => $query]);
       exit;
   } else {
       echo json_encode(['failed' => $query]);
       exit;
   }
} else {
   echo json_encode(['failed' => $query]);
   exit;
}
