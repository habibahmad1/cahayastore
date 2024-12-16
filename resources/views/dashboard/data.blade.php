@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">User Manajemen</h1>
  </div>

<table class="table table-hover table-sm">
    <thead>
      <tr class="table-warning">
        <th scope="col">No.</th>
        <th scope="col">Nama User</th>
        <th scope="col">Username</th>
        <th scope="col">Gambar</th>
        <th scope="col">Email</th>
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
        <td>{{ $p->image }}</td>
        <td>{{ $p->email }}</td>
        <td>{{ $p->is_admin }}</td>
        <td>
            <form action="/dashboard/deleteuser" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <input type="hidden" name="user_id" value="{{ $p->id }}">  <!-- Menambahkan input tersembunyi untuk user_id -->
                <button class="badge bg-danger border-0" onclick="return confirm('Hapus Artikel?')">
                    <span><i class="bi bi-trash"></i></span>
                </button>
            </form>

        </td>
      </tr>

      @endforeach

    </tbody>
  </table>

@endsection
