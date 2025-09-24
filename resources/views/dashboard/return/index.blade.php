@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Return Paket</h1>
</div>

@if (session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Filter --}}
<form action="{{ route('barang-return.index') }}" method="GET" class="my-3">
    <div class="row">
        <!-- Filter Tanggal -->
        <div class="col-md-3">
            <label for="tanggal_mulai">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                   value="{{ request('tanggal_mulai') }}">
        </div>
        <div class="col-md-3">
            <label for="tanggal_selesai">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                   value="{{ request('tanggal_selesai') }}">
        </div>

        <!-- Filter Produk -->
        <div class="col-md-3">
            <label for="produk_id">Produk</label>
            <select name="produk_id" id="produk_id" class="form-select">
                <option value="">Semua Produk</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}"
                        {{ request('produk_id') == $produk->id ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filter Kategori -->
        <div class="col-md-3">
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->id }}"
                        {{ request('kategori') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row mt-3">
    <!-- Filter Platform -->
        <div class="col-md-2">
            <label for="platform">Platform</label>
            <select name="platform" id="platform" class="form-select">
                <option value="">Semua Platform</option>
                @foreach ($platformList as $p)
                    <option value="{{ $p }}" {{ request('platform') == $p ? 'selected' : '' }}>
                        {{ $p }}
                    </option>
                @endforeach
            </select>
        </div>

         <!-- Filter Ekspedisi (baru) -->
        <div class="col-md-3">
            <label for="ekspedisi">Ekspedisi</label>
            <select name="ekspedisi" id="ekspedisi" class="form-select">
                <option value="">-- Pilih Ekspedisi --</option>
                @foreach ($ekspedisiList as $e)
                    <option value="{{ $e }}" {{ request('ekspedisi') == $e ? 'selected' : '' }}>
                        {{ $e }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filter Nomor Resi -->
        <div class="col-md-2">
            <label for="nomor_resi">Nomor Resi</label>
            <input type="text" name="nomor_resi" id="nomor_resi"
                class="form-control" placeholder="Cari nomor resi..."
                value="{{ request('nomor_resi') }}">
        </div>

         <!-- Tanggal Resi Keluar (Mulai) -->
         <div class="col-md-2">
                <label for="tanggal_keluar_mulai" class="text-danger">Tanggal Resi Keluar (Mulai)</label>
                <input type="date" name="tanggal_keluar_mulai" id="tanggal_keluar_mulai"
                    class="form-control" value="{{ request('tanggal_keluar_mulai') }}">
        </div>

         <!-- Tanggal Resi Keluar (Selesai) -->
        <div class="col-md-2">
            <label for="tanggal_keluar_selesai" class="text-danger">Tanggal Resi Keluar (Selesai)</label>
            <input type="date" name="tanggal_keluar_selesai" id="tanggal_keluar_selesai"
                class="form-control" value="{{ request('tanggal_keluar_selesai') }}">
        </div>

         <!-- Filter Resi Keluar (baru) -->
        <div class="col-md-2 mt-3">
            <label for="nomor_resi_keluar" class="text-danger">Resi Keluar</label>
            <input type="text" name="nomor_resi_keluar" id="nomor_resi_keluar"
                class="form-control" placeholder="Cari resi keluar..."
                value="{{ request('nomor_resi_keluar') }}">
        </div>

        <!-- Filter Limit -->
        <div class="col-md-1 mt-3">
            <label for="limit">Tampilkan:</label>
            <select name="limit" id="limit" onchange="this.form.submit()" class="form-select">
                <option value="50" {{ request('limit') == 50 ? 'selected' : '' }}>50</option>
                <option value="100" {{ request('limit') == 100 ? 'selected' : '' }}>100</option>
                <option value="all" {{ request('limit') == 'all' ? 'selected' : '' }}>Semua</option>
            </select>
        </div>

        <!-- Tombol Filter & Reset -->
        <div class="col-md-4 d-flex align-items-end mt-3">
            <button type="submit" class="btn btn-primary me-2">Filter</button>
            <a href="{{ route('barang-return.index') }}" class="btn btn-danger">Reset</a>
        </div>
    </div>
</form>


<div class="table-responsive">
  <table class="table table-bordered table-hover">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Tanggal Retur</th>
        <th>Nomor Resi</th>
        <th>Nama Produk</th>
        <th>Variasi</th>
        <th>Ekspedisi</th>
        <th>Platform</th>
        <th>Alasan Return</th>
        <th>Jumlah</th>
        <th>Foto</th>
        <th>Catatan</th>
        <th>Tanggal Keluar</th>
        <th>Resi Keluar</th>
        <th>Jumlah Keluar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($returPaket as $key => $retur)
      <tr>
        <td>
            @if ($returPaket instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $returPaket->firstItem() + $key }}
            @else
                {{ $loop->iteration }}
            @endif
        </td>
        <td>{{ \Carbon\Carbon::parse($retur->tanggal_retur)->translatedFormat('d F Y') }}</td>
        <td>{{ $retur->nomor_resi }}</td>
        <td>{{ $retur->produk->nama_produk ?? '-' }}</td>
        <td>{{ $retur->variasi ? $retur->variasi->warna->warna . ' - ' . $retur->variasi->ukuran->ukuran : '-' }}</td>
        <td>{{ $retur->ekspedisi }}</td>
        <td>{{ $retur->platform }}</td>
        <td>
        {{ $retur->alasan_retur === 'Lainnya' ? $retur->alasan_lainnya : $retur->alasan_retur }}
        </td>

        <td>{{ $retur->jumlah }}</td>
        <td>
            @if ($retur->foto_bukti)
                <img src="{{ asset('storage/' . $retur->foto_bukti) }}" alt="Foto Bukti" style="width: 80px; height: auto;">
            @else
                -
            @endif
        </td>

        <td>{{ $retur->catatan }}</td>

        @php $isZero = (int)($retur->jumlah_keluar ?? 0) > 0; @endphp

        <td class="{{ $isZero ? 'table-danger' : '' }}">
          {{ $retur->tanggal_keluar ? \Carbon\Carbon::parse($retur->tanggal_keluar)->translatedFormat('d F Y') : '-' }}
        </td>

        <td class="{{ $isZero ? 'table-danger' : '' }}">
          {{ $retur->nomor_resi_keluar ?: '-' }}
        </td>

        <td class="{{ $isZero ? 'table-danger' : '' }}">
          {{ $retur->jumlah_keluar ?? 0 }}
        </td>

        <td>
          <!-- Tombol Edit -->
          <button type="button" class="btn btn-primary btn-sm m-2" data-bs-toggle="modal" data-bs-target="#editModal-{{ $retur->id }}">
            Edit
          </button>

          <!-- Tombol Hapus -->
          <form action="{{ route('barang-return.destroy', $retur->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
          </form>

          <!-- Modal Edit -->
          <div class="modal fade" id="editModal-{{ $retur->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <form action="{{ route('barang-return.update', $retur->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Retur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Form edit, isi sesuai field -->
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tanggal_retur">Tanggal Retur</label>
                            <input type="date" name="tanggal_retur" class="form-control" value="{{ $retur->tanggal_retur }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="nomor_resi">Nomor Resi</label>
                            <input type="text" name="nomor_resi" class="form-control" value="{{ $retur->nomor_resi }}" required>
                        </div>

                       <div class="col-md-6 mt-3">
                            <label for="produk_id">Produk</label>
                            <select class="form-select" disabled>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}" {{ $retur->produk_id == $produk->id ? 'selected' : '' }}>
                                        {{ $produk->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="produk_id" value="{{ $retur->produk_id }}">
                        </div>


                       <div class="col-md-6 mt-3">
                        @php
                            $filteredVariasis = $variasis->where('produk_id', $retur->produk_id);
                        @endphp
                        <label for="variasi_id">Variasi</label>
                        <select name="variasi_id" class="form-select">
                            @foreach ($filteredVariasis as $variasi)
                                <option value="{{ $variasi->id }}" {{ $retur->variasi_id == $variasi->id ? 'selected' : '' }}>
                                    {{ $variasi->warna->warna ?? '' }} - {{ $variasi->ukuran->ukuran ?? '' }}
                                </option>
                            @endforeach
                        </select>
                       </div>

                        <div class="col-md-6 mt-3">
                            <label for="ekspedisi">Ekspedisi</label>
                            <select name="ekspedisi" class="form-select" required>
                                <option value="">-- Pilih Ekspedisi --</option>
                                <option value="J&T" {{ $retur->ekspedisi == 'J&T' ? 'selected' : '' }}>J&T</option>
                                <option value="J&T Cargo" {{ $retur->ekspedisi == 'J&T Cargo' ? 'selected' : '' }}>J&T Cargo</option>
                                <option value="Goto Logistik" {{ $retur->ekspedisi == 'Goto Logistik' ? 'selected' : '' }}>Goto Logistik</option>
                                <option value="SPX" {{ $retur->ekspedisi == 'SPX' ? 'selected' : '' }}>SPX</option>
                                <option value="JNE" {{ $retur->ekspedisi == 'JNE' ? 'selected' : '' }}>JNE</option>
                                <option value="JNE Cargo" {{ $retur->ekspedisi == 'JNE Cargo' ? 'selected' : '' }}>JNE Cargo</option>
                                <option value="Ninja" {{ $retur->ekspedisi == 'Ninja' ? 'selected' : '' }}>Ninja</option>
                                <option value="Lalamove" {{ $retur->ekspedisi == 'Lalamove' ? 'selected' : '' }}>Lalamove</option>
                            </select>
                        </div>


                       <div class="col-md-6 mt-3">
                            <label for="platform">Platform</label>
                            <select name="platform" class="form-select" required>
                                <option value="">-- Pilih Platform --</option>
                                <option value="Tiktok 1" {{ $retur->platform == 'Tiktok 1' ? 'selected' : '' }}>Tiktok 1</option>
                                <option value="Tiktok 2" {{ $retur->platform == 'Tiktok 2' ? 'selected' : '' }}>Tiktok 2</option>
                                <option value="Tiktok 3" {{ $retur->platform == 'Tiktok 3' ? 'selected' : '' }}>Tiktok 3</option>
                                <option value="Tiktok 4" {{ $retur->platform == 'Tiktok 4' ? 'selected' : '' }}>Tiktok 4</option>
                                <option value="Shopee 1" {{ $retur->platform == 'Shopee 1' ? 'selected' : '' }}>Shopee 1</option>
                                <option value="Shopee 2" {{ $retur->platform == 'Shopee 2' ? 'selected' : '' }}>Shopee 2</option>
                                <option value="Shopee 3" {{ $retur->platform == 'Shopee 3' ? 'selected' : '' }}>Shopee 3</option>
                                <option value="Shopee 4" {{ $retur->platform == 'Shopee 4' ? 'selected' : '' }}>Shopee 4</option>
                                <option value="Tokopedia 1" {{ $retur->platform == 'Tokopedia 1' ? 'selected' : '' }}>Tokopedia 1</option>
                                <option value="Tokopedia 2" {{ $retur->platform == 'Tokopedia 2' ? 'selected' : '' }}>Tokopedia 2</option>
                                <option value="No Platform" {{ $retur->platform == 'No Platform' ? 'selected' : '' }}>No Platform</option>
                            </select>
                        </div>


                        <div class="col-md-6 mt-3">
                            <label for="alasan_retur">Alasan Retur</label>
                            <select id="alasan_retur" name="alasan_retur" class="form-select" onchange="cekAlasan(this)" required>
                                <option value="">-- Pilih Alasan --</option>
                                <option value="Barang Rusak" {{ $retur->alasan_retur == 'Barang Rusak' ? 'selected' : '' }}>Barang Rusak</option>
                                <option value="Gagal Kirim ke Pembeli" {{ $retur->alasan_retur == 'Gagal Kirim ke Pembeli' ? 'selected' : '' }}>Gagal Kirim ke Pembeli</option>
                                <option value="Tidak Sesuai Pesanan" {{ $retur->alasan_retur == 'Tidak Sesuai Pesanan' ? 'selected' : '' }}>Tidak Sesuai Pesanan</option>
                                <option value="Melebihi Volume" {{ $retur->alasan_retur == 'Melebihi Volume' ? 'selected' : '' }}>Melebihi Volume</option>
                                <option value="Sudah Tidak Perlu" {{ $retur->alasan_retur == 'Sudah Tidak Perlu' ? 'selected' : '' }}>Sudah Tidak Perlu</option>
                                <option value="Lainnya" {{ $retur->alasan_retur == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>


                        <div class="col-md-6 mt-3">
                            <label for="alasan_lainnya">Alasan Lainnya</label>
                            <input type="text" name="alasan_lainnya" class="form-control" value="{{ $retur->alasan_lainnya }}">
                        </div>

                         <div class="col-md-6 mt-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" value="{{ $retur->jumlah }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="foto_bukti">Foto Bukti</label>
                            <input type="file" name="foto_bukti" class="form-control">
                            @if ($retur->foto_bukti)
                            <img src="{{ asset('storage/' . $retur->foto_bukti) }}" alt="Foto" class="mt-2" width="80">
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" name="catatan" rows="3">{{ $retur->catatan }}</textarea>
                        </div>

                       <div class="col-md-4 my-3">
                            <label for="tanggal_keluar" class="form-label">Tanggal Keluar <span class="text-secondary">(Kosongkan Jika belum keluar)</span></label>
                            <input type="date" class="form-control" name="tanggal_keluar" value="{{ $retur->tanggal_keluar }}">
                        </div>

                        <div class="col-md-4 my-3">
                            <label for="jumlah_keluar" class="form-label">Jumlah Barang Keluar <span class="text-secondary">(Kosongkan Jika belum keluar)</span></label>
                            <input type="number" class="form-control" name="jumlah_keluar" min="0" value="{{ $retur->jumlah_keluar ?? 0 }}">
                        </div>

                        <div class="col-md-4 my-3">
                            <label for="nomor_resi_keluar" class="form-label">Resi Barang Keluar <span class="text-secondary">(Kosongkan Jika belum keluar)</span></label>
                            <input type="text" class="form-control" name="nomor_resi_keluar" value="{{ $retur->nomor_resi_keluar }}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
          <!-- End Modal -->
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  @if ($returPaket instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="d-flex justify-content-center">
      {{ $returPaket->links() }}
    </div>
  @endif
</div>
@endsection
