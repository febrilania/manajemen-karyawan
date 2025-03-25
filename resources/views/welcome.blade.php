<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .welcome-container {
            text-align: center;
            padding: 50px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }

        .btn-custom {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }

        .btn-custom:hover {
            background: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="welcome-container shadow-lg">
            <h1 class="fw-bold">Selamat Datang di Employee Management System</h1>
            <p class="lead">Sistem manajemen pegawai modern untuk efisiensi dan kemudahan.</p>
            <div class="mt-4">
                <a href="/login" class="btn btn-custom btn-lg me-2">Login</a>
                <a href="/register" class="btn btn-light btn-lg">Register</a>
            </div>
        </div>
    </div>
</body>

</html>
