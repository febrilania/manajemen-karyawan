@extends('layouts.sidebar')
@section('main')
    <div class="container-fluid p-4">
        <h1 class="mb-4">Dashboard</h1>

        <!-- Statistik -->
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Pegawai</h5>
                        <h3>125</h3>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="text-white small">Lihat Detail</a>
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Jabatan</h5>
                        <h3>10</h3>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="text-white small">Lihat Detail</a>
                        <i class="fas fa-user-tie"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Karyawan Aktif</h5>
                        <h3>98</h3>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="text-white small">Lihat Detail</a>
                        <i class="fas fa-user-check"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-danger mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Karyawan Cuti</h5>
                        <h3>5</h3>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="#" class="text-white small">Lihat Detail</a>
                        <i class="fas fa-user-times"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Dummy -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar"></i> Grafik Karyawan
                    </div>
                    <div class="card-body">
                        <canvas id="chartKaryawan"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie"></i> Statistik Jabatan
                    </div>
                    <div class="card-body">
                        <canvas id="chartJabatan"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Chart.js untuk grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Grafik batang karyawan
        var ctx = document.getElementById('chartKaryawan').getContext('2d');
        var chartKaryawan = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['IT', 'HRD', 'Finance', 'Marketing', 'Produksi'],
                datasets: [{
                    label: 'Jumlah Karyawan',
                    data: [25, 15, 10, 20, 30],
                    backgroundColor: ['blue', 'green', 'yellow', 'orange', 'red']
                }]
            }
        });

        // Grafik pie jabatan
        var ctx2 = document.getElementById('chartJabatan').getContext('2d');
        var chartJabatan = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Manager', 'Supervisor', 'Staff'],
                datasets: [{
                    data: [10, 20, 70],
                    backgroundColor: ['purple', 'cyan', 'lightblue']
                }]
            }
        });
    </script>
@endsection
