<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pertandingan - VenueBola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 600px;">
        <h3 class="mb-4">Tambah Pertandingan</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.events.store') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Tim Tuan Rumah</label>
                <input type="text" name="tim_tuan_rumah" value="{{ old('tim_tuan_rumah') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tim Tamu</label>
                <input type="text" name="tim_tamu" value="{{ old('tim_tamu') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Tanding</label>
                <input type="date" name="tanggal_tanding" value="{{ old('tanggal_tanding') }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Stok Tiket</label>
                <input type="number" name="stok_tiket" value="{{ old('stok_tiket', 0) }}" min="0" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>