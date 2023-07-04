<?php
session_start();
include "koneksi.php";

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['nobp'])) {
    header("Location: index.php");
    exit;
}

// Ambil nobp dari session
$nobp = $_SESSION['nobp'];

// Ambil data nama pengguna dari database berdasarkan nobp
$query = "SELECT nama FROM siswa WHERE nobp = '$nobp'";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama = $row['nama'];
} else {
    // Handle jika data pengguna tidak ditemukan
    $nama = "User Not Found";
}

// Ambil data kehadiran siswa dari database berdasarkan user yang sedang login
$queryKehadiran = "SELECT status, COUNT(*) as count FROM kehadiran WHERE nobp = '$nobp' GROUP BY status";
$resultKehadiran = mysqli_query($koneksi, $queryKehadiran);

$labels = [];
$data = [];

while ($rowKehadiran = mysqli_fetch_assoc($resultKehadiran)) {
    $labels[] = $rowKehadiran['status'];
    $data[] = $rowKehadiran['count'];
}

// Function untuk memasukkan data dummy kehadiran siswa
function insertDummyKehadiran($koneksi, $nobp, $status, $count) {
    for ($i = 0; $i < $count; $i++) {
        $queryInsert = "INSERT INTO kehadiran (nobp, status, point) VALUES ('$nobp', '$status', 0)";
        mysqli_query($koneksi, $queryInsert);
    }
}

// Memasukkan data dummy kehadiran jika belum ada data
$queryCheckKehadiran = "SELECT COUNT(*) as total FROM kehadiran WHERE nobp = '$nobp'";
$resultCheckKehadiran = mysqli_query($koneksi, $queryCheckKehadiran);
$rowCheckKehadiran = mysqli_fetch_assoc($resultCheckKehadiran);
$totalKehadiran = $rowCheckKehadiran['total'];

if ($totalKehadiran == 0) {
    insertDummyKehadiran($koneksi, $nobp, 'hadir', 5);
    insertDummyKehadiran($koneksi, $nobp, 'izin', 2);
    insertDummyKehadiran($koneksi, $nobp, 'alpha', 3);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Landing Page</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <div class="col-md-12 row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="col-md-12 text-center">
                    <h2>Welcome to the Landing Page</h2>
                </div>
                <div class="col-md-12 mt-5">
                    <p>User: <?php echo $nama; ?></p>
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
                <div class="col-md-12 mt-5">
                    <canvas id="chartKehadiran"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Menggunakan Chart.js untuk menampilkan diagram kehadiran
        var ctx = document.getElementById('chartKehadiran').getContext('2d');
        var chartKehadiran = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Kehadiran',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>
</body>
</html>
