@extends('layouts.app')

@section('title', 'Login - SportRent')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-sm-5">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle mb-3" style="width: 64px; height: 64px;">
                        <i class="bi bi-shield-lock-fill fs-2"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-1">Masuk ke Akun Anda</h4>
                    <p class="text-muted small">Sistem Manajemen Rental Alat Olahraga</p>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 px-3 small rounded-3 mb-3">
                        <i class="bi bi-exclamation-circle-fill me-1"></i>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold small text-secondary">Alamat Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" 
                                   name="email" 
                                   id="email" 
                                   class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                   placeholder="nama@email.com" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autofocus>
                        </div>
                        @error('email')
                            <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold small text-secondary">Kata Sandi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 text-muted">
                                <i class="bi bi-key"></i>
                            </span>
                            <input type="password" 
                                   name="password" 
                                   id="password" 
                                   class="form-control border-start-0 @error('password') is-invalid @enderror" 
                                   placeholder="••••••••" 
                                   required>
                        </div>
                        @error('password')
                            <div class="invalid-feedback d-block small">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label small text-muted" for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold shadow-sm rounded-3">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
                    </button>
                </form>

                <!-- Demo Credentials Info -->
                <div class="mt-4 pt-3 border-top">
                    <p class="small text-muted fw-semibold mb-2 text-center">Akun Demo DOANG:</p>
                    <div class="d-flex flex-column gap-2 small">
                        <div class="bg-light p-2 rounded border">
                            <span class="badge bg-danger text-white me-1">Admin</span>
                            <code>admin@gmail.com</code> | <code>admin123</code>
                        </div>
                        <div class="bg-light p-2 rounded border">
                            <span class="badge bg-secondary text-white me-1">User</span>
                            <code>user@gmail.com</code> | <code>user123</code>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
