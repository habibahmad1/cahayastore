@extends('layouts.main')
@section('container')
<h1 class="mb-5">Kategori Produk</h1>

    @if($kategori->isEmpty())
        <p>Tidak ada kategori yang tersedia.</p>
    @else
        <ul>
            @foreach($kategori as $kategoriproduk)
                <li>
                    <h2>
                        <a href="/allkategori/{{ $kategoriproduk->slug }}">
                            {{ $kategoriproduk->nama }}
                        </a>
                    </h2>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
