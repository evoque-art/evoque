<?php
session_start();
include 'config.php';

// Cek apakah admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Ambil data pesanan dari database
$query = "SELECT * FROM pesanan";
$result = mysqli_query($conn, $query);

// Hitung jumlah status pesanan
$total_pesanan = mysqli_num_rows($result);
$sukses = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pesanan WHERE status='selesai'"));
$batal = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pesanan WHERE status='dibatalkan'"));
$proses = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pesanan WHERE status='proses'"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background: #3D657F;
            color: white;
        }
        button {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
        }
        .proses { background: orange; color: white; }
        .selesai { background: green; color: white; }
        .batal { background: red; color: white; }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="admin_dashboard.php"><font color='black'>
            <img src="logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
            EVOQUE - Jasa Desain</font>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-danger" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <h2>Admin Dashboard</h2>
        <canvas id="orderChart"></canvas>
        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Jenis Desain</th>
                <th>Deskripsi</th>
                <th>File Desain</th>
                <th>Status Penyelesaian</th>
                <th>Aksi</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['jenis_desain'] ?></td>
                    <td><?= $row['deskripsi'] ?></td>
                    <td><a href='uploud/<?= $row['file_desain'] ?>' target='_blank'>Lihat File</a></td>
                    <td><span class="<?= $row['status'] ?>"><?= ucfirst($row['status']) ?></span></td>
					<td>
						<button class="btn btn-success update-status" data-id="<?= $row['id'] ?>" data-status="selesai">Selesai</button>
						<button class="btn btn-danger update-status" data-id="<?= $row['id'] ?>" data-status="dibatalkan">Batal</button>
					</td>

                </tr>
            <?php } ?>
        </table>
    </div>
	</body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<script>
	$(document).ready(function() {
		var ctx = document.getElementById('orderChart').getContext('2d');
		var orderChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Total Pesanan', 'Selesai', 'proses', 'dibatalkan'],
				datasets: [{
					label: 'Jumlah',
					data: [<?= $total_pesanan ?>, <?= $sukses ?>, <?= $proses ?>, <?= $batal ?>],
					backgroundColor: ['blue', 'green', 'orange', 'red']
				}]
			}
		});

		$(".update-status").click(function() {
			var id = $(this).data("id");
			var status = $(this).data("status");

			$.ajax({
				url: "update_status.php",
				type: "POST",
				data: { id: id, status: status },
				dataType: "json",
				success: function(response) {
					if (response.success) {
						alert("Status berhasil diperbarui!");

						// Update chart data tanpa reload halaman
						orderChart.data.datasets[0].data = [
							response.total_pesanan, 
							response.sukses, 
							response.batal, 
							response.proses
						];
						orderChart.update();

						// Update tampilan status pada tabel
						$("button[data-id='" + id + "']").closest("tr").find("td:nth-child(6)").html(
							"<span class='" + status + "'>" + status.charAt(0).toUpperCase() + status.slice(1) + "</span>"
						);
					} else {
						alert("Gagal memperbarui status.");
					}
				}
			});
		});
	});
	</script>

</body>
</html>