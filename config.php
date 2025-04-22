<?php
$host = "localhost"; // Sesuaikan dengan server database Anda
$user = "root"; // Sesuaikan dengan user database
$password = ""; // Sesuaikan dengan password database
$dbname = "user_system"; // Nama database

$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
