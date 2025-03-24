@extends('layouts.sidebar')
@section('main')
    <div class="container-fluid p-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="mb-4">Jabatan</h1>
        <div class="my-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-position">
                Tambah Jabatan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="tambah-position" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('positions.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Jabatan</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Contoh: Manager">
                                </div>
                                <div class="mb-3">
                                    <label for="level" class="form-label">Level</label>
                                    <input type="number" class="form-control" id="level" name="level"
                                        placeholder="Masukkan angka level (contoh: 2)">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Jabatan
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Jabatan</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($positions as $key => $position)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $position->name }}</td>
                                <td>{{ $position->level }}</td>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm " data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $position->id }}">Edit</a>
                                    <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $position->id }}" tabindex="-1"
                                aria-labelledby="editModalLabel{{ $position->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $position->id }}">Edit Jabatan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('positions.update', $position->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-3">
                                                    <label for="name{{ $position->id }}" class="form-label">Nama
                                                        Jabatan</label>
                                                    <input type="text" class="form-control" id="name{{ $position->id }}"
                                                        name="name" value="{{ $position->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="level{{ $position->id }}" class="form-label">Level</label>
                                                    <input type="number" class="form-control"
                                                        id="level{{ $position->id }}" name="level"
                                                        value="{{ $position->level }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
