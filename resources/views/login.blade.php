@extends('layouts.main')

@section('container')
    <div class="container-login">
        <div class="login-img">
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
    <dotlottie-player src="https://lottie.host/a1b1760e-2fec-42a8-b661-dd2c27189cf4/ISYFrz8mef.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></dotlottie-player>
        </div>
        <div class="login-form">
            <h1>Silahkan Login</h1>
            <form action="">
                <div class="email-form">
                    <label for="email">Email</label>
                    <input type="email" id="email">
                </div>
                <div class="password-form">
                    <label for="password">Password</label>
                    <input type="password" id="password">
                </div>
                <div class="submit-form">
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
