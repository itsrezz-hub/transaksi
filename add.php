<!DOCTYPE html>
<html>
<head>
    <title>Form Transaksi</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 90%;
            margin: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            height: 38px; /* Adjust height to match input fields */
        }

        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #449d44;
        }

        /* Responsive adjustments */
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
            input[type="text"],
            input[type="date"],
            select,
            input[type="submit"] {
                padding: 10px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <form action="save_detail.php" method="post">
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

        <input type="submit" value="Simpan">
    </form>
</body>
</html>