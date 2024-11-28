@extends('layouts.main')

@section('container')
    <div class="container-login">
        <div class="login-img">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <dotlottie-player class="animasi-login" src="https://lottie.host/a1b1760e-2fec-42a8-b661-dd2c27189cf4/ISYFrz8mef.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></dotlottie-player>
        </div>
        <div class="login-form">

            @if (session()->has('success'))

            <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
            @endif

            @if (session()->has('failed'))

            <div class="alert alert-danger" role="alert">
                {{ session('failed') }}
              </div>
            @endif

            <h1>Silahkan Login</h1>
            <form action="/login" method="POST">
                @csrf
                <div class="email-form">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukan Email" class="form-control @error('email')
                    is-invalid
                @enderror" required autofocus value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="password-form"  style="position: relative">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukan Password" required>
                    <i class="fas fa-eye toggle-password" id="togglePassword" style="position: absolute; top:45px; right:20px;"></i>
                </div>
                <div class="forgetpw" style="text-align:right">
                    <a href="#" class="text-decoration-none">Lupa Password</a>
                </div>
                <div class="submit-form">
                    <button type="submit">Login</button>
                </div>
                <p class="mt-4">Belum punya akun? <a href="/register" class="text-decoration-none">Daftar Sekarang!</a></p>
            </form>
        </div>
    </div>

    <script>
        // JavaScript untuk toggle password visibility
        const togglePassword = document.querySelector('#togglePassword');
        const passwordField = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Toggle tipe input password
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle icon
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
@endsection
