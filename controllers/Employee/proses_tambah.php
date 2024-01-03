<?php

require_once '../../db/Connection.php';

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$tgl_lahir = $_POST['tgl'];
$bidang_layanan = $_POST['bdlayanan'];
$gender = $_POST['gender'];

// Mendapatkan nilai maksimum id_karyawan dari tabel karyawan
$sql_max_id = "SELECT MAX(id_karyawan) AS max_id FROM karyawan";
$result = mysqli_query($koneksi, $sql_max_id);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];

    // Menambahkan 1 untuk nilai berikutnya
    $idkaryawan = $max_id + 1;

    // Query untuk memasukkan data baru dengan id_karyawan yang sudah di-generate
    $sql = "INSERT INTO karyawan (id_karyawan, nama_karyawan, alamat, tgl_lahir, bidang_layanan, gender_id_gender) VALUES ('$idkaryawan', '$nama', '$alamat', '$tgl_lahir', '$bidang_layanan', '$gender')";

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
