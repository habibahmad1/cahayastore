@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Kategori</h1>
  </div>

  <div class="table-responsive small col-lg-4">
    <a href="/dashboard/kategori/create" class="btn btn-primary mb-3">Tambah Kategori</a>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <table class="table table-hover table-sm">
      <thead>
        <tr class="table-warning">
          <th scope="col">No.</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategori as $p)

        <tr class="table-primary">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->nama }}</td>
          <td>
            {{-- <a href="/dashboard/kategori/{{ $p->slug }}" class="badge bg-info"><span><i class="bi bi-eye-fill"></i></span></a> --}}
            <a href="/dashboard/kategori/{{ $p->slug }}/edit" class="badge bg-warning"><span><i class="bi bi-pencil-square"></i></span></a>
            <form action="/dashboard/kategori/{{ $p->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Kategori?')"><span><i class="bi bi-trash"></i></span></button>
            </form>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
  </div>
@endsection
