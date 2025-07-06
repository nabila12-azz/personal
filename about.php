<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About | Personal Web</title>
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
<body class="bg-white text-gray-900 dark:bg-gray-900 dark:text-white transition duration-500">
    <!-- Header -->
     <header class="bg-gradient-to-r from-blue-800 via-purple-700 to-blue-800 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900 text-white text-center p-6 text-3xl font-semibold tracking-wide shadow-md">
        About Me | Nabila Azzahra
        <button onclick="toggleDarkMode()" class="absolute right-6 top-6 text-white hover:scale-110 transition"
            title="Toggle Theme">
            <svg id="icon-moon" xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 fill-current" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 0111.21 3a7 7 0 1010 9.79z" />
            </svg>
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
    <!-- About Content -->
     <main class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 rounded shadow mt-10">
        <h2
            class="text-xl font-bold mb-4 text-blue-700 dark:text-blue-400 border-b border-gray-300 dark:border-gray-600 pb-2">
            Tentang Saya
        </h2>
        <!-- Profile Section -->
         <div class="flex flex-col md:flex-row items-center gap-6 mb-6">
            <img src="images/img nabila.jpg" alt="Foto Profil" class="w-40 h-40 rounded-full object-cover shadow-lg">
            <div class="text-gray-700 dark:text-gray-200 text-justify">
                <?php
                $sql = "SELECT * FROM tbl_about ORDER BY id_about DESC LIMIT 1";
                $query = mysqli_query($db, $sql);
                while ($data = mysqli_fetch_array($query)) {
                    echo "<p class='leading-relaxed'>" . nl2br(htmlspecialchars($data['about'])) . "</p>";
                }
                ?>
            </div>
        </div>
        <!-- Social Media Section -->
         <div class="mt-10">
            <div class="flex space-x-6 items-center">
                <!-- Instagram -->
                 <a href="https://instagram.com/nbla_azz12" target="_blank"
                    class="flex items-center space-x-2 text-pink-600 hover:text-pink-800 dark:text-pink-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                        <path
                            d="M7.75 2A5.75 5.75 0 002 7.75v8.5A5.75 5.75 0 007.75 22h8.5A5.75 5.75 0 0022 16.25v-8.5A5.75 5.75 0 0016.25 2h-8.5zM4.5 7.75A3.25 3.25 0 017.75 4.5h8.5A3.25 3.25 0 0119.5 7.75v8.5a3.25 3.25 0 01-3.25 3.25h-8.5A3.25 3.25 0 014.5 16.25v-8.5zm7.5 1.5a4.25 4.25 0 100 8.5 4.25 4.25 0 000-8.5zm0 1.5a2.75 2.75 0 110 5.5 2.75 2.75 0 010-5.5zm4.88-3.13a.88.88 0 11-1.75 0 .88.88 0 011.75 0z" />
                    </svg>
                    <span>Instagram</span>
                </a>
                <!-- Facebook -->
                 <a href="https://facebook.com/Nabila Azzahra" target="_blank"
                     class="flex items-center space-x-2 text-blue-600 hover:text-blue-800 dark:text-blue-400">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                    <path d="M22 12c0-5.5228-4.4772-10-10-10S2 6.4772 2 12c0 5.0212 3.6762 9.1673 8.438 9.8787v-6.9871H7.8984v-2.8916h2.5396v-2.2005c0-2.5064 1.4924-3.8916 3.7775-3.8916 1.0948 0 2.2384.1953 2.2384.1953v2.4648h-1.2616c-1.2434 0-1.6312.772-1.6312 1.5625v1.8695h2.7734l-.4434 2.8916h-2.33v6.9871C18.3238 21.1673 22 17.0212 22 12z"/>
                        </svg>
                        <span>Facebook</span>
                </a>
            </div>
        </div>
        <!-- Maps Section -->
         <div class="mt-8">
            <h3 class="text-lg font-semibold mb-3 text-blue-600 dark:text-blue-300">Lokasi Saya</h3>
            <div class="w-full h-64 rounded-lg overflow-hidden shadow-lg">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d7930.059675302339!2d107.75525857663887!3d-6.390151467699175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjMnMjMuMSJTIDEwN8KwNDUnMjkuMyJF!5e0!3m2!1sen!2sid!4v1751707250070!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
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