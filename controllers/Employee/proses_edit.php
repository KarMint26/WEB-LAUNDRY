<?php

require_once '../../db/Connection.php';
$idkaryawan = $_GET['id_karyawan'];
$nama = $_GET['nama'];
$alamat = $_GET['alamat'];
$tgl_lahir = $_GET['tgl'];
$bidang_layanan = $_GET['bdlayanan'];
$gender = $_GET['gender'];

$sql = "UPDATE karyawan SET nama_karyawan='$nama', alamat='$alamat', tgl_lahir='$tgl_lahir', bidang_layanan='$bidang_layanan', gender_id_gender='$gender' WHERE id_karyawan='$id_karyawan'";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:../../views/employee.php?edit=sukses");
} else {
    header("location:../../views/employee.php?edit=gagal");
}

?>