@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produk Saya</h1>
  </div>

  <div class="table-responsive small">
    <a href="/dashboard/produk/create" class="btn btn-primary mb-3">Tambah Produk</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Gambar</th>
          <th scope="col">Kode</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Stok</th>
          <th scope="col">Diskon</th>
          <th scope="col">Berat</th>
          <th scope="col">Dimensi</th>
          <th scope="col">Harga</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produk as $p)

        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->nama_produk }}</td>
          <td>{{ $p->gambar1 }}</td>
          <td>{{ $p->kode_produk }}</td>
          <td>{{ $p->deskripsi }}</td>
          <td>{{ $p->stok }}</td>
          <td>{{ $p->diskon }}</td>
          <td>{{ $p->berat }}</td>
          <td>{{ $p->dimensi }}</td>
          <td>{{ $p->harga }}</td>
          <td>{{ $p->status }}</td>
          <td>
            <a href="/dashboard/produk/{{ $p->slug }}" class="badge bg-info"><span><i class="bi bi-eye-fill"></i></span></a>
            <a href="/dashboard/produk/{{ $p->slug }}" class="badge bg-warning"><span><i class="bi bi-pencil-square"></i></span></a>
            <a href="/dashboard/produk/{{ $p->slug }}" class="badge bg-danger"><span><i class="bi bi-trash"></i></span></a>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
  </div>
@endsection
