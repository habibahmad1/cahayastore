@extends('layouts.main')

@section('container')

    <div class="artikel-container">

        <h2 class="pt-5 text-center text-white">{{ $title }}</h2>

        <div class="pencarian col-lg-8 px-3 mx-auto">
            <form action="/artikel">
                <div class="input-group mt-3 ">
                    <input type="text" class="form-control" placeholder="Cari Artikel.." name="search" value="{{ request('search') }}" id="search-box">
                    <button class="btn btn-warning" style="background-color: #ffa135" type="submit">Cari</button>
                </div>
            </form>
        </div>

        <section class="artikel">
            <div class="artikelPost">

                {{-- Content Informasi --}}
                <div class="content-informasi">

                    <div class="heroimg">

                        @if ($artikel->count())

                        <div class="card my-5 text-center">
                            @if ($artikel[0]->image)

                                <div class="text-center gambarTiapPost" style="max-height: 350px; overflow:hidden">
                                    <img src="{{ asset('storage/' . $artikel[0]->image) }}"  alt="imgPost" width="1200" class="rounded">
                                </div>

                            @else
                                <img src="https://picsum.photos/seed/{{ $artikel[0]->kategoripost->nama }}/1200/400" class="card-img-top" alt="{{ $artikel[0]->kategoripost->nama }}">
                            @endif

                            <div class="card-body">
                              <h3 class="card-title" style="color: #41a77e"><a href="artikel/{{ $artikel[0]->slug }}" class="text-decoration-none" style="color: #41a77e">{{ $artikel[0]->judul }}</a></h3>

                              <h5>Penulis : <a href="/authors/{{ $artikel[0]->user->username }}" style="color: #41a77e" class="text-decoration-none">{{ $artikel[0]->user->name }}</a> <a href="/category/{{ $artikel[0]->kategoripost->slug }}" style="color: #41a77e" class="text-decoration-none badge text-bg-danger">{{ $artikel[0]->kategoripost->nama }}</a> </h5>

                              <p class="card-text">{{ $artikel[0]->excerpt }}</p>
                              <p class="card-text"><small class="text-info fw-bold">{{ $artikel[0]->created_at->diffForHumans() }}</small></p>

                              <a href="/artikel/{{ $artikel[0]->slug }}" class="selengkapnya my-2 d-inline-block" style="color: black">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>

                    <div class="all-card">
                    @foreach ($artikel->skip(1) as $post)
                        <article class="mb-5 artikel-card">
                            @if ($post->image)
                                <div class="text-center gambarTiapPost rounded mb-3" style="max-height: 150px; overflow:hidden">
                                    <img src="{{ asset('storage/' . $post->image) }}"  alt="imgPost" class="rounded mb-3">
                                </div>
                            @else
                                <div class="text-center gambarTiapPost">
                                    <img src="https://picsum.photos/seed/{{ $post->kategoripost->nama }}/1200/600"  alt="imgPost" class="rounded mb-3">
                                </div>
                                {{-- <div class="text-center gambarTiapPost">
                                    <img src="https://source.unsplash.com/500x400?{{ $post->category->nama }}"  alt="imgPost" class="rounded mb-3">
                                </div> --}}
                            @endif

                            <a href="/artikel/{{ $post->slug }}">
                                <h4 style="color: #41a77e">{{ $post->judul }}</h4>
                            </a>

                            <small class="fw-bold">Penulis :<a href="/authors/{{ $post->user->username }}" style="color: #41a77e" > {{ $post->user->name }} </a>

                            <div class="badge text-bg-danger"><a href="/category/{{ $post->kategoripost->slug }}" class="text-white">{{ $post->kategoripost->nama }}</a></div>
                               <br> <a class="text-info">{{ $post->created_at->diffForHumans() }}</a>
                            </small>


                            <p>{{ $post->excerpt }}</p>

                            <a href="/artikel/{{ $post->slug }}" class="btn-more" style="color: black">Baca Selengkapnya</a>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
            @else
                <p class="text-center fs-4  ">Artikel Tidak Ditemukan</p>
            @endif
            <div class="pagination justify-content-center">
                {{ $artikel->links() }}
            </div>
        </div>
        </section>

        <button id="back-to-top" class="btn" style="background-color: #fd8c45; color: white; display: none; position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
            <i class="fa-solid fa-angle-up"></i>
        </button>


    <script>
        // Menampilkan tombol jika scroll lebih dari 100px
        const backToTopButton = document.getElementById("back-to-top");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 100) {
                backToTopButton.style.display = "block";
            } else {
                backToTopButton.style.display = "none";
            }
        });

        // Scroll ke atas saat tombol diklik
        backToTopButton.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
    @endsection
</div>
