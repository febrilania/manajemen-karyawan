@extends('layouts.sidebar')
@section('main')
    <div class="container-fluid p-4">
        <div class="card mb-4">
            <div class="card-header">
                <i class="me-1"></i>
                Form Edit Absensi
            </div>
            <div class="card-body">
                <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="employee_id" class="form-label">Nama Karyawan</label>
                        <select name="employee_id" id="employee_id" class="form-control">
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}"
                                    {{ old('employee_id', $attendance->employee_id) == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Tanggal Absen</label>
                        <input type="date" class="form-control" name="date" id="date"
                            value="{{ old('date', $attendance->date) }}">
                    </div>
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Cek In</label>
                        <input type="datetime-local" class="form-control" name="check_in" id="check_in"
                            value="{{ old('check_in', $attendance->check_in ? \Carbon\Carbon::parse($attendance->check_in)->format('Y-m-d\TH:i') : '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="form-label">Cek Out</label>
                        <input type="datetime-local" class="form-control" name="check_out" id="check_out"
                            value="{{ old('check_out', $attendance->check_out ? \Carbon\Carbon::parse($attendance->check_out)->format('Y-m-d\TH:i') : '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="present" {{ old('status', $attendance->status) == 'present' ? 'selected' : '' }}>
                                Hadir</option>
                            <option value="absent" {{ old('status', $attendance->status) == 'absent' ? 'selected' : '' }}>
                                Alpha</option>
                            <option value="on_leave"
                                {{ old('status', $attendance->status) == 'on_leave' ? 'selected' : '' }}>Izin</option>
                            <option value="late" {{ old('status', $attendance->status) == 'late' ? 'selected' : '' }}>
                                Terlambat</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Kembali</button>
                </form>
            </div>
        </div>
    </div>
@endsection
