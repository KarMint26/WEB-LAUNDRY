<?php

require_once '../../db/Connection.php';
$id_karyawan = $_GET['id_karyawan'];
$sql = "DELETE FROM karyawan WHERE id_karyawan='$id_karyawan'";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:../../views/employee.php?hapus=sukses");
} else{
    header("location:../../views/employee.php?hapus=gagal");
}

?>