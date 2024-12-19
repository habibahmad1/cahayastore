@extends('layouts.main')

@section('container')
    {{-- <section class="testimoni" id="testimoni">
        <div class="text-testimoni">
            <h1>Apa Kata Customer Kami?</h1>
            <div class="next-text">
                <button class="button prev" onclick="showPrev()">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <button class="button next" onclick="showNext()">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
        <div class="testi-slider">

            <!-- Card Testimoni 1 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    Layanan dari tim ini sangat memuaskan! Mereka cepat, profesional,
                    dan benar-benar memahami apa yang saya butuhkan. Masalah listrik
                    saya selesai dalam waktu singkat. Sangat direkomendasikan!
                </p>
                <div class="profil-testi">
                    <img src="img/profil.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Rina Pratiwi</h3>
                        <small>Pengusaha</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 2 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    Pelayanan yang luar biasa! Saya menggunakan jasa mereka untuk
                    perbaikan rumah dan hasilnya sangat memuaskan. Pekerjaannya rapi
                    dan selesai tepat waktu. Saya sangat senang dengan hasilnya!
                </p>
                <div class="profil-testi">
                    <img src="img/profil2.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Doni Wahyudi</h3>
                        <small>Wirausaha</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 3 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    Mereka sangat profesional dan komunikatif. Tim ini bekerja dengan
                    sangat baik dan hasilnya bahkan melebihi ekspektasi saya.
                    Pekerjaan dilakukan dengan teliti dan hasil akhirnya sangat bagus.
                </p>
                <div class="profil-testi">
                    <img src="img/profil3.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Lina Suliati</h3>
                        <small>Manajer Proyek</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 4 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    Pekerjaan yang dilakukan benar-benar berkualitas tinggi! Tim ini
                    tahu apa yang mereka lakukan dan memberikan saran yang sangat
                    membantu. Sangat puas dengan layanan ini.
                </p>
                <div class="profil-testi">
                    <img src="img/profil4.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Rendi Kurniawan</h3>
                        <small>Manajer Bisnis</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 5 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    LED Fishing Light ini luar biasa! Sangat terang dan efisien, membantu saya memancing lebih efektif.
                    Baterainya tahan lama dan desainnya yang tahan air sangat praktis. Sangat direkomendasikan!
                </p>
                <div class="profil-testi">
                    <img src="img/profil5.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Sinta Mega Santaksa</h3>
                        <small>Manajer PT. Unggul</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 6 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    Pengalaman menikmati kopi luwak ini luar biasa! Rasa dan aromanya sangat khas dan mewah. Setiap cangkir
                    memberikan sensasi yang unik dan nikmat. Sangat direkomendasikan untuk pecinta kopi sejati.
                </p>
                <div class="profil-testi">
                    <img src="img/profil6.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Apfareta Salsa</h3>
                        <small>Staff Marketing</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 7 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    Playmat ini sangat memukau! Desainnya penuh warna dan menarik, serta bahannya lembut dan aman untuk
                    anak. Mudah dibersihkan dan sangat praktis digunakan. Sangat direkomendasikan!
                </p>
                <div class="profil-testi">
                    <img src="img/profil7.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Kurnoia Asih Pertiwi</h3>
                        <small>Manajer Marketing</small>
                    </div>
                </div>
            </div>

            <!-- Card Testimoni 8 -->
            <div class="card-testi">
                <div class="star-testi">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p>
                    Saya sangat puas dengan sandal ini! Desainnya stylish dan modern, nyaman dipakai sehari-hari, dan
                    sangat tahan lama. Sol anti slip memberikan keamanan ekstra. Sangat direkomendasikan!
                </p>
                <div class="profil-testi">
                    <img src="img/profil8.jpg" alt="profil" width="40px" style="border-radius: 40px" />
                    <div class="profil">
                        <h3>Abraham Panglapi</h3>
                        <small>Manajer Creatif 3D</small>
                    </div>
                </div>
            </div>

        </div>
    </section> --}}

    <h2 class="pt-5 text-center">{{ $title }}</h2>

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

                          <h5>Penulis : <a href="/authors/{{ $artikel[0]->user->username }}" style="color: #41a77e" class="text-decoration-none">{{ $artikel[0]->user->name }}</a> <a href="/categories/{{ $artikel[0]->kategoripost->slug }}" style="color: #41a77e" class="text-decoration-none badge text-bg-danger">{{ $artikel[0]->kategoripost->nama }}</a> </h5>

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

                        <div class="badge text-bg-danger"><a href="/categories/{{ $post->kategoripost->slug }}" class="text-white">{{ $post->kategoripost->nama }}</a></div>
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

@endsection
