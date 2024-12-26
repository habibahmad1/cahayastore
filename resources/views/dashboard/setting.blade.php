@extends('dashboard.layouts.main')

@section('container')
    <div class="settings-container">
        <h2 class="settings-title my-3">Pengaturan</h2>
        <hr>
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

        <!-- Pengaturan Bahasa -->
        {{-- <div class="settings-item">
            <h5 class="settings-item-title mt-3">Bahasa</h5>
        </div> --}}
    </div>

@endsection
