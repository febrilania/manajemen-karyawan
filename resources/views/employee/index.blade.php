@extends('layouts.sidebar')
@section('main')
    <div class="container-fluid p-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1 class="mb-4">Karyawan</h1>
        <div class="my-2">
            <a href="{{route('employees.create')}}" class="btn btn-primary">Tambah Karyawan</a>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Departemen
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $key => $employee)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $employee->nik }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->position->name }}</td>
                                <td>{{ $employee->department->name }}</td>
                                <td>{{ $employee->status }}</td>
                                <td>
                                    <a href="{{route('employees.show', $employee->id)}}" class="btn btn-success btn-sm ">Detail</a>
                                    <a href="#" class="btn btn-warning btn-sm ">Edit</a>
                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm ">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
