<?php
include 'koneksi.php'; // Menghubungkan dengan file koneksi.php untuk koneksi database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari form
$namaPemesan = isset($_POST['nama_pemesan']) ? $_POST['nama_pemesan'] : '';
$noHP = isset($_POST['no_hp']) ? $_POST['no_hp'] : '';
$waktuPelaksanaan = isset($_POST['waktu_pelaksanaan']) ? $_POST['waktu_pelaksanaan'] : '';
$paket = isset($_POST['paket']) ? implode(',', $_POST['paket']) : '';
$jumlahPeserta = isset($_POST['jumlah_peserta']) ? $_POST['jumlah_peserta'] : '';
$harga = isset($_POST['harga']) ? $_POST['harga'] : '';
$tagihan = isset($_POST['tagihan']) ? $_POST['tagihan'] : '';

// Validasi data
$errors = [];
if (empty($namaPemesan)) {
    $errors[] = "Nama Pemesan tidak boleh kosong.";
}
if (empty($noHP)) {
    $errors[] = "No HP tidak boleh kosong.";
}
if (empty($waktuPelaksanaan)) {
    $errors[] = "Waktu Pelaksanaan tidak boleh kosong.";
}
if (empty($jumlahPeserta)) {
    $errors[] = "Jumlah Peserta tidak boleh kosong.";
}
if (empty($harga)) {
    $errors[] = "Harga tidak boleh kosong.";
}
if (empty($tagihan)) {
    $errors[] = "Tagihan tidak boleh kosong.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color: red;'>$error</p>";
    }
    echo "<a href='form.html'>Kembali ke Form</a>";
    exit();
}

// Menyiapkan dan menjalankan query
$sql = "INSERT INTO pemesanan (Nama_Pemesan, No_HP, Waktu_Pelaksanaan, Paket, Jumlah_Peserta, Harga, Tagihan)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $namaPemesan, $noHP, $waktuPelaksanaan, $paket, $jumlahPeserta, $harga, $tagihan);

if ($stmt->execute()) {
    echo "Data berhasil disimpan.";
    echo "<a href='modifikasi.php'>Lihat Daftar Pemesanan</a>";
} else {
    echo "Terjadi kesalahan: " . $stmt->error;
}

// Menutup koneksi
$stmt->close();
$conn->close();
?>
