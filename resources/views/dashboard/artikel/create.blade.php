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
          <input type="text" class="form-control @error('judul')
            is-invalid
          @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
          @error('judul')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control @error('slug')
          is-invalid
        @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
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
            <option value="{{ $item->id }}" {{ old('kategoripost_id') == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Gambar Artikel</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image')
          is-invalid
        @enderror" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Isi Artikel</label>
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
            <trix-editor input="body" class="@error('body')
            is-invalid
          @enderror"></trix-editor>
          @error('body')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
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
        preslug = preslug.replace(/ /g,"-");
        preslug = preslug.replace(/\//g, "-");
        slug.value = preslug.toLowerCase();
    });

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>

<script>

    document.addEventListener('trix-file-accept',(e)=>{
        e.prevendDefault();
    })

    function previewImage(){
      const image = document.querySelector('#image');
      const imagePreview = document.querySelector('.img-preview');

      imagePreview.style.display ="block";

      const ofReader = new FileReader();

      ofReader.readAsDataURL(image.files[0]);

      ofReader.onload = function (ofRevent){
        imagePreview.src = ofRevent.target.result;
      }

    }
</script>
@endsection
