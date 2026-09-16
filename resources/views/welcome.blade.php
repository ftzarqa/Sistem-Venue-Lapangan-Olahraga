<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Venue Lapangan Olahraga</title>

    <!-- Bootstrap 5.3 CSS - Hanya CSS Murni Tanpa JS -->
    <link href="https://jsdelivr.net" rel="stylesheet">
    
    <!-- CSS Kustom Anda (untuk modifikasi desain mandiri jika diperlukan) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-light">

    <!-- Navbar Minimalis Berbasis Bootstrap CSS -->
    <nav class="navbar navbar-expand navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">⚽ Sistem Venue</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="#">Beranda</a>
                <a class="nav-link" href="#">Daftar Lapangan</a>
                <a class="nav-link" href="#">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section / Header Halaman Utama -->
    <div class="container my-5">
        <div class="p-5 text-center bg-white rounded-3 shadow-sm border">
            <h1 class="text-body-emphasis display-5 fw-bold">Booking Lapangan Olahraga Jadi Mudah</h1>
            <p class="col-lg-8 mx-auto fs-5 text-muted mt-3">
                Selamat datang di platform penyewaan lapangan olahraga. Temukan venue terbaik di sekitar Anda, cek ketersediaan jadwal secara real-time, dan lakukan reservasi dengan instan.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mt-4">
                <a href="#" class="btn btn-primary btn-lg px-4 gap-3 fw-semibold">Lihat Lapangan</a>
                <a href="#" class="btn btn-outline-secondary btn-lg px-4">Hubungi Kami</a>
            </div>
        </div>
    </div>

</body>
</html>
