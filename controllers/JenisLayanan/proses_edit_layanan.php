<?php

require_once '../../db/Connection.php';
$idlayanan = $_POST['id_layanan'];
$nama_layanan = $_POST['namalayanan'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$sql = "UPDATE jenis_layanan SET nama_layanan='$nama_layanan', harga='$harga', deskripsi='$deskripsi' WHERE id_layanan='$idlayanan'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    echo json_encode(['success' => $query]);
    exit;
} else {
    echo json_encode(['failed' => $query]);
    exit;
}
