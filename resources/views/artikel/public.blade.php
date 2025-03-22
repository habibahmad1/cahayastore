@extends('layouts.main')

@section('container')

<div class="kanvasAll">
    <article class="setiapArtikel">

        <h2>{{ $artikel->judul }}</h2>

        @php
        $gambarList = collect([$artikel->image, $artikel->gambar2, $artikel->gambar3, $artikel->gambar4, $artikel->gambar5])
            ->filter()
            ->all();
        $gambarCount = count($gambarList);
    @endphp

    @if ($gambarCount > 1)
    <div class="image-artikels-container d-flex flex-wrap">
        @foreach ($gambarList as $gambar)
        <div class="card-artikel-image">
            <div class="text-center postimg mb-4 mt-1">
                <img src="{{ asset('storage/' . $gambar) }}" alt="imgPost" class="rounded my-3" onclick="openModal('{{ asset('storage/' . $gambar) }}')">
            </div>
        </div>
        @endforeach

        @if ($artikel->video)
        <div class="card-artikel-image">
            <div class="text-center postimg mb-4 mt-1">
                <video width="600" controls>
                    <source src="{{ asset('storage/' . $artikel->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
        @endif
    </div>

    @elseif ($gambarCount == 1)
    <div class="d-flex align-items-center">
        <div class="gambarartikelsatu">
            <img src="{{ asset('storage/' . $gambarList[0]) }}" alt="imgPost" class="rounded my-3" onclick="openModal('{{ asset('storage/' . $gambarList[0]) }}')">
        </div>

        @if ($artikel->video)
        <div class="ms-3">
            <video width="600" controls>
                <source src="{{ asset('storage/' . $artikel->video) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        @endif
    </div>
    @endif

        <h6 class="fw-bold my-3">Penulis :<a href="/authors/{{ $artikel->user->username }}" style="color: #41a77e" class="text-decoration-none"> {{ $artikel->user->name }} </a>
            <div class="badge text-bg-danger"><a href="/category/{{ $artikel->kategoripost->slug }}" class="text-white text-decoration-none">{{ $artikel->kategoripost->nama }}</a></div>
            <a class="text-info text-decoration-none">{{ $artikel->created_at->diffForHumans() }}</a>
            </h6>

        <p>{!! $artikel->body !!}</p>
        <a href="/artikel" class="kembaliButton my-5 btn btn-primary"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
    </article>

</div>

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
                    Download
                </a>

                <!-- Tombol Next -->
                <button id="nextBtn" class="btn btn-dark">
                    Berikutnya <i class="fa-solid fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(imageSrc) {
        document.getElementById('modalImage').src = imageSrc;
        document.getElementById('downloadBtn').href = imageSrc;
        var modal = new bootstrap.Modal(document.getElementById('imageModal'));
        modal.show();
    }

    document.addEventListener('DOMContentLoaded', function () {
    var imageModal = document.getElementById('imageModal');

    imageModal.addEventListener('hidden.bs.modal', function () {
        // Hapus elemen backdrop yang masih tertinggal
        document.querySelectorAll('.modal-backdrop').forEach(el => el.remove());
        document.body.classList.remove('modal-open'); // Hapus class modal-open dari body
        document.body.style.paddingRight = ''; // Reset padding yang ditambahkan Bootstrap
    });
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const cardArtikels = document.querySelectorAll(".card-artikel-image img");
    let currentIndex = 0;
    let images = [];

    if (cardArtikels.length > 0) {
        // Simpan semua gambar dalam array
        images = Array.from(cardArtikels).map((img) => img.src);

        cardArtikels.forEach((img, index) => {
            img.addEventListener("click", function () {
                currentIndex = index;
                updateModalImage();
                const imageModal = new bootstrap.Modal(
                    document.getElementById("imageModal")
                );
                imageModal.show();
            });
        });

        // Event listener untuk tombol Next
        document
            .getElementById("nextBtn")
            .addEventListener("click", function () {
                currentIndex = (currentIndex + 1) % images.length;
                updateModalImage();
            });

        // Event listener untuk tombol Previous
        document
            .getElementById("prevBtn")
            .addEventListener("click", function () {
                currentIndex =
                    (currentIndex - 1 + images.length) % images.length;
                updateModalImage();
            });

        function updateModalImage() {
            let modalImage = document.getElementById("modalImage");
            let downloadBtn = document.getElementById("downloadBtn");

            modalImage.src = images[currentIndex]; // Set gambar di modal
            downloadBtn.href = images[currentIndex]; // Set link download ke gambar yang tampil
        }
    }
});

</script>

@endsection
