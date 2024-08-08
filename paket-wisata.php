<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paket Wisata Gunung Bromo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .navbar {
            background-color: steelblue;
        }
        .card-custom {
            margin: 20px 0;
        }
        .card-custom img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light menu">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="paket-wisata.php">Paket Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form-input.php">Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="modifikasi.php">Modifikasi Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="galeri.php">Galeri</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 style="text-align: center; color: steelblue;">Paket Wisata di Gunung Bromo</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="./asset/img/trip.jpg" class="card-img-top" alt="Private Trip Bromo">
                    <div class="card-body">
                        <h5 class="card-title">Private Trip Bromo</h5>
                        <p class="card-text">Nikmati pengalaman eksklusif menjelajahi Gunung Bromo dengan trip pribadi. Paket ini termasuk transportasi, pemandu wisata, dan penginapan.</p>
                        <a href="form-input.php" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="./asset/img/jeeptour.png" class="card-img-top" alt="Jeep Tour Bromo">
                    <div class="card-body">
                        <h5 class="card-title">Jeep Tour Bromo</h5>
                        <p class="card-text">Rasakan petualangan off-road dengan jeep kami. Paket ini meliputi tur di sekitar Bromo, termasuk area pasir dan kawah.</p>
                        <a href="form-input.php" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="./asset/img/kuda.jpg" class="card-img-top" alt="Naik Kuda di Bromo">
                    <div class="card-body">
                        <h5 class="card-title">Naik Kuda di Bromo</h5>
                        <p class="card-text">Nikmati pengalaman berkendara kuda di sekitar lautan pasir Bromo. Paket ini termasuk penyewaan kuda dan perlengkapan keselamatan.</p>
                        <a href="form-input.php" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-PxV1W7O+6x3U64/FvAMmG8mQtI6A5I2I7wA4sN4+lV9+XGFlW/T/NRx6xjcF66eK2" crossorigin="anonymous"></script>
</body>
</html>
