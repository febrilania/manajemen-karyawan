@extends('layouts.sidebar')
@section('main')
    <div class="container-fluid p-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="me-1"></i>
                Tambah Absensi
            </div>
            <div class="card-body">
                <form action="{{route('attendances.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Nama</label>
                        <select name="employee_id" id="employee_id" class="form-control">
                            <option value="">Nama Karyawan</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Absen</label>
                        <input type="date" class="form-control" name="date" id="date">
                    </div>
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Cek In</label>
                        <input type="datetime-local" class="form-control" name="check_in" id="check_in">
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="form-label">Cek Out</label>
                        <input type="datetime-local" class="form-control" name="check_out" id="check_out">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="">Pilih Status</option>
                            <option value="present">Hadir</option>
                            <option value="absent">Absen</option>
                            <option value="on_leave">Izin</option>
                            <option value="late">Telat</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>
                </form>
            </div>
        </div>
    </div>
@endsection
