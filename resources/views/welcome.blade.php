<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Ticketing Venue Sepak Bola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">VenueBola</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mt-5 text-center">
        <h1 class="display-4">Selamat Datang di VenueBola</h1>
        <p class="lead">Sistem pemesanan tiket pertandingan sepak bola tercepat dan termudah.</p>
    </div>

    <!-- Daftar Pertandingan (Dinamis dari Database) -->
    <div class="container mt-5">
        <h3 class="mb-4">Pertandingan Mendatang</h3>
        <div class="row">
           <!-- Looping data dari Controller menggunakan Blade -->
@forelse($events as $event)
<div class="col-md-4 mb-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $event->tim_tuan_rumah }} vs {{ $event->tim_tamu }}</h5>
            <p class="card-text">Tanggal: {{ $event->tanggal_tanding }}</p>
            <p class="card-text text-danger">Sisa Tiket: {{ $event->stok_tiket }}</p>
            <a href="/tiket/{{ $event->id }}" class="btn btn-primary w-100">Beli Tiket</a>
        </div>
    </div>
</div>
@empty
            <div class="col-12 text-center">
                <p>Belum ada pertandingan yang dijadwalkan.</p>
            </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>