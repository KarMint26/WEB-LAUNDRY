<?php

require_once '../../db/Connection.php';
$id_layanan = $_POST['id_layanan'];
$sql = "DELETE FROM jenis_layanan WHERE id_layanan='$id_layanan'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    echo json_encode(['success' => $query]);
    exit;
} else {
    echo json_encode(['failed' => $query]);
    exit;
}
