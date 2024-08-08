<?php
include 'koneksi.php'; // Menghubungkan dengan file koneksi.php untuk koneksi database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menyiapkan dan menjalankan query
$sql = "SELECT * FROM pemesanan";
$result = $conn->query($sql);

// Menampilkan data
if ($result->num_rows > 0) {
    echo "<div style='width: 80%; margin: auto;'>";
    echo "<h2 style='text-align: center; color: steelblue;'>Daftar Pemesanan</h2>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;'>
            <thead style='background-color: steelblue; color: white;'>
                <tr>
                    <th>Nama Pemesan</th>
                    <th>No HP</th>
                    <th>Waktu Pelaksanaan</th>
                    <th>Paket</th>
                    <th>Jumlah Peserta</th>
                    <th>Harga</th>
                    <th>Tagihan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        // Mengambil paket yang disimpan dan memisahkan menjadi array
        $paketArr = explode(',', $row['Paket']);
        
        // Menggabungkan array paket menjadi string dengan format "Pilihan 1, Pilihan 2"
        $paketString = [];
        if (in_array('penginapan', $paketArr)) {
            $paketString[] = 'Penginapan';
        }
        if (in_array('transportasi', $paketArr)) {
            $paketString[] = 'Transportasi';
        }
        if (in_array('makanan', $paketArr)) {
            $paketString[] = 'Makanan';
        }
        $paketDisplay = implode(', ', $paketString);

        echo "<tr style='text-align: center;'>
                <td>" . htmlspecialchars($row['Nama_Pemesan']) . "</td>
                <td>" . htmlspecialchars($row['No_HP']) . "</td>
                <td>" . htmlspecialchars($row['Waktu_Pelaksanaan']) . "</td>
                <td>" . htmlspecialchars($paketDisplay) . "</td>
                <td>" . htmlspecialchars($row['Jumlah_Peserta']) . "</td>
                <td>" . htmlspecialchars($row['Harga']) . "</td>
                <td>" . htmlspecialchars($row['Tagihan']) . "</td>
                <td>
                    <button style='background-color: #4CAF50; color: white; padding: 5px 10px; border: none; cursor: pointer;'>
                        <a href='edit.php?id=" . $row['id'] . "' style='text-decoration: none; color: white;'>Edit</a>
                    </button>
                    <button style='background-color: #f44336; color: white; padding: 5px 10px; border: none; cursor: pointer;'>
                        <a href='delete.php?id=" . $row['id'] . "' style='text-decoration: none; color: white;'>Delete</a>
                    </button>
                </td>
              </tr>";
    }
    echo "</tbody></table>";
    echo "<div style='text-align: center; margin-top: 20px;'>
            <button style='background-color: steelblue; color: white; padding: 10px 20px; border: none; cursor: pointer;'>
                <a href='index.php' style='text-decoration: none; color: white;'>Kembali ke Beranda</a>
            </button>
          </div>";
    echo "</div>";
} else {
    echo "<div style='text-align: center; font-family: Arial, sans-serif;'>
            <h2>Tidak ada hasil</h2>
            <button style='background-color: steelblue; color: white; padding: 10px 20px; border: none; cursor: pointer;'>
                <a href='index.php' style='text-decoration: none; color: white;'>Kembali ke Beranda</a>
            </button>
          </div>";
}

// Menutup koneksi
$conn->close();
?>
