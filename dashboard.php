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
    <title>Dashboard - EVOQUE - Abadikan Kenangan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f8f9fa;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            EVOQUE - Abadikan Kenangan
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="pemesanan.php">Pemesanan</a></li>
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Home Section -->
<section class="container text-center mt-5">
<div class="text-center mb-4">
    <img src="logo.png" alt="Logo EVOQUE" width="100">
    <h2 class="mt-3">Selamat Datang, <?php echo $_SESSION["username"]; ?>!</h2>
    <p class="lead">"EVOQUE – Abadikan Kenangan"</p>
</div>

<p class="lead">Kami menyediakan layanan desain profesional untuk kebutuhan bisnis dan personal Anda.</p>

<p class="text-center mt-3">
    <strong>EVOQUE</strong> adalah penyedia jasa editing <strong>foto dan video</strong> yang dapat diakses melalui <strong>scan barcode</strong>. 
    Setiap karya kami dikemas dalam produk yang <strong>variatif dan personal</strong> seperti dompet, gantungan kunci, plakat, dan lainnya — sesuai keinginan customer.
</p>
</section>

<!-- Portofolio Section -->
<section class="container mt-5" id="portfolio">
    <h3 class="text-center mb-4">Desain Terbaru</h3>
<p class="text-center text-muted mb-5">
    Klik pada gambar produk untuk melihat informasi lebih lanjut mengenai jenis desain dan cara pemesanannya.
</p>
    <div class="row">
        <div class="col-md-4 animate__animated animate__fadeInUp">
			<img src="portofolio1.jpeg" class="img-fluid rounded shadow zoom-hover" alt="Desain Kalung" role="button" data-bs-toggle="modal" data-bs-target="#modalKalung">
            <p class="text-center mt-2">Desain Kalung</p>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInUp">
            <img src="portofolio2.jpeg" class="img-fluid rounded shadow zoom-hover" alt="Desain Baju" role="button" data-bs-toggle="modal" data-bs-target="#modalBaju">
            <p class="text-center mt-2">Desain Baju</p>
        </div>
        <div class="col-md-4 animate__animated animate__fadeInUp">
            <img src="gantungan kunci.jpg" class="img-fluid rounded shadow zoom-hover" alt="Desain 3">
            <p class="text-center mt-2">Desain Gantungan Kunci</p>
        </div>
		<div class="col-md-4 animate__animated animate__fadeInUp">
            <img src="casing hp.jpg" class="img-fluid rounded shadow zoom-hover" alt="Desain 3">
            <p class="text-center mt-2">Desain Casing Handphone</p>
        </div>
		<div class="col-md-4 animate__animated animate__fadeInUp">
    <img src="dompet.jpg" class="img-fluid rounded shadow zoom-hover" alt="Desain Dompet"
     role="button" data-bs-toggle="modal" data-bs-target="#modalDompet">
    <p class="text-center mt-2">Desain Dompet</p>
</div>
		<div class="col-md-4 animate__animated animate__fadeInUp">
            <img src="plakat akrilik.jpg" class="img-fluid rounded shadow zoom-hover" alt="Desain 3">
            <p class="text-center mt-2">Desain Plakat Akrilik</p>
        </div>
    </div>
</section>

<!-- Konten Halaman Dashboard -->
<section class="container mt-5">
    <!-- Konten lainnya seperti portofolio, informasi lainnya -->
</section>

<!-- Tombol Aksi Section -->
<div class="text-center mt-5">
    <a href="pemesanan.php" class="btn btn-warning btn-lg me-3">Buat Desain Sekarang</a>
    <!-- Tombol dengan warna lebih kontras -->
    <a href="profil.php" class="btn btn-info btn-lg">Lihat Profil Saya</a>
</div>

<!-- Footer -->
<footer style="background-color: #6c757d; color: white;" class="text-center p-3 mt-5">
    <p>&copy; 2025 Jasa Desain. All Rights Reserved.</p>
    <div>
        <a href="#" class="text-white me-3"><img src="https://cdn-icons-png.flaticon.com/24/2111/2111463.png" alt="Instagram" width="24"></a>
        <a href="#" class="text-white me-3"><img src="https://cdn-icons-png.flaticon.com/24/3046/3046125.png" alt="TikTok" width="24"></a>
 <a href="https://wa.me/6281328492305" target="_blank">
    <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="Chat via WhatsApp" style="width:40px; height:40px;">
  </a>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Modal Kalung -->
<div class="modal fade" id="modalKalung" tabindex="-1" aria-labelledby="modalKalungLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="modalKalungLabel">Detail Desain Kalung</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p><strong>Jenis Desain Tersedia:</strong></p>
        <ol>
          <li><strong>Bentuk 1:</strong> Stiker Barcode (akan dikirim dalam bentuk stiker saja tanpa barang fisik).</li>
          <li><strong>Bentuk 2:</strong> Produk Kalung berupa liontin + Barcode yang bisa disesuaikan dengan desain pilihan Anda.</li>
        </ol>
        <p class="text-danger"><em>Catatan:</em> Stiker barcode dibuat oleh <strong>EVOQUE</strong>, tidak diperkenankan untuk mencetak sendiri.</p>
        <p><strong>Cara Pemesanan:</strong></p>
        <ol>
          <li>Klik tombol "Buat Desain Sekarang".</li>
          <li>Isi formulir pemesanan dengan lengkap.</li>
          <li>Atau hubungi kami melalui WhatsApp untuk konsultasi cepat.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <a href="pemesanan.php" class="btn btn-warning">Buat Desain Sekarang</a>
        <a href="https://wa.me/6285643571036?text=Halo%20EVOQUE!%20Saya%20ingin%20memesan%20desain%20kalung.%20Berikut%20informasinya:%0A-%20Jenis%20Desain:%20%0A-%20Catatan:%20" target="_blank" class="btn btn-success">Chat via WhatsApp</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal untuk Desain Baju -->
<div class="modal fade" id="modalBaju" tabindex="-1" aria-labelledby="modalBajuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="modalBajuLabel">Detail Desain Baju</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p><strong>Desain Baju Barcode Personal</strong></p>
        <p>Desain baju dengan <strong>motif barcode</strong> yang berisi <strong>foto atau video kenangan</strong> dari customer, yang akan kami edit secara profesional sesuai keinginan Anda.</p>
        <ul>
          <li>Ukuran barcode: <strong>25cm x 25cm</strong></li>
          <li>Produk akhir: <strong>Kaos polos</strong> dengan sablonan barcode eksklusif</li>
          <li>Sablon yang digunakan: <strong>Plastisol</strong> – tahan lama dan cocok untuk cetakan ukuran besar</li>
          <li>Bahan kaos: <strong>Cotton Combed 24s</strong> – lembut, adem, dan nyaman dipakai</li>
        </ul>
        <p><strong>Cara Pemesanan:</strong></p>
        <ol>
          <li>Klik tombol "Buat Desain Sekarang".</li>
          <li>Isi formulir pemesanan dan upload foto/video kenangan Anda.</li>
          <li>Atau hubungi kami langsung via WhatsApp untuk konsultasi desain.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <a href="pemesanan.php" class="btn btn-warning">Buat Desain Sekarang</a>
        <a href="https://wa.me/6285643571036?text=Halo%20EVOQUE!%20Saya%20ingin%20memesan%20desain%20baju.%20Berikut%20informasinya:%0A-%20Ukuran%20barcode:%2025cm%20x%2025cm%0A-%20Bahan:%20Cotton%20Combed%2024s%0A-%20Sablon:%20Plastisol" target="_blank" class="btn btn-success">Chat via WhatsApp</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal untuk Desain Dompet -->
<div class="modal fade" id="modalDompet" tabindex="-1" aria-labelledby="modalDompetLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title" id="modalDompetLabel">Detail Desain Dompet</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <p><strong>Desain Dompet Barcode Personal</strong></p>
        <p>Dompet dengan sentuhan personal menggunakan barcode yang terhubung ke foto/video kenangan milik Anda. Desain bisa disesuaikan dengan keinginan.</p>
        <ul>
          <li><strong>Bentuk 1:</strong> Stiker barcode <strong>(tanpa produk fisik)</strong> – stiker akan dibuat dan dikirim oleh tim kami.</li>
          <li><strong>Bentuk 2:</strong> Dompet fisik <strong>dengan barcode yang sudah ditempel</strong> – bisa request warna, tulisan, dan gaya desain.</li>
        </ul>
        <p class="text-danger"><em>Catatan:</em> Stiker barcode hanya dibuat oleh <strong>EVOQUE</strong>, tidak diperkenankan untuk mencetak sendiri.</p>
        <p><strong>Cara Pemesanan:</strong></p>
        <ol>
          <li>Klik tombol "Buat Desain Sekarang".</li>
          <li>Pilih bentuk desain yang diinginkan.</li>
          <li>Isi formulir pemesanan secara lengkap, atau konsultasikan langsung via WhatsApp.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <a href="pemesanan.php" class="btn btn-warning">Buat Desain Sekarang</a>
        <a href="https://wa.me/6285643571036?text=Halo%20EVOQUE!%20Saya%20ingin%20memesan%20desain%20dompet.%20Berikut%20informasinya:%0A-%20Jenis%20Desain:%20%0A-%20Catatan:%20" target="_blank" class="btn btn-success">Chat via WhatsApp</a>
      </div>
    </div>
  </div>
</div>
<style>
.zoom-hover {
  transition: transform 0.3s ease;
  cursor: pointer;
}
.zoom-hover:hover {
  transform: scale(1.05);
}
</style>
</body>
</html>
