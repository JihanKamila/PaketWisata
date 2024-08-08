<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Gunung Bromo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .header-image {
            width: 100%;
            height: 200px;
        }
        .menu {
            margin-top: 10px;
        }
        .card-custom {
            width: 100%;
            margin: 10px 0;
            justify-content: left;
        }
        .card-custom img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .navbar {
            background-color: steelblue;
        }
        .search-bar {
            margin-left: auto;
        }
          .footer {
            background-color: steelblue;
            color: white;
            padding: 20px 0;
        }
        .footer a {
            color: #f0f0f0;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
        <div class="text-center mt-4">
            <p>Selamat Datang di Wisata Gunung Bromo</p>
            <img src="./asset/img/header.jpg" class="img-fluid header-image" alt="Desa Wisata Pulesari">
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light menu">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="paket-wisata.php">Paket Wisata</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form-input.php">Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="modifikasi.php">Modifikasi Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./asset/gallery.html">Gallery</a>
                </li>
            </ul>
            <div class="search-bar ms-auto">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-info" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="./asset/img/trip.jpg" class="card-img-top" alt="Private Trip Bromo">
                    <div class="card-body">
                        <p class="text-body-secondary">5 Agustus 2024</p>
                        <h5 class="card-title">Private Trip Bromo</h5>
                        <p class="card-text">Nikmati pengalaman eksklusif menjelajahi Gunung Bromo dengan trip pribadi.</p>
                        <a href="form-input.php" class="card-link">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-custom">
                    <img src="./asset/img/jeep.jpeg" class="card-img-top" alt="Sewa Jeep Bromo">
                    <div class="card-body">
                        <p class="text-body-secondary">5 Agustus 2024</p>
                        <h5 class="card-title">Sewa Jeep Bromo</h5>
                        <p class="card-text">Sewa jeep kami untuk petualangan off-road di sekitar Gunung Bromo.</p>
                          <a href="form-input.php" class="card-link">Pesan Sekarang</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="video">
                    <h6>Paket 1</h6>
                    <iframe width="300" height="160" src="https://www.youtube.com/embed/z1pCdF2WYd0?si=Jb3icXkJzwvxN7ku" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                    <h6>Paket 2</h6>
                    <iframe width="300" height="160" src="https://www.youtube.com/embed/z1pCdF2WYd0?si=Jb3icXkJzwvxN7ku" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

     <footer class="footer text-center">
        <div class="container">
            <h5>Kontak Kami</h5>
            <p>Alamat: Jl. Wisata Bromo No. 1, Malang, Jawa Timur, Indonesia</p>
            <p>Telepon: +62 123 456 789</p>
            <p>Email: info@wisatagunungbromo.com</p>
            <p>
                <a href="#">Syarat & Ketentuan</a> |
                <a href="#">Kebijakan Privasi</a>
            </p>
            <p>&copy; 2024 Wisata Gunung Bromo. Semua Hak Dilindungi.</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-PxV1W7O+6x3U64/FvAMmG8mQtI6A5I2I7wA4sN4+lV9+XGFlW/T/NRx6xjcF66eK2" crossorigin="anonymous"></script>
</body>
</html>
