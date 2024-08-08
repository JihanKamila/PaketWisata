<?php
include 'koneksi.php';

$conn = new mysqli($host, $user, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama_pemesan = $_POST['nama_pemesan'];
        $no_hp = $_POST['no_hp'];
        $tanggal_pesan = $_POST['tanggal_pesan'];
        $waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
        $paket = implode(',', $_POST['paket']);
        $jumlah_peserta = $_POST['jumlah_peserta'];
        $harga = $_POST['harga'];
        $tagihan = $_POST['tagihan'];

        $sql = "UPDATE pemesanan SET 
                Nama_Pemesan='$nama_pemesan',
                No_HP='$no_hp',
                Tanggal_Pesan='$tanggal_pesan',
                Waktu_Pelaksanaan='$waktu_pelaksanaan',
                Paket='$paket',
                Jumlah_Peserta='$jumlah_peserta',
                Harga='$harga',
                Tagihan='$tagihan' 
                WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='success'>Data berhasil diperbarui.</div>";
            header("Refresh: 2; URL=index.php");
            exit();
        } else {
            echo "<div class='error'>Error: " . $conn->error . "</div>";
        }
    } else {
        $sql = "SELECT * FROM pemesanan WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $paketArr = explode(',', $row['Paket']);
            ?>

            <!DOCTYPE html>
            <html>
            <head>
                <title>Edit Pemesanan</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f0f0f0;
                    }
                    .form-container {
                        width: 400px;
                        margin: 50px auto;
                        padding: 20px;
                        background-color: #fff;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    .form-container h2 {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .form-container label {
                        display: block;
                        margin: 10px 0 5px;
                    }
                    .form-container input[type="text"],
                    .form-container input[type="date"],
                    .form-container input[type="number"],
                    .form-container input[type="submit"] {
                        width: calc(100% - 22px);
                        padding: 10px;
                        margin: 5px 0;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                    }
                    .form-container input[type="submit"] {
                        background-color: #4CAF50;
                        color: white;
                        border: none;
                        cursor: pointer;
                    }
                    .form-container input[type="checkbox"] {
                        margin-right: 10px;
                    }
                    .error-message {
                        color: red;
                        font-size: 12px;
                        display: none;
                    }
                </style>
            </head>
            <body>
                <div class="form-container">
                    <h2>Edit Pemesanan</h2>
                    <form id="editForm" action="" method="post">
                        <label>Nama Pemesan:</label>
                        <input type="text" name="nama_pemesan" id="nama_pemesan" value="<?php echo $row['Nama_Pemesan']; ?>" placeholder="Masukkan Nama Pemesan"><br>
                        <span id="namaError" class="error-message">Nama Pemesan harus diisi</span>

                        <label>No HP/Telp:</label>
                        <input type="text" name="no_hp" id="no_hp" value="<?php echo $row['No_HP']; ?>" placeholder="Masukkan Nomor HP/Telp"><br>
                        <span id="hpError" class="error-message">No HP harus diisi</span>

                        <label>Tanggal Pesan:</label>
                        <input type="date" name="tanggal_pesan" id="tanggal_pesan" value="<?php echo $row['Tanggal_Pesan']; ?>"><br>

                        <label>Waktu Pelaksanaan Perjalanan:</label>
                        <input type="number" name="waktu_pelaksanaan" id="waktu_pelaksanaan" value="<?php echo $row['Waktu_Pelaksanaan']; ?>" placeholder="Masukkan Lama Perjalanan (hari)"><br>
                        <span id="waktuError" class="error-message">Waktu Pelaksanaan harus diisi</span>

                        <label>Pelayanan Paket Perjalanan:</label>
                        <input type="checkbox" name="paket[]" value="penginapan" id="penginapan" <?php if(in_array('penginapan', $paketArr)) echo 'checked'; ?>> Penginapan (Rp 1.000.000)<br>
                        <input type="checkbox" name="paket[]" value="transportasi" id="transportasi" <?php if(in_array('transportasi', $paketArr)) echo 'checked'; ?>> Transportasi (Rp 1.200.000)<br>
                        <input type="checkbox" name="paket[]" value="makanan" id="makanan" <?php if(in_array('makanan', $paketArr)) echo 'checked'; ?>> Makanan (Rp 500.000)<br>
                        <span id="paketError" class="error-message">Paket harus dipilih</span>

                        <label>Jumlah Peserta:</label>
                        <input type="number" name="jumlah_peserta" id="jumlah_peserta" value="<?php echo $row['Jumlah_Peserta']; ?>" placeholder="Masukkan Jumlah Peserta"><br>
                        <span id="pesertaError" class="error-message">Jumlah Peserta harus diisi</span>

                        <label>Harga Paket Perjalanan:</label>
                        <input type="text" name="harga" id="harga" value="<?php echo $row['Harga']; ?>" readonly><br>

                        <label>Jumlah Tagihan:</label>
                        <input type="text" name="tagihan" id="tagihan" value="<?php echo $row['Tagihan']; ?>" readonly><br>

                        <input type="submit" value="Update">
                    </form>
                </div>

                <script>
                    function calculateAndUpdate() {
                        var harga = 0;
                        var paketChecked = document.querySelectorAll('input[name="paket[]"]:checked');
                        paketChecked.forEach(function(paket) {
                            if (paket.value === 'penginapan') {
                                harga += 1000000;
                            } else if (paket.value === 'transportasi') {
                                harga += 1200000;
                            } else if (paket.value === 'makanan') {
                                harga += 500000;
                            }
                        });

                        document.getElementById('harga').value = harga;

                        var waktuPelaksanaan = document.getElementById('waktu_pelaksanaan').value;
                        var jumlahPeserta = document.getElementById('jumlah_peserta').value;

                        var tagihan = 0;
                        if (waktuPelaksanaan && jumlahPeserta && harga) {
                            tagihan = parseInt(waktuPelaksanaan) * parseInt(jumlahPeserta) * harga;
                        }

                        document.getElementById('tagihan').value = tagihan;
                    }

                    document.getElementById('waktu_pelaksanaan').addEventListener('input', calculateAndUpdate);
                    document.getElementById('jumlah_peserta').addEventListener('input', calculateAndUpdate);
                    document.querySelectorAll('input[name="paket[]"]').forEach(function(checkbox) {
                        checkbox.addEventListener('change', calculateAndUpdate);
                    });

                    document.getElementById('editForm').addEventListener('submit', function(event) {
                        event.preventDefault();
                        
                        var errorMessages = document.querySelectorAll('.error-message');
                        errorMessages.forEach(function(error) {
                            error.style.display = 'none';
                        });

                        var isValid = true;
                        
                        var namaPemesan = document.getElementById('nama_pemesan').value;
                        if (!namaPemesan) {
                            document.getElementById('namaError').style.display = 'block';
                            isValid = false;
                        }

                        var noHp = document.getElementById('no_hp').value;
                        if (!noHp) {
                            document.getElementById('hpError').style.display = 'block';
                            isValid = false;
                        }

                        var waktuPelaksanaan = document.getElementById('waktu_pelaksanaan').value;
                        if (!waktuPelaksanaan) {
                            document.getElementById('waktuError').style.display = 'block';
                            isValid = false;
                        }

                        var paketChecked = document.querySelectorAll('input[name="paket[]"]:checked');
                        if (paketChecked.length === 0) {
                            document.getElementById('paketError').style.display = 'block';
                            isValid = false;
                        }

                        var jumlahPeserta = document.getElementById('jumlah_peserta').value;
                        if (!jumlahPeserta || isNaN(jumlahPeserta)) {
                            document.getElementById('pesertaError').style.display = 'block';
                            isValid = false;
                        }

                        if (isValid) {
                            calculateAndUpdate();
                            document.getElementById('editForm').submit();
                        }
                    });

                    window.onload = function() {
                        calculateAndUpdate();
                    };
                </script>
            </body>
            </html>
            <?php
        } else {
            echo "<div class='error'>Data tidak ditemukan.</div>";
        }
    }
}

$conn->close();
?>
