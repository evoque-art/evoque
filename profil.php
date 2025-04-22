<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Data pengguna (Contoh, bisa disesuaikan dengan data yang ada di database)
$username = $_SESSION["username"];
$email = "user@example.com";  // Ambil dari database jika perlu
$jenis_desain = "Desain Baju"; // Ambil dari database jika ada data terkait pesanan
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - EVOQUE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #d3d3d3;">
    <div class="container">
        <a class="navbar-brand" href="#">EVOQUE - Abadikan Kenangan</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="pemesanan.php">Pemesanan</a></li>
                <li class="nav-item"><a class="nav-link active" href="profil.php">Profil Saya</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Profil Section -->
<section class="container mt-5">
    <h2 class="text-center">Profil Pengguna</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4 shadow-lg">
                <h4 class="text-center mb-4">Informasi Pengguna</h4>
                <div class="mb-3">
                    <strong>Nama Pengguna:</strong> <span><?php echo $username; ?></span>
                </div>
                <div class="mb-3">
                    <strong>Email:</strong> <span><?php echo $email; ?></span>
                </div>
                <div class="mb-3">
                    <strong>Jenis Desain yang Dipesan:</strong> <span><?php echo $jenis_desain; ?></span>
                </div>
                <div class="mb-3 text-center">
                    <a href="edit_profil.php" class="btn btn-warning">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center p-3 mt-5">
    <p>&copy; 2025 EVOQUE. All Rights Reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
