@extends('dashboard.layouts.main')

@section('container')
    <div class="settings-container">
        <h2 class="settings-title my-3">Pengaturan</h2>
        <hr>

        <!-- Menampilkan pesan sukses jika ada -->
        @if (session('success'))
        <div class="alert alert-success col-lg-3">
            {{ session('success') }}
        </div>
        @endif

        <!-- Pengaturan Profil -->
        <div class="settings-item" style="background-color: var(--bs-body-bg); color: var(--bs-body-color)">
            <h5 class="settings-item-title mt-3">Profil Saya</h5>
            <div class="box-form-profil col-lg-3">
                <div class="mb-3">
                    <label for="nama_pengguna" class="form-label">Nama Lengkap</label>
                    <input
                    type="text"
                    class="form-control text-secondary"
                    id="nama_pengguna"
                    name="nama_pengguna"
                    value="{{ auth()->user()->name }}"
                    readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_pengguna" class="form-label">Username</label>
                    <input
                    type="text"
                    class="form-control text-secondary"
                    id="nama_pengguna"
                    name="nama_pengguna"
                    value="{{ auth()->user()->username }}"
                    readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_pengguna" class="form-label">Email</label>
                    <input
                    type="text"
                    class="form-control text-secondary"
                    id="nama_pengguna"
                    name="nama_pengguna"
                    value="{{ auth()->user()->email }}"
                    readonly>
                </div>
                <div class="text-end"> <!-- Tambahkan div dengan class text-end -->
                    <a href="/dashboard/settings/edituser" class="btn btn-primary my-3">Edit Profil</a>
                </div>
            </div>
        </div>

        <!-- Pengaturan Tema -->
        <div class="settings-item">
            <div class="settings-item">
                <h5 class="settings-item-title">Tema</h5>
                <div class="settings-item-body">
                    <button class="btn theme-btn" type="button" id="theme-light" data-theme="light">
                        <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i>
                        Light
                    </button>
                    <button class="btn theme-btn" type="button" id="theme-dark" data-theme="dark">
                        <i class="bi bi-moon-fill me-2 opacity-50" data-theme-icon="bi-moon-fill"></i>
                        Dark
                    </button>
                    <button class="btn theme-btn" type="button" id="theme-auto" data-theme="auto">
                        <i class="bi bi-circle-half me-2 opacity-50" data-theme-icon="bi-circle-half"></i>
                        Auto
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
