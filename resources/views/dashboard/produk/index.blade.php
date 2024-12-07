@extends('dashboard.layouts.main')
@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Produk</h1>
  </div>



    <a href="/dashboard/produk/create" class="btn btn-primary mb-3">Tambah Produk</a>

    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif

    <div class="table-responsive small">
        <div class="row justify-content-center px-2">
            <div class="col-lg-8 pencarian">
                <form action="/dashboard/produk">
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="Cari Produk.." name="search" value="{{ request('search') }}" id="search-box">
                        <button class="btn btn-warning" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>

    <table class="table table-hover table-sm">
      <thead>
        <tr class="table-warning">
          <th scope="col">No.</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Kategori</th>
          <th scope="col">Gambar</th>
          <th scope="col">Video</th>
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

        <tr class="table-primary">
          <td>{{ $loop->iteration }}</td>
          <td>{{ $p->nama_produk }}</td>
          <td>{{ $p->kategori->nama }}</td>
          <td>
            @php
                $gambarFields = ['gambar1', 'gambar2', 'gambar3', 'gambar4', 'gambar5'];
            @endphp

            @foreach ($gambarFields as $field)
                @if (!empty($p->$field))
                    <img src="{{ asset('storage/' . $p->$field) }}" alt="Img-Produk"
                         style="max-height: 70px; max-width: 70px; overflow: hidden; border-radius: 5px; margin-right: 5px;" class="mb-2">
                @endif
            @endforeach
        </td>

        <td>
            @if (!empty($p->video))
                <video style="max-height: 270px; max-width: 200px; overflow: hidden; border-radius: 5px; margin-right: 5px;" class="mb-3" controls>
                    <source src="{{ asset('storage/' . $p->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                <p>No Video</p>  <!-- Atau Anda bisa kosongkan atau tampilkan teks lain jika tidak ada video -->
            @endif
        </td>


          <td>{{ $p->kode_produk }}</td>
          <td>{!! $p->deskripsi !!}</td>
          <td>{{ $p->stok }}</td>
          <td>{{ $p->diskon }}</td>
          <td>{{ $p->berat }}</td>
          <td>{{ $p->dimensi }}</td>
          <td>{{ number_format($p->harga, 0, ',', '.') }}</td>
          <td>{{ $p->status }}</td>
          <td>
            <a href="/dashboard/produk/{{ $p->slug }}" class="badge bg-info"><span><i class="bi bi-eye-fill"></i></span></a>
            <a href="/dashboard/produk/{{ $p->slug }}/edit" class="badge bg-warning"><span><i class="bi bi-pencil-square"></i></span></a>
            <form action="/dashboard/produk/{{ $p->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Produk?')"><span><i class="bi bi-trash"></i></span></button>
            </form>
          </td>
        </tr>

        @endforeach

      </tbody>
    </table>
  </div>

  <div class="pagination d-flex justify-content-center my-5">
    {{ $produk->links() }}
</div>
@endsection
