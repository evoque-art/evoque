<?php
header('Content-Type: application/json');
include 'config.php';

$query = "SELECT 
            COUNT(*) as total, 
            SUM(CASE WHEN status = 'proses' THEN 1 ELSE 0 END) as proses, 
            SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as selesai, 
            SUM(CASE WHEN status = 'Dibatalkan' THEN 1 ELSE 0 END) as batal 
          FROM pesanan";

$result = $conn->query($query);
$data = $result->fetch_assoc();<?php
header('Content-Type: application/json');
include 'config.php';

$query = "SELECT 
            COUNT(*) as total,
            SUM(CASE WHEN status = 'proses' THEN 1 ELSE 0 END) as proses,
            SUM(CASE WHEN status = 'selesai' THEN 1 ELSE 0 END) as selesai,
            SUM(CASE WHEN status = 'Dibatalkan' THEN 1 ELSE 0 END) as batal
          FROM pesanan";

$result = $conn->query($query);
$data = $result->fetch_assoc();

// Jika ada nilai NULL, ubah jadi 0 agar tidak error
foreach ($data as $key => $value) {
    if ($value === null) {
        $data[$key] = 0;
    }
}

echo json_encode($data, JSON_PRETTY_PRINT);
?>


echo json_encode($data, JSON_PRETTY_PRINT);
?>