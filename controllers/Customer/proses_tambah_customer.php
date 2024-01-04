<?php
require_once '../../db/Connection.php';

$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$gender = $_POST['gender'];

// Mendapatkan nilai maksimum id_karyawan dari tabel karyawan
$sql_max_id = "SELECT MAX(id_customer) AS max_id FROM customer";
$result = mysqli_query($koneksi, $sql_max_id);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];

    $id_customer = $max_id + 1;


    $sql = "INSERT INTO customer (id_customer, nama_customer, tgl_lahir, alamat, kontak, gender_id_gender) VALUES ('$id_customer', '$nama', '$tgl_lahir', '$alamat', '$kontak', '$gender')";


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
