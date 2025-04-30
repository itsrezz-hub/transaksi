<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Data Transaksi</h2>
        <?php
        include 'config.php';
        $id_transaksi = $_GET['id_transaksi'];
        $sql = "SELECT * FROM transaksi WHERE id_transaksi='$id_transaksi'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
        ?>
        <form action="update.php" method="post">
            <label for="id_transaksi">ID Transaksi:</label>
            <input type="text" id="id_transaksi" name="id_transaksi" value="<?php echo $row['id_transaksi']; ?>" readonly required><br><br>

            <label for="id_pelanggan">ID Pelanggan:</label>
            <input type="text" id="id_pelanggan" name="id_pelanggan" value="<?php echo $row['id_pelanggan']; ?>" required><br><br>

            <label for="tgl_transaksi">Tanggal Transaksi:</label>
            <input type="date" id="tgl_transaksi" name="tgl_transaksi" value="<?php echo $row['tgl_transaksi']; ?>" required><br><br>

            <label for="metode_pembayaran">Metode Pembayaran:</label>
            <select id="metode_pembayaran" name="metode_pembayaran">
                <option value="Qris" <?php if($row['metode_pembayaran'] == 'Qris') echo 'selected'; ?>>Qris</option>
                <option value="Tunai" <?php if($row['metode_pembayaran'] == 'Tunai') echo 'selected'; ?>>Tunai</option>
            </select><br><br>

            <label for="total_harga">Total Harga:</label>
            <input type="number" id="total_harga" name="total_harga" value="<?php echo $row['total_harga']; ?>" required><br><br>

            <input type="submit" value="Update">
            <a href="index.php">Batal</a>
        </form>
        <?php
        } else {
            echo "Data tidak ditemukan";
        }
        mysqli_close($conn);
        ?>
    </div>
</body>
</html>