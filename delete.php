<?php
// Menghubungkan ke database
include 'koneksi.php';

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan ID dari URL dan memastikan ID valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Cek apakah pengguna telah mengonfirmasi penghapusan
    if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Membuat query untuk menghapus data dengan prepared statement
        $sql = "DELETE FROM pemesanan WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $id);
            
            if ($stmt->execute()) {
                echo "<script>
                        alert('Data berhasil dihapus.');
                        window.location.href = 'modifikasi.php'; // Arahkan kembali ke halaman utama
                      </script>";
            } else {
                echo "<script>
                        alert('Gagal menghapus data: " . $stmt->error . "');
                        window.location.href = 'index.php'; // Arahkan kembali ke halaman utama
                      </script>";
            }
            
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "<script>
                var confirmDelete = confirm('Apakah Anda yakin ingin menghapus data ini?');
                if (confirmDelete) {
                    window.location.href = 'delete.php?id=" . $id . "&confirm=yes'; // Arahkan ke halaman ini dengan konfirmasi
                } else {
                    window.location.href = 'index.php'; // Arahkan kembali ke halaman utama jika dibatalkan
                }
              </script>";
    }
} else {
    echo "ID tidak valid.";
}

// Menutup koneksi
$conn->close();
?>
