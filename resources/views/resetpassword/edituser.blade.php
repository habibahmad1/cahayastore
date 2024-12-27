@extends('dashboard.layouts.main')
@section('container')
<h2 class="settings-title my-3">Edit Profil</h2>
<hr>
<div class="box-edit-user col-lg-3">
    <form method="POST" action="/dashboard/settings/updateuser" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap <span class="penting">*</span></label>
        <input type="text" class="form-control @error('name')
            is-invalid
        @enderror" id="name" name="name" autofocus value="{{ old('name', $user->name) }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username <span class="penting">*</span></label>
            <input
                type="text"
                class="form-control @error('username') is-invalid @enderror"
                id="username"
                name="username"
                value="{{ old('username', $user->username) }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="penting">*</span></label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>


@endsection
