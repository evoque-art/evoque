<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update status di database
    $query = "UPDATE pesanan SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $status, $id);

    if ($stmt->execute()) {
        // Hitung ulang jumlah pesanan setelah update
        $total_pesanan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pesanan"))['total'];
        $sukses = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pesanan WHERE status='selesai'"))['total'];
        $batal = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pesanan WHERE status='dibatalkan'"))['total'];
        $proses = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM pesanan WHERE status='proses'"))['total'];

        // Kirim data sebagai JSON untuk update chart
        echo json_encode([
            "success" => true,
            "total_pesanan" => $total_pesanan,
            "sukses" => $sukses,
            "batal" => $batal,
            "proses" => $proses
        ]);
    } else {
        echo json_encode(["success" => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
