@extends('layouts.main')

@section('container')
    <div class="container-login">
        <div class="login-form">
            <h1>Silahkan Login</h1>
            <form action="">
                <div class="email-form">
                    <label for="email">Email</label>
                    <input type="text" id="email">
                </div>
                <div class="password-form">
                    <label for="password">Password</label>
                    <input type="password" id="password">
                </div>
            </form>
        </div>
    </div>
@endsection
