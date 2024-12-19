@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kategori</h1>
  </div>

  <div class="col-lg-4 mt-3 mb-5">
    <form method="POST" action="/dashboard/kategoriartikel/kategoriartikel/{{ $kategori->slug }}">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Kategori <span class="penting">*</span></label>
          <input type="text" class="form-control @error('nama')
              is-invalid
          @enderror" id="nama" name="nama" autofocus value="{{ old('nama', $kategori->nama) }}">
          @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="slug" class="form-label">Slug</label>
          <input type="text" class="form-control  @error('slug')
              is-invalid
          @enderror" id="slug" name="slug" readonly value="{{ old('nama', $kategori->slug) }}">
          @error('slug')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Edit Kategori</button>
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

</script>
@endsection
