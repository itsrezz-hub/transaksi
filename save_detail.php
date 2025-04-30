<?php
// Konfigurasi koneksi database
$host = "localhost";
$username = "root"; // Username diubah menjadi "root"
$password = ""; // Password dihapus (string kosong)
$database = "test";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$id_transaksi = $_POST["id_transaksi"];
$id_pelanggan = $_POST["id_pelanggan"];
$tgl_transaksi = $_POST["tgl_transaksi"];
$metode_pembayaran = $_POST["metode_pembayaran"];
$total_harga = $_POST["total_harga"];

// Validasi data (PENTING!)
if (empty($id_transaksi)) {
    die("Error: ID Transaksi wajib diisi.");
}

// Escape data untuk mencegah SQL injection
$id_transaksi = $conn->real_escape_string($id_transaksi);
$id_pelanggan = $conn->real_escape_string($id_pelanggan);
$tgl_transaksi = $conn->real_escape_string($tgl_transaksi);
$metode_pembayaran = $conn->real_escape_string($metode_pembayaran);
$total_harga = $conn->real_escape_string($total_harga);

// Periksa apakah id_pelanggan ada di tabel pelanggan
$sql_check = "SELECT COUNT(*) FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
$result_check = $conn->query($sql_check);
$row_check = $result_check->fetch_row();
$count = $row_check[0];

if ($count == 0) {
    // Jika id_pelanggan tidak ada, daftarkan ke tabel pelanggan
    $sql_insert_pelanggan = "INSERT INTO pelanggan (id_pelanggan) VALUES ('$id_pelanggan')";
    if ($conn->query($sql_insert_pelanggan) === TRUE) {
        $message = "ID Pelanggan '$id_pelanggan' berhasil didaftarkan.";
    } else {
        $message = "Error: Gagal mendaftarkan ID Pelanggan: " . $conn->error;
    }
}

// Query SQL
$sql = "INSERT INTO transaksi (id_transaksi, id_pelanggan, tgl_transaksi, metode_pembayaran, total_harga)
        VALUES ('$id_transaksi', '$id_pelanggan', '$tgl_transaksi', '$metode_pembayaran', $total_harga)";

// Menjalankan query
if ($conn->query($sql) === TRUE) {
    $message .= "<br>Data transaksi berhasil ditambahkan"; // Tambahkan ke pesan sebelumnya
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
    // Tambahkan logging error ke file atau database
    error_log("Gagal menyimpan transaksi: " . $conn->error, 0);
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Hasil</title>
<style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    flex-direction: column;
    font-family: sans-serif;
}
.container {
    text-align: center;
    border: 1px solid #ccc;
    padding: 20px;
    border-radius: 5px;
}
a {
    display: inline-block;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
</style>
</head>
<body>
<div class="container">
    <p><?php echo $message; ?></p>
    <a href="index.php">Kembali ke table</a>
</div>
</body>
</html>