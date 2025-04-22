<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

// Data pengguna (ambil dari database jika diperlukan)
$username = $_SESSION["username"];
$email = "user@example.com";  // Contoh, sesuaikan dengan data yang ada di database
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil - EVOQUE</title>
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
                <li class="nav-item"><a class="nav-link active" href="profil.php">Profil Saya</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Edit Profil Section -->
<section class="container mt-5">
    <h2 class="text-center">Edit Profil Pengguna</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="update_profil.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Nama Pengguna</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
                </div>
            </form>
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
