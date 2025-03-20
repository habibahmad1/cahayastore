@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Artikel</h1>
</div>

<div class="col-lg-7">
    <form action="/dashboard/artikel/{{ $artikel->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="judul" class="form-label">Judul Artikel</label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul', $artikel->judul) }}">
            @error('judul')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $artikel->slug) }}">
            @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategoripost_id" class="form-label">Kategori Artikel</label>
            <select class="form-select" name="kategoripost_id">
                @foreach ($data as $item)
                    <option value="{{ $item->id }}" {{ old('kategoripost_id', $artikel->kategoripost_id) == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Artikel</label>
            @if ($artikel->image)
                <img src="{{ asset('storage/'.$artikel->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Gambar 2 -->
        <div class="mb-3">
            <label for="gambar2" class="form-label">Gambar 2 <span class="text-secondary">Optional</span></label>
            @if ($artikel->gambar2)
                <img src="{{ asset('storage/'.$artikel->gambar2) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('gambar2') is-invalid @enderror" type="file" id="gambar2" name="gambar2" onchange="previewImage2()">
            @error('gambar2')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Gambar 3 -->
        <div class="mb-3">
            <label for="gambar3" class="form-label">Gambar 3 <span class="text-secondary">Optional</span></label>
            @if ($artikel->gambar3)
                <img src="{{ asset('storage/'.$artikel->gambar3) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('gambar3') is-invalid @enderror" type="file" id="gambar3" name="gambar3" onchange="previewImage3()">
            @error('gambar3')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Gambar 4 -->
        <div class="mb-3">
            <label for="gambar4" class="form-label">Gambar 4 <span class="text-secondary">Optional</span></label>
            @if ($artikel->gambar4)
                <img src="{{ asset('storage/'.$artikel->gambar4) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('gambar4') is-invalid @enderror" type="file" id="gambar4" name="gambar4" onchange="previewImage4()">
            @error('gambar4')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Gambar 5 -->
        <div class="mb-3">
            <label for="gambar5" class="form-label">Gambar 5 <span class="text-secondary">Optional</span></label>
            @if ($artikel->gambar5)
                <img src="{{ asset('storage/'.$artikel->gambar5) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('gambar5') is-invalid @enderror" type="file" id="gambar5" name="gambar5" onchange="previewImage5()">
            @error('gambar5')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Video -->
        <div class="mb-3">
            <label for="video" class="form-label">Upload Video</label>
            @if ($artikel->video)
                <video class="img-fluid mb-3 col-sm-5 d-block" controls>
                    <source src="{{ asset('storage/'.$artikel->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
            <input class="form-control @error('video') is-invalid @enderror" type="file" id="video" name="video" accept="video/*">
            @error('video')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Isi Artikel</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $artikel->body) }}">
            <trix-editor input="body" class="@error('body') is-invalid @enderror"></trix-editor>
            @error('body')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mb-5">Edit Artikel</button>
        <a href="/dashboard/artikel" class="mb-5 btn btn-primary"><i class="fa-solid fa-arrow-left-long"></i> Kembali</a>
    </form>
</div>

<script>
    const judul = document.querySelector('#judul');
    const slug = document.querySelector('#slug');

    judul.addEventListener("change", function (){
        fetch('/dashboard/artikel/cekSlug?judul=' + judul.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    function previewImage(){
        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = "block";

        const ofReader = new FileReader();

        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (ofRevent){
            imagePreview.src = ofRevent.target.result;
        }
    }

    function previewImage2(){
        const image = document.querySelector('#gambar2');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = "block";

        const ofReader = new FileReader();

        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (ofRevent){
            imagePreview.src = ofRevent.target.result;
        }
    }

    function previewImage3(){
        const image = document.querySelector('#gambar3');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = "block";

        const ofReader = new FileReader();

        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (ofRevent){
            imagePreview.src = ofRevent.target.result;
        }
    }

    function previewImage4(){
        const image = document.querySelector('#gambar4');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = "block";

        const ofReader = new FileReader();

        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (ofRevent){
            imagePreview.src = ofRevent.target.result;
        }
    }

    function previewImage5(){
        const image = document.querySelector('#gambar5');
        const imagePreview = document.querySelector('.img-preview');

        imagePreview.style.display = "block";

        const ofReader = new FileReader();

        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function (ofRevent){
            imagePreview.src = ofRevent.target.result;
        }
    }
</script>

@endsection
