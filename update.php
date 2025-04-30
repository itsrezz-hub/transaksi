<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah data yang dibutuhkan ada
    if (isset($_POST['id_transaksi'], $_POST['id_pelanggan'], $_POST['tgl_transaksi'], $_POST['metode_pembayaran'], $_POST['total_harga'])) {
        $id_transaksi = $_POST['id_transaksi'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $tgl_transaksi = $_POST['tgl_transaksi'];
        $metode_pembayaran = $_POST['metode_pembayaran'];
        $total_harga = $_POST['total_harga'];

        $sql = "UPDATE transaksi SET
                id_pelanggan='$id_pelanggan',
                tgl_transaksi='$tgl_transaksi',
                metode_pembayaran='$metode_pembayaran',
                total_harga=$total_harga
                WHERE id_transaksi='$id_transaksi'";

        if (mysqli_query($conn, $sql) === TRUE) {
            header("Location: index.php");
            exit(); // Penting untuk menghentikan eksekusi script setelah redirect
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Error: Data tidak lengkap";
    }
} else {
    echo "Error: Permintaan tidak valid";
}

mysqli_close($conn);
?>