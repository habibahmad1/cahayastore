@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Produk</h1>
</div>

<div class="col-lg-8 mt-3 mb-5">
    <form method="POST" action="/dashboard/produk" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Produk</label>
          <input type="text" class="form-control @error('nama')
              is-invalid
          @enderror" id="nama" name="nama" autofocus value="{{ old('nama') }}">
          @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
          <input type="text" class="form-control  @error('slug')
              is-invalid
          @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
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
            @if (old('kategori_id') === $k)
                <option value="{{ $k->id }}" selected>{{ $k->nama }}</option>
            @else
                <option value="{{ $k->id }}">{{ $k->nama }}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="mb-3">
            <label for="kode_produk" class="form-label">Kode Produk</label>
            <input type="text" class="form-control" id="kode_produk" name="kode_produk">
          </div>

        <div class="mb-3">
            <label for="gambar1" class="form-label">Gambar 1</label>
            <input class="form-control" type="file" id="gambar1">
        </div>

        <div class="mb-3">
            <label for="gambar2" class="form-label">Gambar 2</label>
            <input class="form-control" type="file" id="gambar2">
        </div>

        <div class="mb-3">
            <label for="gambar3" class="form-label">Gambar 3</label>
            <input class="form-control" type="file" id="gambar3">
        </div>

        <div class="mb-3">
            <label for="gambar4" class="form-label">Gambar 4</label>
            <input class="form-control" type="file" id="gambar4">
        </div>

        <div class="mb-3">
            <label for="gambar5" class="form-label">Gambar 5</label>
            <input class="form-control" type="file" id="gambar5">
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok Produk</label>
            <input type="number" class="form-control" id="stok" name="stok">
        </div>

        <div class="mb-3">
            <label for="berat" class="form-label">Berat Produk</label>
            <input type="number" class="form-control" id="berat" name="berat">
        </div>

        <div class="mb-3">
            <label for="dimensi" class="form-label">Dimensi Produk</label>
            <input type="number" class="form-control" id="dimensi" name="dimensi">
        </div>

        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon Produk</label>
            <input type="number" class="form-control" id="diskon" name="diskon">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status Produk</label>
            <select class="form-select" name="status">
                <option value="tersedia">Tersedia</option>
                <option value="habis">Habis</option>
                <option value="pre-order">Pre-Order</option>
              </select>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" id="harga" name="harga">
        </div>

        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          @error('deskripsi')
              <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="deskripsi" type="hidden" name="deskripsi">
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

        <button type="submit" class="btn btn-primary">Tambah Produk</button>
    </form>
</div>

<script>
    const title = document.querySelector("#nama");
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

</script>



@endsection
