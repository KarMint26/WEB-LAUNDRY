<?php
require_once '../../db/Connection.php';

$id_customer = $_POST['id_customer'];

$sql_check_association = "SELECT * FROM pelayanan WHERE customer_id_customer='$id_customer'";
$query_check_association = mysqli_query($koneksi, $sql_check_association);

if (mysqli_num_rows($query_check_association) > 0) {
    
    $sql_delete_pelayanan = "DELETE FROM pelayanan WHERE customer_id_customer='$id_customer'";
    $query_delete_pelayanan = mysqli_query($koneksi, $sql_delete_pelayanan);

    if (!$query_delete_pelayanan) {
   
        // header("location: ../../views/customer.php?hapus=gagal_pelayanan");
        // exit();
    }
}

$sql_hapus_data = "DELETE FROM customer WHERE id_customer='$id_customer'";
$query = mysqli_query($koneksi, $sql_hapus_data);

if($query) {
    echo json_encode(['success' => $query]);
    exit;
} else {
    echo json_encode(['failed' => $query]);
    exit;
}
?>