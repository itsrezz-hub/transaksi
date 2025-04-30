<?php
include 'config.php';

$id_transaksi = $_GET['id_transaksi'];

$sql = "DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'";

if (mysqli_query($conn, $sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>