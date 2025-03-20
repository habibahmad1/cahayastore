@extends('./dashboard.layouts.main')

@section('container')

<div class="kanvasAll">
    <article class="setiapArtikel">

        <h2>{{ $artikel->judul }}</h2>

        <a href="/dashboard/artikel/{{ $artikel->slug }}/edit" class="badge bg-success py-2 text-decoration-none"><i class="fa-solid fa-pencil"></i> Edit</a>
        <form action="/dashboard/artikel/{{ $artikel->slug }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0 py-2" onclick="return confirm('Yakin Mau Hapus?')"><i class="fa-solid fa-trash-can"></i> Delete</button>
        </form>

        <div class="image-artikels-container">
            <div class="card-artikel-image">
                @if ($artikel->image)
                <div class="text-center postimg mb-4 mt-1">
                    <img src="{{ asset('storage/' . $artikel->image) }}" alt="imgPost" class="rounded my-3">
                </div>
                @else
                <div class="text-center postimg mb-4 mt-1">
                    <img src="https://picsum.photos/seed/{{ $artikel->kategoripost->nama }}/1200/600" alt="imgPost" class="rounded my-3">
                </div>
                @endif
            </div>
            <div class="card-artikel-image">
                @if ($artikel->gambar2)
                <div class="text-center postimg mb-4 mt-1">
                    <img src="{{ asset('storage/' . $artikel->gambar2) }}" alt="imgPost2" class="rounded my-3">
                </div>
                @endif
            </div>
            <div class="card-artikel-image">
                @if ($artikel->gambar3)
                <div class="text-center postimg mb-4 mt-1">
                    <img src="{{ asset('storage/' . $artikel->gambar3) }}" alt="imgPost3" class="rounded my-3">
                </div>
                @endif
            </div>
            <div class="card-artikel-image">
                @if ($artikel->gambar4)
                    <div class="text-center postimg mb-4 mt-1">
                        <img src="{{ asset('storage/' . $artikel->gambar4) }}" alt="imgPost4" class="rounded my-3">
                    </div>
                @endif
            </div>
            <div class="card-artikel-image">
                @if ($artikel->gambar5)
                    <div class="text-center postimg mb-4 mt-1">
                        <img src="{{ asset('storage/' . $artikel->gambar5) }}" alt="imgPost5" class="rounded my-3">
                    </div>
                @endif
            </div>
            <div class="card-artikel-image">
                @if ($artikel->video)
                <div class="text-center postimg mb-4 mt-1">
                    <video width="600" controls>
                        <source src="{{ asset('storage/' . $artikel->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @endif
            </div>
        </div>

        <h6 class="fw-bold mb-3">Penulis :<a href="/authors/{{ $artikel->user->username }}" style="color: #41a77e" class="text-decoration-none"> {{ $artikel->user->name }} </a>

            <div class="badge text-bg-danger"><a href="/category/{{ $artikel->kategoripost->slug }}" class="text-white text-decoration-none">{{ $artikel->kategoripost->nama }}</a></div>
            <a class="text-info text-decoration-none">{{ $artikel->created_at->diffForHumans() }}</a>
        </h6>

        <p>{!! $artikel->body !!}</p>
        <a href="/dashboard/artikel" class="kembaliButton my-5 btn btn-primary"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
    </article>

    <!-- Modal Bootstrap -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="imageModalLabel">Preview Gambar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <!-- Gambar Modal -->
                <img id="modalImage" src="" class="img-fluid rounded" alt="Preview Image">
            </div>
            <div class="modal-footer d-flex justify-content-between">
                <!-- Tombol Previous -->
                <button id="prevBtn" class="btn btn-dark">
                    <i class="fa-solid fa-chevron-left"></i> Sebelumnya
                </button>

                <!-- Tombol Download -->
                <a id="downloadBtn" href="" download class="btn btn-primary">
                    <i class="fa-solid fa-download"></i> Download
                </a>

                <!-- Tombol Next -->
                <button id="nextBtn" class="btn btn-dark">
                    Berikutnya <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

</div>

@endsection
