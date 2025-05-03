<!DOCTYPE html>
<html>
<head>
    <title>Form Transaksi</title>
    <link rel="stylesheet" href="../assets/css/theme_updated.css">
</head>
<body>
    <form action="save_detail.php" method="post" class="form-container">
        <label for="id_transaksi">ID Transaksi:</label><br>
        <input type="text" id="id_transaksi" name="id_transaksi" maxlength="15" required><br><br>

        <label for="id_pelanggan">ID Pelanggan:</label><br>
        <input type="text" id="id_pelanggan" name="id_pelanggan" maxlength="12"><br><br>

        <label for="tgl_transaksi">Tanggal Transaksi:</label><br>
        <input type="date" id="tgl_transaksi" name="tgl_transaksi"><br><br>

        <label for="metode_pembayaran">Metode Pembayaran:</label><br>
        <select id="metode_pembayaran" name="metode_pembayaran">
            <option value="Tunai">Tunai</option>
            <option value="Qris">Qris</option>
        </select><br><br>

        <label for="total_harga">Total Harga:</label><br>
        <input type="number" id="total_harga" name="total_harga"><br><br>

        <input type="submit" value="Simpan" class="btn btn-save">
    </form>
    <footer>Copyright 2025, Kelompok 2</footer>
</body>
</html>
