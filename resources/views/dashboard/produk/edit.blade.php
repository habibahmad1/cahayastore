@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Produk</h1>
</div>

@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

<div class="col-md-3">
    <a href="/dashboard/produk" class="btn btn-primary"><i class="bi bi-arrow-left"></i> Ke Produk</a>
    <a href="/dashboard/databarang" class="btn btn-warning"><i class="bi bi-arrow-left"></i> Ke Data Stok Produk</a>
</div>

<div class="col-lg-8 mt-3 mb-5">
    <form method="POST" action="/dashboard/produk/{{ $produk->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama_produk" class="form-label">Nama Produk <span class="penting">*</span></label>
          <input type="text" class="form-control @error('nama_produk')
              is-invalid
          @enderror" id="nama_produk" name="nama_produk" autofocus value="{{ old('nama_produk', $produk->nama_produk) }}">
          @error('nama_produk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug <span class="penting">*</span></label>
          <input type="text" class="form-control  @error('slug')
              is-invalid
          @enderror" id="slug" name="slug" readonly value="{{ old('slug', $produk->slug) }}">
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="kategori_id" class="form-label">Kategori <span class="penting">*</span></label>
            <select class="form-select" name="kategori_id" id="kategori_id">
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}"
                        {{ old('kategori_id', $produk->kategori_id) == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="kode_produk" class="form-label">Kode Produk <span class="text-secondary">(Optional)</span></label>
            <input type="text" class="form-control @error('kode_produk')
              is-invalid
          @enderror" id="kode_produk" name="kode_produk" value="{{ old('kode_produk',$produk->kode_produk) }}">
          @error('kode_produk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
          </div>

                <!-- Gambar 1 -->
        <div class="mb-3">
            <label for="gambar1" class="form-label">Gambar 1 <span class="penting">*</span></label>

            @if ($produk->gambar1)
                <img src="{{ asset('storage/' . $produk->gambar1) }}" class="img-preview-1 img-fluid mb-3 d-block" style="max-height: 200px">
            @else
                <img class="img-preview-1 img-fluid mb-3 d-none" style="max-height: 200px">
            @endif
            <input class="form-control @error('gambar1') is-invalid @enderror" type="file" id="gambar1" name="gambar1" onchange="previewImg('gambar1', 'img-preview-1')">

            @error('gambar1')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Gambar 2 -->
        <div class="mb-3">
            <label for="gambar2" class="form-label">Gambar 2 <span class="text-secondary">(Optional)</span></label>

            @if ($produk->gambar2)
                <img src="{{ asset('storage/' . $produk->gambar2) }}" class="img-preview-2 img-fluid mb-3 d-block" style="max-height: 200px">
            @else
                <img class="img-preview-2 img-fluid mb-3 d-none" style="max-height: 200px">
            @endif
            <input class="form-control @error('gambar2') is-invalid @enderror" type="file" id="gambar2" name="gambar2" onchange="previewImg('gambar2', 'img-preview-2')">

            @error('gambar2')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Gambar 3 -->
        <div class="mb-3">
            <label for="gambar3" class="form-label">Gambar 3 <span class="text-secondary">(Optional)</span></label>
            <br>
            @if ($produk->gambar3)
                <img src="{{ asset('storage/' . $produk->gambar3) }}" class="img-preview-3 img-fluid mb-3 d-block" style="max-height: 200px">
            @else
                <img class="img-preview-3 img-fluid mb-3 d-none" style="max-height: 200px">
            @endif
            <input class="form-control @error('gambar3') is-invalid @enderror" type="file" id="gambar3" name="gambar3" onchange="previewImg('gambar3', 'img-preview-3')">

            @error('gambar3')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Gambar 4 -->
        <div class="mb-3">
            <label for="gambar4" class="form-label">Gambar 4 <span class="text-secondary">(Optional)</span></label>
            <br>
            @if ($produk->gambar4)
                <img src="{{ asset('storage/' . $produk->gambar4) }}" class="img-preview-4 img-fluid mb-3 d-block" style="max-height: 200px">
            @else
                <img class="img-preview-4 img-fluid mb-3 d-none" style="max-height: 200px">
            @endif
            <input class="form-control @error('gambar4') is-invalid @enderror" type="file" id="gambar4" name="gambar4" onchange="previewImg('gambar4', 'img-preview-4')">

            @error('gambar4')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Gambar 5 -->
        <div class="mb-3">
            <label for="gambar5" class="form-label">Gambar 5 <span class="text-secondary">(Optional)</span></label>
            <br>
            @if ($produk->gambar5)
                <img src="{{ asset('storage/' . $produk->gambar5) }}" class="img-preview-5 img-fluid mb-3 d-block" style="max-height: 200px">
            @else
                <img class="img-preview-5 img-fluid mb-3 d-none" style="max-height: 200px">
            @endif
            <input class="form-control @error('gambar5') is-invalid @enderror" type="file" id="gambar5" name="gambar5" onchange="previewImg('gambar5', 'img-preview-5')">

            @error('gambar5')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Video -->
        <div class="mb-3">
            <label for="video" class="form-label">Video <span class="text-secondary">(Optional)</span></label>

            @if ($produk->video)
                <div class="video-preview mb-3 d-block">
                    <video width="200" controls>
                        <source src="{{ asset('storage/' . $produk->video) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            @else
                <div class="video-preview-placeholder mb-3 d-none" style="max-height: 200px;"></div>
            @endif

            <input class="form-control @error('video') is-invalid @enderror" type="file" id="video" name="video" onchange="previewVideo('video', 'video-preview')">

            @error('video')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="stok" class="form-label">Total Stok Produk <span class="penting">*</span></label>
            <input type="number" class="form-control @error('stok')
              is-invalid
          @enderror" id="stok" name="stok" value="{{ old('stok',$produk->stok) }}">
          @error('stok')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="berat" class="form-label">Berat Produk <span class="penting">*</span></label>
            <input type="number" class="form-control @error('berat')
              is-invalid
          @enderror" id="berat" name="berat" value="{{ old('berat', $produk->berat) }}">
          @error('berat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="dimensi" class="form-label">Dimensi Produk <span class="text-secondary">(Optional)</span></label>
            <input type="number" class="form-control @error('dimensi')
              is-invalid
          @enderror" id="dimensi" name="dimensi" value="{{ old('dimensi',$produk->dimensi) }}">
          @error('dimensi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon Produk <span class="penting">*</span></label>
            <input type="number" class="form-control @error('diskon')
              is-invalid
          @enderror" id="diskon" name="diskon" value="{{ old('diskon', $produk->diskon) }}">
          @error('diskon')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status Produk <span class="penting">*</span></label>
            <select class="form-select" name="status">
                <option value="tersedia" {{ old('status', $produk->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="habis" {{ old('status', $produk->status) == 'habis' ? 'selected' : '' }}>Habis</option>
                <option value="pre-order" {{ old('status', $produk->status) == 'pre-order' ? 'selected' : '' }}>Pre-Order</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Produk <span class="penting">*</span></label>
            <input type="number" class="form-control @error('harga')
              is-invalid
          @enderror" id="harga" name="harga" value="{{ old('harga',$produk->harga) }}">
          @error('harga')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi <span class="penting">*</span></label>
          @error('deskripsi')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi',$produk->deskripsi) }}">
          <trix-editor input="deskripsi"></trix-editor>
        </div>
        <div class="mb-3">
            <h3>Variasi Produk</h3>
            <div id="variasi-container">
                @foreach ($produk->variasi as $key => $variasi)
                    <div class="variasi-item mb-3" id="variasi-item-{{ $key }}">
                        <input type="hidden" name="variasi[{{ $key }}][id]" value="{{ $variasi->id }}">

                        <div class="mb-3">
                            <label for="warna_{{ $key }}" class="form-label">Warna/Varian</label>
                            <input type="text" class="form-control" name="variasi[{{ $key }}][warna]" id="warna_{{ $key }}"
                                   value="{{ old("variasi.$key.warna", $variasi->warna->warna ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="ukuran_{{ $key }}" class="form-label">Ukuran(Kosongkan jika tidak ada)</label>
                            <input type="text" class="form-control" name="variasi[{{ $key }}][ukuran]" id="ukuran_{{ $key }}"
                                   value="{{ old("variasi.$key.ukuran", $variasi->ukuran->ukuran ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="stok_{{ $key }}" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="variasi[{{ $key }}][stok]" id="stok_{{ $key }}"
                                   value="{{ old("variasi.$key.stok", $variasi->stok ?? '') }}">
                        </div>
                        <div class="mb-3">
                            <label for="gambar_{{ $key }}" class="form-label">Gambar <span class="penting">*</span></label>
                            @if ($variasi->gambar)
                                <img src="{{ asset('storage/' . $variasi->gambar->gambar) }}" class="img-preview-{{ $key }} img-fluid mb-3 d-block" style="max-height: 200px">
                            @else
                                <img id="img-preview-{{ $key }}" class="img-preview-{{ $key }} img-fluid mb-3 d-none" style="max-height: 200px">
                            @endif
                            <input class="form-control" type="file" name="variasi[{{ $key }}][gambar]" id="gambar_{{ $key }}" onchange="previewImgVariasi(event, 'img-preview-{{ $key }}')">
                        </div>
                        <button type="button" class="btn btn-danger btn-sm mt-2 hapus-variasi" data-id="variasi-item-{{ $key }}">Hapus Variasi</button>
                        <hr>
                    </div>
                @endforeach
            </div>
            <input type="hidden" id="deleted_variasi_ids" name="deleted_variasi_ids">
            <button type="button" class="btn btn-secondary mt-2" id="tambah-variasi">Tambah Variasi</button>
        </div>
        <button type="submit" class="btn btn-primary mb-5">Edit Produk</button>
    </form>
</div>

<script>
    const title = document.querySelector("#nama_produk");
    const slug = document.querySelector("#slug");

    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g,"-");
        slug.value = preslug.toLowerCase();
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>

<script>
    let variasiIndex = 1; // Index awal untuk variasi

    document.getElementById('tambah-variasi').addEventListener('click', function () {
        const container = document.getElementById('variasi-container');

        const item = document.createElement('div');
        item.classList.add('variasi-item', 'mb-3');
        item.setAttribute('id', `variasi-item-${variasiIndex}`); // Set ID untuk identifikasi
        item.innerHTML = `
            <div class="mb-3">
                <label for="warna_${variasiIndex}" class="form-label">Warna/Varian  <span class="penting">*</span></label>
                <input type="text" class="form-control" name="variasi[${variasiIndex}][warna]" id="warna_${variasiIndex}">
            </div>
            <div class="mb-3">
                <label for="ukuran_${variasiIndex}" class="form-label">Ukuran (kosongkan jika tidak ada)</label>
                <input type="text" class="form-control" name="variasi[${variasiIndex}][ukuran]" id="ukuran_${variasiIndex}">
            </div>
            <div class="mb-3">
                <label for="stok_${variasiIndex}" class="form-label">Stok  <span class="penting">*</span></label>
                <input type="number" class="form-control" name="variasi[${variasiIndex}][stok]" id="stok_${variasiIndex}">
            </div>
            <div class="mb-3">
                <label for="gambar_${variasiIndex}" class="form-label">Gambar <span class="penting">*</span></label>
                <input class="form-control" type="file" name="variasi[${variasiIndex}][gambar]" id="gambar_${variasiIndex}" required>
            </div>
            <button type="button" class="btn btn-danger btn-sm mt-2 hapus-variasi" data-id="variasi-item-${variasiIndex}">Hapus Variasi</button>
            <hr>
        `;

        container.appendChild(item); // Tambahkan field variasi baru ke form
        variasiIndex++; // Increment index
    });

    // Event listener untuk menghapus variasi
    document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('hapus-variasi')) {
        if (confirm('Apakah Anda yakin ingin menghapus variasi ini?')) {
            const itemId = e.target.getAttribute('data-id');
            const item = document.getElementById(itemId);
            const inputId = item.querySelector('input[name*="[id]"]'); // Cari ID variasi

            // Tambahkan ID ke input hidden jika variasi memiliki ID
            if (inputId && inputId.value) {
                const deletedInput = document.getElementById('deleted_variasi_ids');
                const currentIds = deletedInput.value ? JSON.parse(deletedInput.value) : [];
                currentIds.push(inputId.value); // Tambahkan ID variasi ke daftar
                deletedInput.value = JSON.stringify(currentIds);
            }

            item.remove(); // Hapus elemen variasi dari DOM
        }
    }
});

// Fungsi untuk preview gambar
function previewImg(inputId, previewClass) {
    const input = document.getElementById(inputId);
    const preview = document.querySelector(`.${previewClass}`);
    const file = input.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result; // Set src untuk gambar preview
            preview.classList.remove('d-none'); // Menampilkan gambar preview
        };
        reader.readAsDataURL(file); // Membaca file gambar sebagai DataURL
    } else {
        preview.classList.add('d-none'); // Sembunyikan gambar preview jika tidak ada file
    }
}

// Fungsi untuk preview video
function previewVideo(inputId, previewClass) {
    const input = document.getElementById(inputId);
    const preview = document.querySelector(`.${previewClass}`);
    const file = input.files[0];

    if (file) {
        const videoPreview = preview.querySelector('video');
        const objectURL = URL.createObjectURL(file);
        videoPreview.src = objectURL; // Set src untuk video preview
        preview.classList.remove('d-none'); // Menampilkan video preview
    } else {
        preview.classList.add('d-none'); // Sembunyikan video preview jika tidak ada file
    }
}


// Fungsi untuk preview gambar
function previewImgVariasi(event, previewId) {
    const file = event.target.files[0]; // Ambil file gambar yang dipilih
    const preview = document.getElementById(previewId); // Ambil elemen preview gambar

    // Jika ada file yang dipilih
    if (file) {
        const reader = new FileReader();
        reader.onload = function () {
            preview.src = reader.result; // Set gambar preview dengan file baru
            preview.style.display = 'block'; // Menampilkan gambar preview
        };
        reader.readAsDataURL(file); // Membaca file gambar sebagai DataURL
    } else {
        preview.style.display = 'none'; // Jika tidak ada file, sembunyikan preview
    }
}



</script>



@endsection
