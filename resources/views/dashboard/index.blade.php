@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ ucfirst(auth()->user()->name) }}</h1>
  </div>

  <div class="card-jml-produk">
    <a href="/dashboard/produk" class="text-decoration-none"><div class="info">
        <h3>Total Produk</h3>
        <hr>
        <h1>{{ $produk->count() }}</h1>
      </div></a>

      <div class="info">
        <h3>Total Kategori</h3>
        <hr>
        <h1>{{ $kategori->count() }}</h1>
      </div>

      @can('admin')
      <div class="info">
        <h3>Total User</h3>
        <hr>
        <h1>{{ $user->count() }}</h1>
      </div>
      @endcan

      <a href="/dashboard/artikel" class="text-decoration-none">
        <div class="info">
            <h3>Artikel Saya</h3>
            <hr>
            <h1>{{  auth()->user()->artikel->count()  }}</h1>
        </div>
      </a>

  </div>

@endsection
