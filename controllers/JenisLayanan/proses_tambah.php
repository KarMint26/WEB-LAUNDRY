<?php
require_once '../../db/Connection.php';

$nl = $_POST['namalayanan'];
$harga = $_POST['harga'];
$estimasi_hari = $_POST['estimasihari'];
$deskripsi = $_POST['deskripsi'];


// Mendapatkan nilai maksimum id_layanan dari tabel jenis_layanan
$sql_max_id = "SELECT MAX(id_layanan)  AS max_id FROM jenis_layanan";
$result = mysqli_query($koneksi, $sql_max_id);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];

    // Menambahkan 1 untuk nilai berikutnya
    $idlayanan = $max_id + 1;

    // Query untuk memasukkan data baru dengan id_layanan yang sudah di-generate
    $sql = "INSERT INTO jenis_layanan VALUES ('$idlayanan', '$nl', '$harga', '$estimasi_hari', '$deskripsi')";

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
?>
