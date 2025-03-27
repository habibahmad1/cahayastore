@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom no-print">
    <h1 class="h2">Surat Resi</h1>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show no-print" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Tombol Tambah & Print -->
<a href="{{ route('surat-resi.create') }}" class="btn btn-primary mb-3 no-print">Tambah Surat Resi</a>
<button onclick="printResi()" class="btn btn-secondary mb-3 no-print">Print Semua Resi</button>

<div class="row">
    @foreach($suratResis as $suratResi)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm resi-card" id="resi-{{ $suratResi->id }}">
            <div class="card-body">
                <p class="card-text">
                    <strong>Penerima:</strong> {{ $suratResi->nama_penerima }} <br>
                    <strong>Alamat Penerima:</strong> {{ $suratResi->alamat_penerima }} <br>
                    <strong>Telepon Penerima:</strong> {{ $suratResi->telepon_penerima }} <br>
                    <hr>
                    <strong>Pengirim:</strong> {{ $suratResi->nama_pengirim }} <br>
                    <strong>Alamat Pengirim:</strong> {{ $suratResi->alamat_pengirim }} <br>
                    <strong>Telepon Pengirim:</strong> {{ $suratResi->telepon_pengirim }} <br>
                </p>

                <!-- Tombol Edit, Hapus, dan Print -->
                <a href="{{ route('surat-resi.edit', $suratResi->id) }}" class="btn btn-primary btn-sm no-print">Edit</a>
                <form action="{{ route('surat-resi.destroy', $suratResi->id) }}" method="POST" class="d-inline no-print">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</button>
                </form>
                <button onclick="printSingleResi({{ $suratResi->id }})" class="btn btn-secondary btn-sm no-print">Print</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- CSS agar elemen dengan class 'no-print' tidak ikut tercetak -->
<style>
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>

<!-- JavaScript untuk Print -->
<script>
    function printResi() {
        window.print();
    }

    function printSingleResi(id) {
    let resiCard = document.getElementById(`resi-${id}`);
    let originalContent = document.body.innerHTML;
    let printContent = resiCard.cloneNode(true); // Duplikat elemen tanpa mengubah aslinya

    // Hapus elemen dengan class "no-print" sebelum mencetak
    printContent.querySelectorAll(".no-print").forEach(el => el.remove());

    // Ganti isi body dengan elemen yang akan dicetak
    document.body.innerHTML = printContent.outerHTML;

    window.print(); // Cetak hanya elemen ini

    // Kembalikan tampilan awal setelah print selesai
    document.body.innerHTML = originalContent;
}



</script>
@endsection
