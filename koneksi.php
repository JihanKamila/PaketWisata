<?php
// Konfigurasi koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "dbWisata";

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menutup koneksi
$conn->close();
?>
