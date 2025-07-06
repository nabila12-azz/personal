<?php
include('../koneksi.php');
session_start();
if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kelola About</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
    h1, h2 {
        font-family: 'Poppins', sans-serif;
    }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' }

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
        <h1 class="text-3xl font-bold">Kelola Halaman About</h1>
        <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition" title="Toggle Theme">
            <!-- Moon icon -->
             <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
            </svg>
            <!-- Sun icon -->
             <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current hidden" viewBox="0 0 24 24">
                <path
                d="M12 4.75a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0112 4.75zM12 18.25a.75.75 0 01.75.75h-.5a.75.75 0 010-1.5h.5a.75.75 0 01-.75.75zM4.75 12a.75.75 0 01-.75.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 014.75 12zM18.25 12a.75.75 0 01.75.75v-.5a.75.75 0 01-1.5 0v.5a.75.75 0 01.75-.75zM7.03 7.03a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 16.97a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 7.03a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM7.03 16.97a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
        </button>
    </header>
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
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white">Tentang Saya</h2>
                <a href="add_about.php" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">+ Tambah Data</a>
            </div>            
            <div class="space-y-4">
                <?php
                $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<div class='p-4 bg-gray-50 dark:bg-gray-900 border dark:border-gray-700 rounded shadow'>";
                    echo "<p class='mb-3 text-gray-700 dark:text-gray-300'>" . htmlspecialchars($data['about']) . "</p>";
                    echo "<div class='flex space-x-4 text-sm'>";
                    echo "<a href='edit_about.php?id_about={$data['id_about']}' class='text-blue-600 hover:underline'>Edit</a>";
                    echo "<a href='delete_about.php?id_about={$data['id_about']}' onclick='return confirm(\"Yakin ingin menghapus?\")' class='text-red-600 hover:underline'>Hapus</a>";
                    echo "</div></div>";
                }
                ?>
            </div>
        </main>
    </div>
    <!-- Footer -->
     <footer class="bg-gradient-to-r from-blue-800 via-purple-700 to-blue-800 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-white text-center py-4 mt-10 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by Nabila Azzahra
    </footer>
</body>
</html>