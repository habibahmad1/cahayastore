@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Artikel Saya</h1>
  </div>



    <a href="/dashboard/artikel/create" class="btn btn-primary mb-3">Tambah Artikel</a>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-7" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="row justify-content-center px-2 col-lg-6">
    </div>
    <div class="table-responsive small col-lg-7">

    <table class="table table-hover table-sm">
      <thead>
        <tr class="table-warning">
          <th scope="col">No.</th>
          <th scope="col">Judul Artikel</th>
          <th scope="col">Kategori</th>
          <th scope="col">Gambar</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($dataArtikel as $p)

        <tr class="table-primary">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->judul }}</td>
          <td>{{ $p->kategoripost->nama }}</td>
          <td>
            @if ($p->image)
            <img src="{{ asset('storage/' . $p->image) }}" alt="Img"
            style="max-height: 70px; max-width: 70px; overflow: hidden; border-radius: 5px; margin-right: 5px;" class="mb-2">
            @else
             <p>No Image</p>
            @endif
          </td>
          <td>
            <a href="/dashboard/artikel/{{ $p->slug }}" class="badge bg-info"><span><i class="bi bi-eye-fill"></i></span></a>
            <a href="/dashboard/artikel/{{ $p->slug }}/edit" class="badge bg-warning"><span><i class="bi bi-pencil-square"></i></span></a>
            <form action="/dashboard/artikel/{{ $p->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Artikel?')"><span><i class="bi bi-trash"></i></span></button>
            </form>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
  </div>

  <div class="pagination d-flex justify-content-center my-5">
    {{-- {{ $dataArtikel->links() }} --}}
</div>
@endsection
