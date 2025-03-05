@extends('layouts.main')

@section('container')
<h1>Katalog Produk</h1>

{{-- Filter Kategori --}}
<form method="GET" action="{{ url()->current() }}" class="mb-4">
    <label for="kategori">Filter Kategori: </label>
    <select name="kategori" id="kategori" class="form-select" onchange="this.form.submit()">
        <option value="">Pilih Kategori</option>
        @foreach ($kategori as $k)
            <option value="{{ $k->id }}" {{ request('kategori') == $k->id ? 'selected' : '' }}>
                {{ $k->nama}}
            </option>
        @endforeach
    </select>
</form>

{{-- Tombol Print --}}
<button onclick="window.print()" class="btn btn-primary mb-4">Print Katalog</button>

<div class="container-katalog">
    @foreach ($produk as $p)
    <div class="card-katalog">
        <h5>{{ $p->nama_produk }}</h5>
        <div class="image-katalog">
            <img src="{{ asset('storage/' . $p->gambar1) }}" alt="">
        </div>
        <div class="info-katalog">
            <div class="diskon-katalog">Diskon <br>{{ $p->diskon }}%</div>
            <div class="harga-katalog">
                <div class="harga-coret">Rp {{ number_format($p->harga / (1 - ($p->diskon / 100)), 0, ',', '.') }}</div>
                <div class="harga-asli">Rp {{ number_format($p->harga, 0, ',', '.') }}</div>
            </div>
        </div>

        {{-- Menampilkan ukuran --}}
        @if ($p->variasi->pluck('ukuran.ukuran')->unique()->isNotEmpty())
            <div class="ukuran">
                <strong>Ukuran: </strong>
                {{ $p->variasi->pluck('ukuran.ukuran')->unique()->implode(', ') }}
            </div>
        @else
            <div class="ukuran">-</div>
        @endif

        {{-- Menampilkan variasi warna --}}
        <div class="variasi d-flex">
            @foreach ($p->variasi->pluck('warna.warna')->unique() as $warna)
                <div class="card-variasi m-2 w-20 d-flex justify-content-evenly">
                    <p>{{ $warna ?? 'Tidak ada' }}</p>
                </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('css')
    <style>
        /* Print only style */
        @media print {
            /* Menyembunyikan navbar, form filter, dan tombol print saat print */
            .navbar, .container-katalog form, .btn, h1 {
                display: none;
            }
            .container-katalog {
                display: block;
            }
            .container-katalog .card-katalog {
                page-break-inside: avoid;
            }
        }
    </style>
@endsection
