@extends('dashboard.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Stok Barang</h1>
  </div>

  <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

  @if (session()->has('success'))
    <div class="alert alert-success col-lg-7" role="alert">
        {{ session('success') }}
    </div>
  @endif

  <div class="table-responsive small col-lg-12">
    <table class="table table-hover table-sm">
      <thead>
        <tr class="table-warning">
          <th scope="col">No.</th>
          <th scope="col">Kode Barang</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Harga</th>
          <th scope="col">Stok</th>
          <th scope="col">Variasi</th>
          <th scope="col">Gambar</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($produk as $p)
        <tr class="table-primary">
            <td>{{ $loop->iteration + ($produk->firstItem() - 1) }}</td>
            <td>{{ $p->kode_produk }}</td>
            <td>{{ $p->nama_produk }}</td>
            <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
            <td>{{ $p->stok }}</td>
            <td>
              @if ($p->variasi->count() > 0)
                <ul>
                  @foreach ($p->variasi as $variasi)
                  @php
                    $stokClass = ($variasi->stok > 5) ? 'bg-success' : 'bg-danger';
                @endphp
                    <li style="list-style-type: number">
                      <span class="badge bg-primary">Warna: {{ $variasi->warna->warna ?? '-' }}</span>,
                      Ukuran: {{ $variasi->ukuran->ukuran ?? '-' }},
                      <span class="badge {{ $stokClass }}">Stok: {{ $variasi->stok ?? 0 }}</span>
                    </li>
                  @endforeach
                </ul>
              @else
                <p>-</p>
              @endif
            </td>
            <td>
              @if ($p->gambar1)
                <img src="{{ asset('storage/' . $p->gambar1) }}" alt="Gambar Produk"
                style="max-height: 70px; max-width: 70px; overflow: hidden; border-radius: 5px;">
              @else
                <p>No Image</p>
              @endif
            </td>
            <td>
              <a href="{{ route('produk.show', $p->slug) }}" class="badge bg-info">
                <i class="bi bi-eye-fill"></i>
              </a>
              <a href="{{ route('produk.edit', $p->slug) }}" class="badge bg-warning">
                <i class="bi bi-pencil-square"></i>
              </a>
              {{-- <form action="{{ route('produk.destroy', $p->slug) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button class="badge bg-danger border-0" onclick="return confirm('Hapus produk ini?')">
                    <i class="bi bi-trash"></i>
                  </button>
              </form> --}}
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
