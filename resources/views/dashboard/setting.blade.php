@extends('dashboard.layouts.main')

@section('container')
<div class="container mt-5 settings-container">
    <h2 class="text-center fw-bold text-primary mb-4">Pengaturan</h2>
    <hr>

    @if (session('success'))
    <div class="alert alert-success text-center col-lg-4 mx-auto fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="row g-4 align-items-stretch">
        <!-- Profil Pengguna -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card border-0 rounded-lg w-100">
                <div class="card-header bg-primary text-center text-white py-3">
                    <h5 class="mb-0">Profil Saya</h5>
                </div>
                <div class="card-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" class="form-control bg-light" value="{{ auth()->user()->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Username</label>
                        <input type="text" class="form-control bg-light" value="{{ auth()->user()->username }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="text" class="form-control bg-light" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="text-end">
                        <a href="/dashboard/settings/edituser" class="btn btn-primary">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kolom kanan untuk Tema, Bahasa, dan Logout -->
        <div class="col-lg-6 d-flex flex-column gap-3">
            <div class="d-flex flex-column h-100 justify-content-between gap-3">
                <!-- Tema -->
                <div class="card border-0 rounded-lg mb-2">
                    <div class="card-header bg-black text-center text-white py-3">
                        <h5 class="mb-0">Tema</h5>
                    </div>
                    <div class="card-body p-4 text-center">
                        <button class="btn btn-outline-dark me-2 theme-btn" id="theme-light" data-theme="light">Light</button>
                        <button class="btn btn-outline-secondary me-2 theme-btn" id="theme-dark" data-theme="dark">Dark</button>
                        <button class="btn btn-outline-primary theme-btn" id="theme-auto" data-theme="auto">Auto</button>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection
