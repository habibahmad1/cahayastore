@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User Manajemen</h1>
  </div>

  @if (session()->has('success'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('success') }}
      </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session('error') }}
      </div>
    @endif

<table class="table table-striped table-hover table-sm align-middle">
    <thead>
      <tr class="table-warning">
        <th scope="col">No.</th>
        <th scope="col">Nama User</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Daftar</th>
        <th scope="col">Admin</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $p)

      <tr class="table-primary">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $p->name }}</td>
        <td>{{ $p->username }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->created_at->format('d-m-Y') }}</td>
        <td>{{ $p->is_admin ? 'Ya' : 'Tidak' }}</td>
        <td>
            <a href="/dashboard/jadiAdmin/{{ $p->id }}"
                class="badge bg-success"
                onclick="return confirm('Apakah Anda yakin ingin menjadikan user ini sebagai admin?')">
                 <span><i class="bi bi-person-fill-up"></i></span>
             </a>

             <a href="/dashboard/jadiUser/{{ $p->id }}"
                class="badge bg-warning"
                onclick="return confirm('Apakah Anda yakin ingin mengembalikan user ini menjadi user biasa?')">
                 <span><i class="bi bi-person-dash"></i></span>
             </a>


            <form action="/dashboard/deleteUser" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <input type="hidden" name="user_id" value="{{ $p->id }}">  <!-- Menambahkan input tersembunyi untuk user_id -->
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus User? User tidak bisa di kembalikan')">
                    <span><i class="bi bi-trash"></i></span>
                </button>
            </form>

        </td>
      </tr>

      @endforeach

    </tbody>
  </table>

@endsection
