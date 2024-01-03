<?php

require_once '../../db/Connection.php';
$id_karyawan = $_POST['id_karyawan'];
$sql = "DELETE FROM karyawan WHERE id_karyawan='$id_karyawan'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    echo json_encode(['success' => $query]);
    exit;
} else {
    echo json_encode(['failed' => $query]);
    exit;
}
