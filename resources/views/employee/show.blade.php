@extends('layouts.sidebar')

@section('main')
    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Detail Karyawan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Foto Karyawan -->
                    <div class="col-md-2 d-flex align-items-center">
                        <img src="{{ $employee->photo ? asset('storage/' . $employee->photo) : asset('img/default-profile.png') }}"
                            class="img-fluid rounded-3 shadow-sm mb-3 w-100" alt="Foto Karyawan" >
                    </div>

                    <!-- Informasi Karyawan -->
                    <div class="col-md-10 p-0 d-flex align-items-center">
                        <table class="table">
                            <tr>
                                <th width="10%">NIK</th>
                                <td>: {{ $employee->nik }}</td>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td>: {{ $employee->name }}</td>
                            </tr>
                            <tr>
                                <th>Jabatan</th>
                                <td>: {{ $employee->position->name }}</td>
                            </tr>
                            <tr>
                                <th>Departemen</th>
                                <td>: {{ $employee->department->name }}</td>
                            </tr>
                            <tr>
                                <th>No HP</th>
                                <td>: {{ $employee->phone ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $employee->address ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Masuk</th>
                                <td>: {{ \Carbon\Carbon::parse($employee->hire_date)->format('d M Y') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>:
                                    <span
                                        class="badge bg-{{ $employee->status == 'Permanent' ? 'success' : ($employee->status == 'Contract' ? 'warning' : 'info') }}">
                                        {{ $employee->status }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Gaji</th>
                                <td>: Rp {{ number_format($employee->salary, 0, ',', '.') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <!-- Garis Pembatas -->
                <hr class="my-4">

                <!-- Tombol Aksi Rata Kiri -->
                <div>
                    <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <a href="" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus karyawan ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
