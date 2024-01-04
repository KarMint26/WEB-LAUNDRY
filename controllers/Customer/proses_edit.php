<?php

require_once '../../db/Connection.php';
$idcustomer= $_POST['id_customer'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$kontak = $_POST['kontak'];
$gender = $_POST['gender'];

$sql = "UPDATE customer SET nama_customer ='$nama', tgl_lahir='$tgl_lahir', alamat='$alamat', kontak='$kontak', gender_id_gender='$gender' WHERE id_customer='$idcustomer'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    echo json_encode(['success' => $query]);
    exit;
} else {
    echo json_encode(['failed' => $query]);
    exit;
}


?>