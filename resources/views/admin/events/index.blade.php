<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pertandingan - VenueBola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-4">
        <span class="navbar-brand mb-0 h1">VenueBola — Admin</span>
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('admin.dashboard') }}" class="text-white small text-decoration-none">Dashboard</a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Kelola Data Pertandingan</h3>
            <a href="{{ route('admin.events.create') }}" class="btn btn-primary">+ Tambah Pertandingan</a>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th>Tim Tuan Rumah</th>
                    <th>Tim Tamu</th>
                    <th>Tanggal</th>
                    <th>Sisa Tiket</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($events as $event)
                    <tr>
                        <td>{{ $event->tim_tuan_rumah }}</td>
                        <td>{{ $event->tim_tamu }}</td>
                        <td>{{ $event->tanggal_tanding->format('d-m-Y') }}</td>
                        <td>{{ $event->stok_tiket }}</td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus pertandingan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada data pertandingan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>