<?php
require_once '../../db/Connection.php';

if (!empty($_POST['bd_lyn'])) {
  $bd_lyn = $_POST['bd_lyn'];
  $sql = "SELECT id_karyawan, nama_karyawan FROM karyawan WHERE bidang_layanan = '$bd_lyn'";
  $query = mysqli_query($koneksi, $sql);
  $karyawan = [];
  while ($row = mysqli_fetch_assoc($query)) {
     $karyawan[] = $row;
  }
  echo json_encode($karyawan);
}
?>
