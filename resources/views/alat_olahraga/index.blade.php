@extends('layouts.app')

@section('title', 'Daftar Alat Olahraga')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Header & Action -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
            <div>
                <h3 class="fw-bold mb-1 text-dark">
                    <i class="bi bi-bicycle text-primary me-2"></i>Daftar Alat Olahraga
                </h3>
                <p class="text-muted mb-0">Kelola DAH</p>
            </div>
            
            <a href="{{ route('alat-olahraga.create') }}" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Alat Baru
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <span class="fw-semibold text-secondary">
                    <i class="bi bi-table me-1"></i> Inventaris
                </span>
                <span class="badge bg-light text-secondary border">
                    Total: {{ count($alatOlahraga) }} Data
                </span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th scope="col" class="text-center" style="width: 50px;">#</th>
                                <th scope="col">Nama Alat</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Tarif Sewa perHARI</th>
                                <th scope="col" class="text-center">Stok</th>
                                <th scope="col" class="text-center" style="width: 170px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($alatOlahraga as $index => $item)
                                <tr>
                                    <td class="text-center text-muted fw-semibold">
                                        {{ $index + 1 }}
                                    </td>
                                    <td>
                                        <div class="fw-semibold text-dark">{{ $item->nama_alat }}</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-info-subtle text-info-emphasis border border-info-subtle">
                                            <i class="bi bi-tag-fill me-1"></i>{{ $item->kategori }}
                                        </span>
                                    </td>
                                    <td>
                                        @php
                                            $kondisiLower = strtolower($item->kondisi);
                                            $badgeClass = 'bg-secondary';
                                            if (str_contains($kondisiLower, 'baik') || str_contains($kondisiLower, 'baru') || str_contains($kondisiLower, 'bagus')) {
                                                $badgeClass = 'bg-success';
                                            } elseif (str_contains($kondisiLower, 'sedang') || str_contains($kondisiLower, 'cukup')) {
                                                $badgeClass = 'bg-warning text-dark';
                                            } elseif (str_contains($kondisiLower, 'rusak') || str_contains($kondisiLower, 'perbaikan')) {
                                                $badgeClass = 'bg-danger';
                                            }
                                        @endphp
                                        <span class="badge {{ $badgeClass }}">
                                            {{ $item->kondisi }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="fw-semibold text-dark">
                                            Rp {{ number_format($item->tarif_sewa, 0, ',', '.') }}
                                        </span>
                                        <small class="text-muted">/ hari</small>
                                    </td>
                                    <td class="text-center">
                                        @if ($item->stok > 0)
                                            <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle px-2 py-1">
                                                <i class="bi bi-box-seam me-1"></i>{{ $item->stok }} Unit
                                            </span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger-emphasis border border-danger-subtle px-2 py-1">
                                                Habis
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="d-inline-flex gap-1">
                                            <a href="{{ route('alat-olahraga.edit', $item->id) }}" class="btn btn-sm btn-outline-warning" title="Edit Alat">
                                                <i class="bi bi-pencil-square me-1"></i>Edit
                                            </a>
                                            <form action="{{ route('alat-olahraga.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus alat &quot;{{ $item->nama_alat }}&quot;?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus Alat">
                                                    <i class="bi bi-trash3-fill me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox fs-1 d-block mb-2 text-secondary opacity-50"></i>
                                            <h5 class="fw-semibold">Belom ada ALAT</h5>
                                            <p class="small mb-3">ALAT KOSONG.</p>
                                            <a href="{{ route('alat-olahraga.create') }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-plus-lg me-1"></i> Tambah Data 
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
