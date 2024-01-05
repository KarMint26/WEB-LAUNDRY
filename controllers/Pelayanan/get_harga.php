<?php
require_once '../../db/Connection.php';

if (!empty($_POST['id_lyn'])) {
 $id_lyn = $_POST['id_lyn'];
 $sql = "SELECT harga FROM jenis_layanan WHERE id_layanan = '$id_lyn'";
 $query = mysqli_query($koneksi, $sql);
 $row = mysqli_fetch_assoc($query);
 echo json_encode($row);
}
?>
