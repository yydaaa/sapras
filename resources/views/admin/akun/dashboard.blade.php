@extends('layouts.app')
@section('content')
<div class="container">
        <h1 class="my-4">Manajemen Akun</h1>
            <!-- Form Pencarian -->
            <form action="{{ route('akun.index') }}" method="GET" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}" style="margin-right: 10px;">
                    <a href="{{ route('akun.create') }}" class="btn text-white px-3" style="background-color: #77a35d; border-radius: 5px;">Tambah Akun</a>
                </div>
            </form>

    <!-- Tabel Akun -->
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($akuns as $akun)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $akun->name }}</td>
                <td>{{ $akun->email }}</td>
                <td>{{ $akun->role }}</td>
                <td>
                <!-- Tombol Edit -->
                <a href="{{ route('akun.edit', $akun->id) }}" class="btn btn-sm btn-outline-warning">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <!-- Tombol Hapus -->
                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal-{{ $akun->id }}">
                    <i class="bi bi-trash"></i>
                </button>
                </td>
            </tr>
            <div class="modal fade" id="confirmDeleteModal-{{ $akun->id }}" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin menghapus akun ini dengan nama {{ $akun->name}}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="{{ route('akun.destroy', $akun->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection