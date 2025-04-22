<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $jenis_desain = $_POST["jenis_desain"];
    $deskripsi = $_POST["deskripsi"];

    $sql = "INSERT INTO pesanan (nama, email, jenis_desain, deskripsi) VALUES ('$nama', '$email', '$jenis_desain', '$deskripsi')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pesanan berhasil dikirim!'); window.location.href='dashboard.php';</script>";
    } else {
        echo "<script>alert('Gagal mengirim pesanan.'); window.location.href='dashboard.php';</script>";
    }
}
?>
