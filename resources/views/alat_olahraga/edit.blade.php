@extends('layouts.app')

@section('title', 'Edit Alat Olahraga')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-1 text-dark">
                    <i class="bi bi-pencil-square text-warning me-2"></i>Edit Data Alat Olahraga
                </h3>
                <p class="text-muted mb-0">Perbarui rincian informasi dan status inventaris alat olahraga</p>
            </div>
            <a href="{{ route('alat-olahraga.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-header py-3">
                <span class="fw-semibold text-secondary">
                    <i class="bi bi-gear-fill me-1"></i> Form Edit: <strong class="text-dark">{{ $alatOlahraga->nama_alat }}</strong>
                </span>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('alat-olahraga.update', $alatOlahraga->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Alat -->
                    <div class="mb-3">
                        <label for="nama_alat" class="form-label fw-semibold">Nama Alat Olahraga <span class="text-danger">*</span></label>
                        <input type="text"
                               name="nama_alat"
                               id="nama_alat"
                               class="form-control @error('nama_alat') is-invalid @enderror"
                               placeholder="Contoh: Raket Badminton Yonex Astrox 88D"
                               value="{{ old('nama_alat', $alatOlahraga->nama_alat) }}"
                               required autofocus>
                        @error('nama_alat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <!-- Kategori -->
                        <div class="col-md-6 mb-3">
                            <label for="kategori" class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                            <input type="text"
                                   name="kategori"
                                   id="kategori"
                                   list="kategori-list"
                                   class="form-control @error('kategori') is-invalid @enderror"
                                   placeholder="Pilih atau ketik kategori..."
                                   value="{{ old('kategori', $alatOlahraga->kategori) }}"
                                   required>
                            <datalist id="kategori-list">
                                <option value="Bulu Tangkis">
                                <option value="Sepak Bola & Futsal">
                                <option value="Bola Basket">
                                <option value="Tenis Lapangan / Meja">
                                <option value="Fitness & Gym">
                                <option value="Renang & Air">
                                <option value="Outdoor & Camping">
                                <option value="Lari & Atletik">
                            </datalist>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Kondisi -->
                        <div class="col-md-6 mb-3">
                            <label for="kondisi" class="form-label fw-semibold">Kondisi Alat <span class="text-danger">*</span></label>
                            <select name="kondisi" id="kondisi" class="form-select @error('kondisi') is-invalid @enderror" required>
                                @php
                                    $selectedKondisi = old('kondisi', $alatOlahraga->kondisi);
                                @endphp
                                <option value="" disabled>-- Pilih Kondisi --</option>
                                <option value="Baru" {{ $selectedKondisi == 'Baru' ? 'selected' : '' }}>Baru</option>
                                <option value="Sangat Baik" {{ $selectedKondisi == 'Sangat Baik' ? 'selected' : '' }}>Sangat Baik</option>
                                <option value="Baik" {{ $selectedKondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Cukup" {{ $selectedKondisi == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                                <option value="Perlu Perbaikan" {{ $selectedKondisi == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                            </select>
                            @error('kondisi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Tarif Sewa -->
                        <div class="col-md-6 mb-3">
                            <label for="tarif_sewa" class="form-label fw-semibold">Tarif Sewa (Per Hari) <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-light fw-semibold">Rp</span>
                                <input type="number"
                                       name="tarif_sewa"
                                       id="tarif_sewa"
                                       min="0"
                                       step="500"
                                       class="form-control @error('tarif_sewa') is-invalid @enderror"
                                       placeholder="Contoh: 25000"
                                       value="{{ old('tarif_sewa', $alatOlahraga->tarif_sewa) }}"
                                       required>
                                <span class="input-group-text bg-light text-muted">/ hari</span>
                                @error('tarif_sewa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Stok -->
                        <div class="col-md-6 mb-3">
                            <label for="stok" class="form-label fw-semibold">Jumlah Stok Tersedia <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <input type="number"
                                       name="stok"
                                       id="stok"
                                       min="0"
                                       class="form-control @error('stok') is-invalid @enderror"
                                       placeholder="Contoh: 10"
                                       value="{{ old('stok', $alatOlahraga->stok) }}"
                                       required>
                                <span class="input-group-text bg-light text-muted">Unit</span>
                                @error('stok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="my-4 text-muted">

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('alat-olahraga.index') }}" class="btn btn-light border px-4">
                            Batal
                        </a>
                        <button type="submit" class="btn btn-warning px-4 text-dark fw-semibold">
                            <i class="bi bi-arrow-repeat me-1"></i> Perbarui Data Alat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
