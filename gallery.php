<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery | Personal Web</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <style>
    h1, h2 {
        font-family: 'Poppins', sans-serif;
    }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 font-sans transition-all duration-300">
    <!-- Header -->
     <header class="bg-gradient-to-r from-blue-800 via-purple-700 to-blue-800 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-white text-center p-6 text-3xl font-semibold tracking-wide shadow-md">
        Gallery | Nabila Azzahra
        <!-- Dark mode toggle button -->
         <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition"
            title="Toggle Theme">
            <!-- Moon icon -->
             <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
            </svg>
            <!-- Sun icon -->
             <svg id="icon-sun" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current hidden"
                viewBox="0 0 24 24">
                <path
                    d="M12 4.75a.75.75 0 01.75-.75h.5a.75.75 0 010 1.5h-.5A.75.75 0 0112 4.75zM12 18.25a.75.75 0 01.75.75h-.5a.75.75 0 010-1.5h.5a.75.75 0 01-.75.75zM4.75 12a.75.75 0 01-.75.75v-.5a.75.75 0 011.5 0v.5A.75.75 0 014.75 12zM18.25 12a.75.75 0 01.75.75v-.5a.75.75 0 01-1.5 0v.5a.75.75 0 01.75-.75zM7.03 7.03a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 16.97a.75.75 0 01.53-.22.75.75 0 01.53 1.28l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM16.97 7.03a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM7.03 16.97a.75.75 0 011.06 1.06l-.35.35a.75.75 0 11-1.06-1.06l.35-.35zM12 8a4 4 0 100 8 4 4 0 000-8z" />
            </svg>
        </button>
    </header>
    <!-- Navigation -->
     <nav class="bg-gradient-to-r from-blue-700 via-purple-400 to-blue-700 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-white py-3 shadow-md">
        <ul class="flex justify-center space-x-10 font-medium text-lg">
            <li><a href="index.php" class="hover:underline hover:font-semibold transition">Artikel</a></li>
            <li><a href="gallery.php" class="hover:underline hover:font-semibold transition">Gallery</a></li>
            <li><a href="about.php" class="hover:underline hover:font-semibold transition">About</a></li>
            <li><a href="admin/login.php" class="hover:underline hover:font-semibold transition">Login</a></li>
        </ul>
    </nav>
    <!-- Gallery Grid -->
     <main class="max-w-6xl mx-auto p-6">
        <h2 class="text-xl font-bold mb-6 text-center">Galeri Foto</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php
            $sql = "SELECT * FROM tbl_gallery ORDER BY id_gallery DESC";
            $query = mysqli_query($db, $sql);
            while ($data = mysqli_fetch_array($query)) {
                echo "<div class='bg-white border rounded shadow overflow-hidden'>";
                echo "<img src='images/{$data['foto']}' class='w-full h-48 object-cover' alt='Gambar'>";
                echo "<div class='p-4'>";
                echo "<h3 class='text-lg font-semibold text-blue-700'>" .
                    htmlspecialchars($data['judul']) . "</h3>";
                echo "</div></div>";
            }
            ?>
        </div>
    </main>
    <!-- Footer -->
     <footer class="bg-gradient-to-r from-blue-800 via-purple-700 to-blue-800 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-white text-center py-4 mt-10 shadow-inner">
        &copy; <?php echo date('Y'); ?> | Created by Nabila Azzahra
    </footer>
    <!-- 🎵 Musik Admin Mini Player -->
<div style="
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 999;
  display: flex;
  flex-direction: column;
  gap: 10px;
  align-items: center;
  background: rgba(255, 255, 255, 0.85);
  padding: 12px;
  border-radius: 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  backdrop-filter: blur(6px);
">
  <audio id="adminAudio" muted autoplay loop>
    <source id="adminSource" src="musik/lagu1.mp3" type="audio/mpeg">
    Browser kamu tidak mendukung audio.
  </audio>

  <button onclick="toggleAdminMusic()" 
    style="background-color: #fef3c7; border: 2px dashed #facc15; color: #92400e;
           padding: 12px; border-radius: 50%; font-size: 20px; cursor: pointer;">
    🎵
  </button>

  <button onclick="gantiLagu()" 
    style="background-color: #e0f2fe; border: 2px dashed #38bdf8; color: #0284c7;
           padding: 12px; border-radius: 50%; font-size: 20px; cursor: pointer;">
    ⏭️
  </button>
</div>

<script>
  const laguAdmin = [
    "musik/lagu1.mp3",
    "musik/lagu2.mp3",
    "musik/lagu3.mp3"
  ];

  let laguIndex = Math.floor(Math.random() * laguAdmin.length);
  const audio = document.getElementById("adminAudio");
  const source = document.getElementById("adminSource");

  function setLagu(index) {
    source.src = laguAdmin[index];
    audio.load();
  }

  setLagu(laguIndex);

  // 🔊 Usaha autoplay dengan unmute
  window.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
      audio.muted = false;
      audio.play().catch(err => {
        console.warn("Autoplay diblokir. Silakan klik tombol 🎵");
      });
    }, 100); // sedikit delay untuk menghindari blokir autoplay
  });

  function toggleAdminMusic() {
    audio.muted = false;
    if (audio.paused) {
      audio.play();
    } else {
      audio.pause();
    }
  }

  function gantiLagu() {
    laguIndex = (laguIndex + 1) % laguAdmin.length;
    setLagu(laguIndex);
    audio.play();
  }
</script>
</body>
</html>