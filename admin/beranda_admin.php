<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
require_once("../koneksi.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$query = mysqli_query($db, $sql);
$hasil = mysqli_fetch_array($query);

// Hitung total artikel & gallery
$jumlah_artikel = mysqli_num_rows(mysqli_query($db, "SELECT id_artikel FROM tbl_artikel"));
$jumlah_gallery = mysqli_num_rows(mysqli_query($db, "SELECT id_gallery FROM tbl_gallery"));

// ================== CATAT KUNJUNGAN HARIAN =====================
$tanggal_hari_ini = date('Y-m-d');
$cek_kunjungan = mysqli_query($db, "SELECT * FROM tbl_pengunjung WHERE tanggal = '$tanggal_hari_ini'");
if (mysqli_num_rows($cek_kunjungan) > 0) {
    mysqli_query($db, "UPDATE tbl_pengunjung SET jumlah = jumlah + 1 WHERE tanggal = '$tanggal_hari_ini'");
} else {
    mysqli_query($db, "INSERT INTO tbl_pengunjung (tanggal, jumlah) VALUES ('$tanggal_hari_ini', 1)");
}

// ================== AMBIL DATA 7 HARI TERAKHIR =====================
$statistik = mysqli_query($db, "SELECT tanggal, jumlah FROM tbl_pengunjung ORDER BY tanggal DESC LIMIT 7");
$labels = [];
$data = [];
while ($row = mysqli_fetch_assoc($statistik)) {
    $labels[] = date('D, d M', strtotime($row['tanggal']));
    $data[] = $row['jumlah'];
}
$labels = array_reverse($labels);
$data = array_reverse($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
    h1, h2 {
        font-family: 'Poppins', sans-serif;
    }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = { darkMode: 'class' };
        function toggleDarkMode() {
            const root = document.documentElement;
            root.classList.toggle('dark');
            const isDark = root.classList.contains('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            document.getElementById('icon-sun').classList.toggle('hidden', !isDark);
            document.getElementById('icon-moon').classList.toggle('hidden', isDark);
        }
        window.onload = () => {
            const theme = localStorage.getItem('theme');
            const isDark = theme === 'dark';
            if (isDark) document.documentElement.classList.add('dark');
            setTimeout(() => {
                document.getElementById('icon-sun').classList.toggle('hidden', !isDark);
                document.getElementById('icon-moon').classList.toggle('hidden', isDark);
            }, 0);
        };
    </script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 min-h-screen font-sans">
    <!-- Header -->
     <header class="bg-gradient-to-r from-blue-800 via-purple-700 to-blue-800 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-white text-center p-6 text-3xl font-semibold tracking-wide shadow-md">
        <h1 class="text-3xl font-bold">Halaman Administrator</h1>
        <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition" title="Toggle Theme">
            <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
            </svg>
            <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current hidden" viewBox="0 0 24 24">
                <path
                d="M12 4.75a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0112 4.75zM12 18.25a.75.75 0 01.75.75h-.5a.75.75 0 010-1.5h.5a.75.75 0 01-.75.75zM4.75 12a.75.75 0 01-.75.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 014.75 12zM18.25 12a.75.75 0 01.75.75v-.5a.75.75 0 01-1.5 0v.5a.75.75 0 01.75-.75zM7.03 7.03a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 16.97a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 7.03a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM7.03 16.97a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
        </button>
    </header>
    <!-- Container -->
     <div class="flex max-w-7xl mx-auto mt-8 px-4">
        <!-- Sidebar -->
         <aside class="w-1/4 bg-white dark:bg-gray-800 rounded shadow p-6">
            <h2 class="text-xl font-semibold text-blue-700 dark:text-blue-400 mb-4 text-center">MENU</h2>
            <ul class="space-y-2 text-gray-700 dark:text-gray-200">
                <li><a href="beranda_admin.php" class="block hover:text-blue-500">Beranda</a></li>
                <li><a href="data_artikel.php" class="block hover:text-blue-500">Kelola Artikel</a></li>
                <li><a href="data_gallery.php" class="block hover:text-blue-500">Kelola Gallery</a></li>
                <li><a href="about.php" class="block hover:text-blue-500">About</a></li>
                <li>
                    <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar?');"
                    class="block text-red-600 hover:underline font-medium">Logout</a>
                </li>
            </ul>
        </aside>
        <!-- Main Content -->
         <main class="w-3/4 bg-white dark:bg-gray-800 rounded shadow p-6">
            <div class="text-lg mb-4">
                Halo, <strong class="text-yellow-700 dark:text-blue-400"><?php echo $_SESSION['username']; ?></strong>!
            </div>
            <p class="text-sm text-gray-600 dark:text-gray-400">Silakan gunakan menu di samping untuk mengelola data.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                <div class="bg-white dark:bg-gray-900 shadow rounded p-4 text-center border-t-4 border-blue-600">
                <h3 class="text-xl font-semibold text-blue-700 dark:text-blue-400">Artikel</h3>
                <p class="text-3xl font-bold text-gray-800 dark:text-white"><?php echo $jumlah_artikel; ?></p>
            </div>
            <div class="bg-white dark:bg-gray-900 shadow rounded p-4 text-center border-t-4 border-green-600">
                <h3 class="text-xl font-semibold text-green-700 dark:text-green-400">Gallery</h3>
                <p class="text-3xl font-bold text-gray-800 dark:text-white"><?php echo $jumlah_gallery; ?></p>
            </div>
            </div>
            <!-- Statistik Pengunjung -->
             <div class="mt-10">
                <h2 class="text-xl font-bold text-blue-700 dark:text-blue-400 mb-4">Statistik Pengunjung (7 Hari Terakhir)</h2>
                <canvas id="visitorChart" class="bg-white dark:bg-gray-900 rounded shadow p-4"></canvas>
            </div>
        </main>
    </div>
    <!-- Chart.js -->
     <script>
     const ctx = document.getElementById('visitorChart').getContext('2d');
     const visitorChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Jumlah Pengunjung',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(59, 130, 246, 0.6)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            }
        }
        });
        </script>
        <!-- Footer -->
         <footer class="bg-gradient-to-r from-blue-800 via-purple-700 to-blue-800 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-white text-center py-4 mt-10 shadow-inner">
            &copy; <?php echo date('Y'); ?> | Created by Nabila Azzahra
        </footer>
</body>
</html>