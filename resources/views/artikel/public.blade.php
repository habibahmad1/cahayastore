@extends('layouts.main')

@section('container')

<div class="kanvasAll">
    <article class="setiapArtikel">

        <h2>{{ $artikel->judul }}</h2>

        @if ($artikel->image)

            <div class="text-center gambarTiapPost postimg mb-4 mt-1">
                <img src="{{ asset('storage/' . $artikel->image) }}"  alt="imgPost" class="rounded my-3">
            </div>

        @else
            <div class="text-center gambarTiapPost postimg mb-4 mt-1">
                <img src="https://picsum.photos/seed/{{ $artikel->kategoripost->nama }}/1200/600"  alt="imgPost" class="rounded my-3">
            </div>
        @endif

        <h6 class="fw-bold mb-3">Penulis :<a href="/authors/{{ $artikel->user->username }}" style="color: #41a77e" class="text-decoration-none"> {{ $artikel->user->name }} </a>
            <div class="badge text-bg-danger"><a href="/categories/{{ $artikel->kategoripost->slug }}" class="text-white text-decoration-none">{{ $artikel->kategoripost->nama }}</a></div>
            <a class="text-info text-decoration-none">{{ $artikel->created_at->diffForHumans() }}</a>
            </h6>

        <p>{!! $artikel->body !!}</p>
        <a href="/artikel" class="kembaliButton my-5 btn btn-primary"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
    </article>
</div>

@endsection
