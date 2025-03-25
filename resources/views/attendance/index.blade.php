@extends('layouts.sidebar')
@section('main')
    <div class="container-fluid p-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h1>Absensi</h1>
        <a href="{{route('attendances.create')}}" class="btn btn-primary my-3">Tambah Absen</a>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Tabel Absensi
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Tanggal Absensi</th>
                            <th>Cek In</th>
                            <th>Cek Out</th>
                            <th>status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($attendances as $key => $attendance)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $attendance->employee->name }}</td>
                                <td>{{ $attendance->employee->position->name }}</td>
                                <td>{{ $attendance->employee->department->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                                <td>{{ $attendance->check_in }}</td>
                                <td>{{ $attendance->check_out }}</td>
                                <td>{{ $attendance->status }}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm ">Detail</a>
                                    <a href="#" class="btn btn-warning btn-sm ">Edit</a>
                                    <form action="#" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus?')">
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
