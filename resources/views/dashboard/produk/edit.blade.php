@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Produk</h1>
</div>

<div class="col-lg-8 mt-3 mb-5">
    <form method="POST" action="/dashboard/produk/{{ $produk->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama_produk" class="form-label">Nama Produk</label>
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
          <label for="slug" class="form-label">Slug</label>
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
            <label for="kategori_id" class="form-label">Kategori</label>
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
            <label for="kode_produk" class="form-label">Kode Produk</label>
            <input type="text" class="form-control @error('kode_produk')
              is-invalid
          @enderror" id="kode_produk" name="kode_produk" value="{{ old('kode_produk',$produk->kode_produk) }}">
          @error('kode_produk')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
          </div>

          <div class="mb-3">
            <label for="gambar1" class="form-label">Gambar 1 <span class="penting">*</span></label>

            @if ($produk->gambar1)
                <img src="{{ asset('storage/' . $produk->gambar1) }}" class="img-preview-1 img-fluid mb-3 d-block" style="max-height: 100px">
            @else
                <!-- Preview Gambar 1 -->
                <img class="img-preview-1 img-fluid mb-3">
            @endif
            <input class="form-control @error('gambar1') is-invalid @enderror" type="file" id="gambar1" name="gambar1" onchange="previewImg('gambar1', 'img-preview-1')">

            @error('gambar1')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar2" class="form-label">Gambar 2</label>

            @if ($produk->gambar2)
                <img src="{{ asset('storage/' . $produk->gambar2) }}" class="img-preview-2 img-fluid mb-3 d-block" style="max-height: 100px">
            @else
                <!-- Preview Gambar 2 -->
                <img class="img-preview-2 img-fluid mb-3" style="max-height: 100px">
            @endif
            <input class="form-control @error('gambar2') is-invalid @enderror" type="file" id="gambar2" name="gambar2" onchange="previewImg('gambar2', 'img-preview-2')">

            @error('gambar2')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar3" class="form-label">Gambar 3</label>

            @if ($produk->gambar3)
                <img src="{{ asset('storage/' . $produk->gambar3) }}" class="img-preview-3 img-fluid mb-3 d-block" style="max-height: 100px">
            @else
                <!-- Preview Gambar 3 -->
                <img class="img-preview-3 img-fluid mb-3" style="max-height: 100px">
            @endif
            <input class="form-control @error('gambar3') is-invalid @enderror" type="file" id="gambar3" name="gambar3" onchange="previewImg('gambar3', 'img-preview-3')">

            @error('gambar3')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar4" class="form-label">Gambar 4</label>

            @if ($produk->gambar4)
                <img src="{{ asset('storage/' . $produk->gambar4) }}" class="img-preview-4 img-fluid mb-3 d-block" style="max-height: 100px">
            @else
                <!-- Preview Gambar 4 -->
                <img class="img-preview-4 img-fluid mb-3" style="max-height: 100px">
            @endif
            <input class="form-control @error('gambar4') is-invalid @enderror" type="file" id="gambar4" name="gambar4" onchange="previewImg('gambar4', 'img-preview-4')">

            @error('gambar4')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar5" class="form-label">Gambar 5</label>

            @if ($produk->gambar5)
                <img src="{{ asset('storage/' . $produk->gambar5) }}" class="img-preview-5 img-fluid mb-3 d-block" style="max-height: 100px">
            @else
                <!-- Preview Gambar 5 -->
                <img class="img-preview-5 img-fluid mb-3" style="max-height: 100px">
            @endif
            <input class="form-control @error('gambar5') is-invalid @enderror" type="file" id="gambar5" name="gambar5" onchange="previewImg('gambar5', 'img-preview-5')">

            @error('gambar5')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok Produk</label>
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
            <label for="berat" class="form-label">Berat Produk</label>
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
            <label for="dimensi" class="form-label">Dimensi Produk</label>
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
            <label for="diskon" class="form-label">Diskon Produk</label>
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
            <label for="status" class="form-label">Status Produk</label>
            <select class="form-select" name="status">
                <option value="tersedia" {{ old('status', $produk->status) == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="habis" {{ old('status', $produk->status) == 'habis' ? 'selected' : '' }}>Habis</option>
                <option value="pre-order" {{ old('status', $produk->status) == 'pre-order' ? 'selected' : '' }}>Pre-Order</option>
            </select>

        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Produk</label>
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
          <label for="deskripsi" class="form-label">Deskripsi</label>
          @error('deskripsi')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="deskripsi" type="hidden" name="deskripsi" value="{{ old('deskripsi',$produk->deskripsi) }}">
          <trix-editor input="deskripsi"></trix-editor>
        </div>
        <div class="mb-3">
            <h3>Variasi Produk</h3>
            <div id="variasi-container">
                <!-- Variasi pertama (default) -->
                <div class="variasi-item">
                    <div class="mb-3">
                        <label for="warna_0" class="form-label">Warna</label>
                        <input type="text" class="form-control" name="variasi[0][warna]" id="warna_0">
                    </div>
                    <div class="mb-3">
                        <label for="ukuran_0" class="form-label">Ukuran</label>
                        <input type="text" class="form-control" name="variasi[0][ukuran]" id="ukuran_0">
                    </div>
                    <div class="mb-3">
                        <label for="stok_0" class="form-label">Stok</label>
                        <input type="number" class="form-control" name="variasi[0][stok]" id="stok_0">
                    </div>
                    <div class="mb-3">
                        <label for="gambar_0" class="form-label">Gambar</label>
                        <input class="form-control" type="file" name="variasi[0][gambar]" id="gambar_0">
                    </div>
                    <hr>
                </div>
            </div>
            <button type="button" class="btn btn-secondary mt-2" id="tambah-variasi">Tambah Variasi</button>
        </div>

        <button type="submit" class="btn btn-primary">Edit Produk</button>
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
                <label for="warna_${variasiIndex}" class="form-label">Warna</label>
                <input type="text" class="form-control" name="variasi[${variasiIndex}][warna]" id="warna_${variasiIndex}">
            </div>
            <div class="mb-3">
                <label for="ukuran_${variasiIndex}" class="form-label">Ukuran</label>
                <input type="text" class="form-control" name="variasi[${variasiIndex}][ukuran]" id="ukuran_${variasiIndex}">
            </div>
            <div class="mb-3">
                <label for="stok_${variasiIndex}" class="form-label">Stok</label>
                <input type="number" class="form-control" name="variasi[${variasiIndex}][stok]" id="stok_${variasiIndex}">
            </div>
            <div class="mb-3">
                <label for="gambar_${variasiIndex}" class="form-label">Gambar</label>
                <input class="form-control" type="file" name="variasi[${variasiIndex}][gambar]" id="gambar_${variasiIndex}">
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
            item.remove();
        }
    }
});

function previewImg(inputId, previewClass) {
    const image = document.querySelector('#' + inputId); // Mengambil input berdasarkan ID
    const imagePreview = document.querySelector('.' + previewClass); // Mengambil elemen preview berdasarkan class

    // Pastikan elemen preview terlihat
    imagePreview.style.display = 'block';

    // Membaca file yang dipilih
    const file = image.files[0];
    if (file) {
        const reader = new FileReader();

        reader.onload = function(event) {
            // Set src dari preview ke file yang dipilih
            imagePreview.src = event.target.result;
        }

        reader.readAsDataURL(file);
    }
}

</script>



@endsection