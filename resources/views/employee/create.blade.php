@extends('layouts.sidebar')
@section('main')
    <div class="container-fluid p-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="me-1"></i>
                Form Tambah Karyawan
            </div>
            <div class="card-body">
                <form action="{{route('employees.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            placeholder="Masukan nomor NIK" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="position_id" class="form-label">Jabatan</label>
                        <select name="position_id" id="position_id" class="form-control" required>
                            <option value="">Pilih Jabatan</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="department_id" class="form-label">Departemen</label>
                        <select name="department_id" id="department_id" class="form-control" required>
                            <option value="">Pilih Departemen</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No HP</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukan No HP (086xxxxxxxxxx)">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="5" placeholder="Masukkan alamat lengkap"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="hire_date" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="hire_date" name="hire_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Karyawan</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Pilih Status Karyawan</option>
                            <option value="Permanent">Permanen</option>
                            <option value="Contract">Kontrak</option>
                            <option value="Internship">Magang</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="salary" class="form-label">Gaji</label>
                        <input type="number" class="form-control" id="salary" name="salary" placeholder="Masukan Gaji" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>
                </form>
            </div>
        </div>
    </div>
@endsection
