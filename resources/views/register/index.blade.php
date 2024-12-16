@extends('layouts.main')

@section('container')
    <div class="container-login">
        <div class="login-img">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
<dotlottie-player class="animasi-login" src="https://lottie.host/55cb56e0-9731-4ca1-b51f-a70af325153b/Gj8wSz1AGo.lottie" background="transparent" speed="1" style="width: 500px; height: 500px" loop autoplay></dotlottie-player>
        </div>
        <div class="login-form">
            <h1>Silahkan Daftar</h1>
            <form action="/register" method="POST">
                @csrf
                <div class="nama-form">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                           placeholder="Masukan Nama" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="email-form">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control @error('email')
                    is-invalid
                    @enderror " placeholder="Masukan Email" value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="email-form">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control @error('password')
                    is-invalid
                    @enderror " placeholder="Masukan Password">
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="ulangpassword-form" style="position: relative">
                    <label for="password_confirmation">Ulangi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation')
                    is-invalid
                    @enderror " placeholder="Ulangi Password">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="submit-form">
                    <button type="submit">Buat Akun</button>
                </div>
                <p class="mt-4">Sudah punya akun? <a href="/login" class="text-decoration-none">Login Sekarang!</a></p>
            </form>
        </div>
    </div>
@endsection
