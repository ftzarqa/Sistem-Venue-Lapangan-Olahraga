<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Tiket - VenueBola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">VenueBola</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Halaman Pemesanan Tiket</h1>
        <p>Anda sedang memproses pembelian tiket untuk: <b>{{ $event->tim_tuan_rumah }} vs {{ $event->tim_tamu }}</b></p>
        <p>Tanggal: {{ $event->tanggal_tanding->format('d-m-Y') }}</p>
        <p class="text-danger">Sisa Tiket: {{ $event->stok_tiket }}</p>
        <a href="/" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
