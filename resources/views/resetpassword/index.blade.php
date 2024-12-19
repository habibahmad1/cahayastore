@extends('layouts.main')
@section('container')
@if(session('status'))
    <div class="alert alert-success text-center">
        {{ session('status') }}
    </div>
@endif

<!-- Menampilkan alert error -->
@if($errors->any())
<div class="alert alert-danger text-center">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<div class="container justify-content-center align-items-center min-vh-10">
    <div class="container d-flex justify-content-center align-items-center min-vh-10">
        <div class="card shadow-lg" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h4 class="card-title text-center mb-4">Reset Password</h4>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
