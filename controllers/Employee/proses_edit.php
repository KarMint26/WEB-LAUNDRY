<?php

require_once '../../db/Connection.php';
$idkaryawan = $_POST['id_karyawan'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl'];
$bidang_layanan = $_POST['bdlayanan'];
$gender = $_POST['gender'];

$sql = "UPDATE karyawan SET nama_karyawan='$nama', alamat='$alamat', tgl_lahir='$tgl_lahir', bidang_layanan='$bidang_layanan', gender_id_gender='$gender' WHERE id_karyawan='$idkaryawan'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    echo json_encode(['success' => $query]);
    exit;
} else {
    echo json_encode(['failed' => $query]);
    exit;
}
