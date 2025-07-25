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
        <th>Apakah Cargo</th>
        <th>Platform</th>
        <th>Alasan Return</th>
        <th>Status Barang</th>
        <th>Jumlah</th>
        <th>Foto</th>
        <th>Video</th>
        <th>Catatan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($returPaket as $key => $retur)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $retur->tanggal_retur }}</td>
        <td>{{ $retur->nomor_resi }}</td>
        <td>{{ $retur->produk->nama_produk ?? '-' }}</td>
        <td>{{ $retur->variasi ? $retur->variasi->warna->warna . ' - ' . $retur->variasi->ukuran->ukuran : '-' }}</td>
        <td>{{ $retur->ekspedisi }}</td>
        <td>{{ $retur->apakah_cargo}}</td>
        <td>{{ $retur->platform }}</td>
        <td>
            @if (!empty($retur->alasan_retur))
                {{ $retur->alasan_retur }}
            @else
                {{ $retur->alasan_lainnya }}
            @endif
        </td>
        <td>{{ $retur->status_barang }}</td>
        <td>{{ $retur->jumlah }}</td>
        <td>
            @if ($retur->foto_bukti)
                <img src="{{ asset('storage/' . $retur->foto_bukti) }}" alt="Foto Bukti" style="width: 80px; height: auto;">
            @else
                -
            @endif
        </td>
                <td>
            @if ($retur->video_bukti)
                <img src="{{ asset('storage/' . $retur->video_bukti) }}" alt="Video Bukti" style="width: 80px; height: auto;">
            @else
                -
            @endif
        </td>
        <td>{{ $retur->catatan }}</td>
        <td>
          <!-- Tombol Edit -->
          <button type="button" class="btn btn-warning btn-sm m-2" data-bs-toggle="modal" data-bs-target="#editModal-{{ $retur->id }}">
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
                <form action="{{ route('barang-return.update', $retur->id) }}" method="POST">
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
                            <input type="text" name="ekspedisi" class="form-control" value="{{ $retur->ekspedisi }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="apakah_cargo">Apakah Cargo</label>
                            <select name="apakah_cargo" class="form-select">
                            <option value="ya" {{ $retur->apakah_cargo == 'ya' ? 'selected' : '' }}>Ya</option>
                            <option value="tidak" {{ $retur->apakah_cargo == 'tidak' ? 'selected' : '' }}>Tidak</option>
                            </select>
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="platform">Platform</label>
                            <input type="text" name="platform" class="form-control" value="{{ $retur->platform }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="alasan_retur">Alasan Retur</label>
                            <input type="text" name="alasan_retur" class="form-control" value="{{ $retur->alasan_retur }}">
                        </div>

                        <div class="col-md-6 mt-3">
                            <label for="alasan_lainnya">Alasan Lainnya</label>
                            <input type="text" name="alasan_lainnya" class="form-control" value="{{ $retur->alasan_lainnya }}">
                        </div>

                       <div class="col-md-6 mt-3">
                            <label for="status_barang">Status Barang</label>
                            <select name="status_barang" class="form-select">
                                <option value="Barang Masih Ada" {{ $retur->status_barang == 'Barang Masih Ada' ? 'selected' : '' }}>Barang Masih Ada</option>
                                <option value="Barang Sudah Terpakai" {{ $retur->status_barang == 'Barang Sudah Terpakai' ? 'selected' : '' }}>Barang Sudah Terpakai</option>
                            </select>
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

                        <div class="col-md-6 mt-3">
                            <label for="video_bukti">Video Bukti</label>
                            <input type="file" name="video_bukti" class="form-control">
                            @if ($retur->video_bukti)
                            <video src="{{ asset('storage/' . $retur->video_bukti) }}" class="mt-2" width="100" controls></video>
                            @endif
                        </div>

                        <div class="col-md-12 mt-3">
                            <label for="catatan">Catatan</label>
                            <textarea class="form-control" name="catatan" rows="3">{{ $retur->catatan }}</textarea>
                        </div>
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
