<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manajemen Transaksi</title>
    <link rel="stylesheet" href="../assets/css/theme_updated.css" />
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    <div class="container">
        <h2>Data Transaksi</h2>
        <div class="add-data">
            <a href="add.php" class="btn btn-primary">Tambah Data</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>ID Pelanggan</th>
                    <th>Tanggal Transaksi</th>
                    <th>Metode Pembayaran</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $sql = "SELECT * FROM transaksi";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row["id_transaksi"]."</td>";
                        echo "<td>".$row["id_pelanggan"]."</td>";
                        echo "<td>".$row["tgl_transaksi"]."</td>";
                        echo "<td>".$row["metode_pembayaran"]."</td>";
                        echo "<td>".number_format($row["total_harga"])."</td>";
                        echo "<td>
                                <a href='edit.php?id_transaksi=".$row["id_transaksi"]."' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='delete.php?id_transaksi=".$row["id_transaksi"]."' class='btn btn-danger btn-sm'>Hapus</a>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <footer>Copyright 2025, Kelompok 2</footer>
</body>
</html>
