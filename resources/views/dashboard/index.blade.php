@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ ucfirst(auth()->user()->name) }}</h1>
  </div>

  <div class="row">
    <div class="col-md-3 mb-4 card-anim">
      <a href="/dashboard/produk" class="text-decoration-none">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h3>Total Produk</h3>
            <hr>
            <h1>{{ $produk->count() }}</h1>
          </div>
        </div>
      </a>
    </div>

    @can('admin')
    <div class="col-md-3 mb-4 card-anim">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <h3>Kategori Produk</h3>
          <hr>
          <h1>{{ $kategori->count() }}</h1>
        </div>
      </div>
    </div>
    @endcan

    @can('admin')
    <div class="col-md-3 mb-4 card-anim">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <h3>Total User</h3>
          <hr>
          <h1>{{ $user->count() }}</h1>
        </div>
      </div>
    </div>
    @endcan

    @can('admin')
    <div class="col-md-3 mb-4 card-anim">
      <div class="card text-center shadow-sm">
        <div class="card-body">
          <h3>Total Artikel</h3>
          <hr>
          <h1>{{ $artikel->count() }}</h1>
        </div>
      </div>
    </div>
    @endcan

    <div class="col-md-3 mb-4 card-anim">
      <a href="/dashboard/artikel" class="text-decoration-none">
        <div class="card text-center shadow-sm">
          <div class="card-body">
            <h3>Artikel Saya</h3>
            <hr>
            <h1>{{ auth()->user()->artikel->count() }}</h1>
          </div>
        </div>
      </a>
    </div>
  </div>
@endsection
