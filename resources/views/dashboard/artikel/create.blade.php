@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Artikel Baru</h1>
</div>

<div class="col-lg-7">
    <form action="/dashboard/artikel" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategoripost_id" class="form-label">Kategori Artikel</label>
            <select class="form-select" name="kategoripost_id">
                @foreach ($data as $item)
                    <option value="{{ $item->id }}" {{ old('kategoripost_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Gambar Artikel Utama -->
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Artikel Utama</label>
            <img class="img-preview-1 img-fluid mb-3 col-sm-5" style="display:none;">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage('#image', '.img-preview-1')">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gambar 2 -->
        <div class="mb-3">
            <label for="gambar2" class="form-label">Gambar 2 <span class="text-secondary">Optional</span></label>
            <img class="img-preview-2 img-fluid mb-3 col-sm-5" style="display:none;">
            <input class="form-control @error('gambar2') is-invalid @enderror" type="file" id="gambar2" name="gambar2" onchange="previewImage('#gambar2', '.img-preview-2')">
            @error('gambar2')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gambar 3 -->
        <div class="mb-3">
            <label for="gambar3" class="form-label">Gambar 3 <span class="text-secondary">Optional</span></label>
            <img class="img-preview-3 img-fluid mb-3 col-sm-5" style="display:none;">
            <input class="form-control @error('gambar3') is-invalid @enderror" type="file" id="gambar3" name="gambar3" onchange="previewImage('#gambar3', '.img-preview-3')">
            @error('gambar3')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gambar 4 -->
        <div class="mb-3">
            <label for="gambar4" class="form-label">Gambar 4 <span class="text-secondary">Optional</span></label>
            <img class="img-preview-4 img-fluid mb-3 col-sm-5" style="display:none;">
            <input class="form-control @error('gambar4') is-invalid @enderror" type="file" id="gambar4" name="gambar4" onchange="previewImage('#gambar4', '.img-preview-4')">
            @error('gambar4')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gambar 5 -->
        <div class="mb-3">
            <label for="gambar5" class="form-label">Gambar 5 <span class="text-secondary">Optional</span></label>
            <img class="img-preview-5 img-fluid mb-3 col-sm-5" style="display:none;">
            <input class="form-control @error('gambar5') is-invalid @enderror" type="file" id="gambar5" name="gambar5" onchange="previewImage('#gambar5', '.img-preview-5')">
            @error('gambar5')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Upload Video -->
        <div class="mb-3">
            <label for="video" class="form-label">Upload Video</label>
            <input class="form-control @error('video') is-invalid @enderror" type="file" id="video" name="video" accept="video/*">
            @error('video')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Isi Artikel -->
        <div class="mb-3">
            <label for="body" class="form-label">Isi Artikel</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body" class="@error('body') is-invalid @enderror"></trix-editor>
            @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mb-5">Buat Artikel</button>
    </form>
</div>

<script>
    const title = document.querySelector("#judul");
    const slug = document.querySelector("#slug");

    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g, "-");
        preslug = preslug.replace(/\//g, "-");
        slug.value = preslug.toLowerCase();
    });

    // Function to prevent file uploads in Trix editor
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    // Preview image function
    function previewImage(inputId, previewClass) {
        const image = document.querySelector(inputId);
        const imagePreview = document.querySelector(previewClass);

        // Menyembunyikan preview jika tidak ada gambar
        if (image.files && image.files[0]) {
            imagePreview.style.display = "block";

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0]);

            ofReader.onload = function (ofRevent) {
                imagePreview.src = ofRevent.target.result;
            }
        } else {
            imagePreview.style.display = "none";
        }
    }
</script>

@endsection
