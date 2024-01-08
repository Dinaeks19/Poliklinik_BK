<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e0e0e0;
            margin: 0; /* Menghapus margin default pada body */
        }

        .welcome-section {
            background-image: url('images/bg44.jpg'); /* Menggunakan gambar latar belakang */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            padding: 180px; /* Sesuaikan nilai padding sesuai keinginan */
            margin-bottom: 50px; /* Sesuaikan nilai margin-bottom sesuai keinginan */
            text-align: center;
            border-radius: 10px;
        }

        .variation-text {
            font-size: 3rem;
            font-family: 'Comic Sans MS', cursive; /* Gaya tulisan lucu menggunakan font Comic Sans MS */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Bayangan teks untuk efek lucu */
            margin-top: 20px; /* Spasi tambahan dari atas */
        }

        .additional-text {
            font-size: 1.5rem;
            margin-top: 20px; /* Spasi tambahan dari atas */
        }

        .container {
            padding: 100px;
            margin-top: 50px;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            color: #333;
        }

        .card-text {
            color: #555;
        }

        .btn {
            border-radius: 8px;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }

        .btn-primary {
            background-color: #ff6699;
            border-color: #000;
        }

        .btn-success {
            background-color: #66ff66;
            border-color: #000;
        }

        .btn-info {
            background-color: #66b3ff;
            border-color: #000;
        }
    </style>
</head>
<body>
<div class="welcome-section">
    <h1 class="variation-text">Selamat Datang di Poliklinik</h1>
    <p class="additional-text">Kami hadir untuk memberikan pelayanan kesehatan terbaik kepada Anda!</p>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admin</h5>
                    <p class="card-text">Login untuk mengakses panel admin dengan kemudahan dalam manajemen.</p>
                    <a href="admin/" class="btn btn-primary" style="background-color : #595031">Login Admin</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dokter</h5>
                    <p class="card-text">Login sebagai dokter untuk akses informasi medis dan tindakan medis.</p>
                    <a href="dokter/" class="btn btn-success" style="background-color : #595031">Login Dokter</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pasien</h5>
                    <p class="card-text">Login sebagai pasien untuk melihat jadwal periksa dan hasil pemeriksaan.</p>
                    <a href="pasien/" class="btn btn-info" style="background-color : #595031">Login Pasien</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
