@extends('./layouts/main')
@section('container')


<div class="kategori-wrapper">
    <h1 class="text-center pt-5 mb-3 text-white">All Kategori Produk</h1>
    <div class="kanvas py-5">
        <div class="artikelPost">
            <div class="content-informasi">
                <div class="row g-4 d-flex justify-content-evenly px-3">
                    @foreach ($categoriproduk as $post)
                    <div class="col-md-4">
                        <div class="position-relative mb-4 p-2 border rounded">
                            <a href="/kategori/{{ $post->slug }}" class="text-decoration-none">
                                <div class="position-relative overflow-hidden rounded">
                                    <img src="https://picsum.photos/seed/{{ $post->nama }}/600/200" alt="imgPost" class="img-fluid rounded">
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                                        <h2 class="text-white text-center">{{ $post->judul }}</h2>
                                    </div>
                                </div>
                                <span class="position-absolute z-index-3 text-white text-center w-100" style="top: 50%; transform: translateY(-50%);">{{ $post->nama }}</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h1 class="text-center pt-4 mb-3">All Kategori Artikel</h1>
    <div class="kanvas py-5">
        <div class="artikelPost">
            <div class="content-informasi">
                <div class="row g-4 d-flex justify-content-evenly px-3">
                    @foreach ($categories as $post)
                    <div class="col-md-4">
                        <div class="position-relative mb-4 p-2 border rounded">
                            <a href="/category/{{ $post->slug }}" class="text-decoration-none">
                                <div class="position-relative overflow-hidden rounded">
                                    <img src="https://picsum.photos/seed/{{ $post->nama == 'Informasi' ? 'nature' : $post->nama }}/600/200"
                                    alt="imgPost"
                                    class="img-fluid rounded">
                                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
                                        <h2 class="text-white text-center">{{ $post->judul }}</h2>
                                    </div>
                                </div>
                                <span class="position-absolute z-index-3 text-white text-center w-100" style="top: 50%; transform: translateY(-50%);">{{ $post->nama }}</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
