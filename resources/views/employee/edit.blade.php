@extends('layouts.sidebar')
@section('main')
    <div class="container-fluid p-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="me-1"></i>
                Form Edit Karyawan
            </div>
            <div class="card-body">
                <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $employee->nik }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $employee->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="position_id" class="form-label">Jabatan</label>
                        <select name="position_id" id="position_id" class="form-control" required>
                            <option value="">Pilih Jabatan</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                                    {{ $position->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="department_id" class="form-label">Departemen</label>
                        <select name="department_id" id="department_id" class="form-control" required>
                            <option value="">Pilih Departemen</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="5">{{ $employee->address }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="hire_date" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{ $employee->hire_date }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Karyawan</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="Permanent" {{ $employee->status == 'Permanent' ? 'selected' : '' }}>Permanen</option>
                            <option value="Contract" {{ $employee->status == 'Contract' ? 'selected' : '' }}>Kontrak</option>
                            <option value="Internship" {{ $employee->status == 'Internship' ? 'selected' : '' }}>Magang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Gaji</label>
                        <input type="number" class="form-control" id="salary" name="salary" value="{{ $employee->salary }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        @if ($employee->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $employee->photo) }}" alt="Foto Karyawan" width="100">
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>
                </form>
            </div>
        </div>
    </div>
@endsection