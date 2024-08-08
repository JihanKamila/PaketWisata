<!DOCTYPE html>
<html>
<head>
    <title>Form Pemesanan Paket Wisata</title>
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
        <h2>Form Pemesanan Paket Wisata</h2>
        <form id="bookingForm" action="simpan.php" method="post">
            <label>Nama Pemesan:</label>
            <input type="text" name="nama_pemesan" id="nama_pemesan" placeholder="Masukkan Nama Pemesan"><br>
            <span id="namaError" class="error-message">Nama Pemesan harus diisi</span>

            <label>No HP/Telp:</label>
            <input type="text" name="no_hp" id="no_hp" placeholder="Masukkan Nomor HP/Telp"><br>
            <span id="hpError" class="error-message">No HP harus diisi</span>

            <label>Tanggal Pesan:</label>
            <input type="date" name="tanggal_pesan" id="tanggal_pesan"><br>

            <label>Waktu Pelaksanaan Perjalanan:</label>
            <input type="number" name="waktu_pelaksanaan" id="waktu_pelaksanaan" placeholder="Masukkan Lama Perjalanan (hari)"><br>
            <span id="waktuError" class="error-message">Waktu Pelaksanaan harus diisi</span>

            <label>Pelayanan Paket Perjalanan:</label>
            <input type="checkbox" name="paket[]" value="penginapan" id="penginapan"> Penginapan (Rp 1.000.000)<br>
            <input type="checkbox" name="paket[]" value="transportasi" id="transportasi"> Transportasi (Rp 1.200.000)<br>
            <input type="checkbox" name="paket[]" value="makanan" id="makanan"> Makanan (Rp 500.000)<br>
            <span id="paketError" class="error-message">Paket harus dipilih</span>

            <label>Jumlah Peserta:</label>
            <input type="number" name="jumlah_peserta" id="jumlah_peserta" placeholder="Masukkan Jumlah Peserta"><br>
            <span id="pesertaError" class="error-message">Jumlah Peserta harus diisi</span>

            <label>Harga Paket Perjalanan:</label>
            <input type="text" name="harga" id="harga" readonly><br>

            <label>Jumlah Tagihan:</label>
            <input type="text" name="tagihan" id="tagihan" readonly><br>

            <input type="submit" value="Simpan">
        </form>
    </div>

    <script>
        function calculateAndUpdate() {
            // Calculate Harga
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

            // Set Harga
            document.getElementById('harga').value = harga;

            // Get input values
            var waktuPelaksanaan = document.getElementById('waktu_pelaksanaan').value;
            var jumlahPeserta = document.getElementById('jumlah_peserta').value;

            // Calculate Tagihan
            var tagihan = 0;
            if (waktuPelaksanaan && jumlahPeserta && harga) {
                tagihan = parseInt(waktuPelaksanaan) * parseInt(jumlahPeserta) * harga;
            }

            // Set Tagihan
            document.getElementById('tagihan').value = tagihan;
        }

        // Add event listeners
        document.getElementById('waktu_pelaksanaan').addEventListener('input', calculateAndUpdate);
        document.getElementById('jumlah_peserta').addEventListener('input', calculateAndUpdate);
        document.querySelectorAll('input[name="paket[]"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', calculateAndUpdate);
        });

        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Reset error messages
            var errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(function(error) {
                error.style.display = 'none';
            });

            var isValid = true;
            
            // Validate Nama Pemesan
            var namaPemesan = document.getElementById('nama_pemesan').value;
            if (!namaPemesan) {
                document.getElementById('namaError').style.display = 'block';
                isValid = false;
            }

            // Validate No HP
            var noHp = document.getElementById('no_hp').value;
            if (!noHp) {
                document.getElementById('hpError').style.display = 'block';
                isValid = false;
            }

            // Validate Waktu Pelaksanaan
            var waktuPelaksanaan = document.getElementById('waktu_pelaksanaan').value;
            if (!waktuPelaksanaan) {
                document.getElementById('waktuError').style.display = 'block';
                isValid = false;
            }

            // Validate Paket
            var paketChecked = document.querySelectorAll('input[name="paket[]"]:checked');
            if (paketChecked.length === 0) {
                document.getElementById('paketError').style.display = 'block';
                isValid = false;
            }

            // Validate Jumlah Peserta
            var jumlahPeserta = document.getElementById('jumlah_peserta').value;
            if (!jumlahPeserta || isNaN(jumlahPeserta)) {
                document.getElementById('pesertaError').style.display = 'block';
                isValid = false;
            }

            if (isValid) {
                // Recalculate and set the harga and tagihan
                calculateAndUpdate();

                // Submit form
                document.getElementById('bookingForm').submit();
            }
        });
    </script>
</body>
</html>
