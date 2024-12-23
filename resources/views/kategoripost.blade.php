@extends('./layouts/main')
@section('container')

<h1 class="text-center pt-4 mb-3">All Kategori Artikel</h1>
<div class="kanvas">
    <div class="artikelPost">
        <div class="content-informasi">
            <div class="row g-4 d-flex justify-content-evenly px-3"> <!-- Gunakan d-flex dan justify-content-between -->
                @foreach ($categories as $post)
                <div class="col-md-4"> <!-- Kolom untuk grid -->
                    <div class="position-relative mb-4 p-2 border rounded"> <!-- Tambahkan padding dan border -->
                        <!-- Gambar dengan overlay -->
                        <a href="/category/{{ $post->slug }}" class="text-decoration-none">
                            <!-- Overlay di atas gambar -->
                            <div class="position-relative overflow-hidden rounded">
                                <img src="https://picsum.photos/seed/{{ $post->nama }}/600/200" alt="imgPost" class="img-fluid rounded">
                                <!-- Overlay dengan teks di tengah -->
                                <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                                    <h2 class="text-white fs-4 text-center">{{ $post->judul }}</h2>
                                </div>
                            </div>
                            <!-- Teks di depan gambar, posisikan di tengah -->
                            <span class="position-absolute z-index-3 text-white text-center w-100" style="top: 50%; transform: translateY(-50%);">{{ $post->nama }}</span>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
