<?php

require_once '../../db/Connection.php';
$id_pelayanan = $_POST['id_ply'];
$sql = "DELETE FROM pelayanan WHERE id_pelayanan='$id_pelayanan'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    echo json_encode(['success' => $query]);
    exit;
} else {
    echo json_encode(['failed' => $query]);
    exit;
}
