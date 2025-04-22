<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan - EVOQUE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f8f9fa;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
    <img src="logo.png" alt="Logo" width="30" height="30" class="me-2">
    <span>EVOQUE-Abadikan Kenangan</span>
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
                <li class="nav-item"><a class="nav-link active" href="pemesanan.php">Pemesanan</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Pemesanan Section -->
<section class="container mt-5">
    <div class="text-center mb-3">
    <img src="logo.png" alt="Logo EVOQUE" width="80">
    <h2 class="mt-2">Form Pemesanan</h2>
</div>
    <p class="text-center">Silakan isi formulir di bawah ini untuk melakukan pemesanan jasa desain.</p>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="proses_pemesanan.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_desain" class="form-label">Jenis Desain</label>
                    <select class="form-select" id="jenis_desain" name="jenis_desain" required>
                        <option value="Baju">Desain Baju</option>
                        <option value="Kalung">Desain Kalung</option>
                        <option value="Gantungan Kunci">Desain Gantungan Kunci</option>
						<option value="Casing Handphone">Desain Casing Handphone</option>
						<option value="Dompet">Desain Dompet</option>
						<option value="Plakat Akrilik">Desain Plakat Akrilik</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Pesanan</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="file_upload" class="form-label">Unggah Gambar atau Video</label>
                    <input type="file" class="form-control" id="file_upload" name="file_upload" accept="image/*,video/*" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Kirim Pemesanan</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Footer -->
<footer style="background-color: #6c757d; color: white;" class="text-center p-3 mt-5">
    &copy; 2025 Jasa Desain. All Rights Reserved.
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>