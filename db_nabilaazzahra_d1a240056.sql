-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 04:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nabilaazzahra_d1a240056`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(2) NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `about`) VALUES
(1, 'Nama saya Nabila Azzahra, seorang mahasiswa yang memiliki minat besar terhadap dunia teknologi dan perkembangannya. Saya percaya bahwa teknologi bukan hanya soal alat atau aplikasi, tetapi juga tentang bagaimana kita menggunakannya untuk mempermudah hidup, menyelesaikan masalah, dan menciptakan perubahan positif di masyarakat.\r\nMelalui tulisan ini, saya ingin berbagi pandangan saya mengenai bagaimana teknologi telah memengaruhi berbagai aspek kehidupan. Saya senang belajar hal-hal baru, terutama yang berkaitan dengan digitalisasi, inovasi, dan solusi praktis berbasis teknologi.\r\nSaya berharap tulisan ini bisa memberikan manfaat dan menambah wawasan bagi siapa pun yang membacanya.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_artikel`
--

CREATE TABLE `tbl_artikel` (
  `id_artikel` int(11) NOT NULL,
  `nama_artikel` text DEFAULT NULL,
  `isi_artikel` text DEFAULT NULL,
  `nama_penulis` varchar(100) DEFAULT NULL,
  `tanggal_publish` date DEFAULT NULL,
  `tag_artikel` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_artikel`
--

INSERT INTO `tbl_artikel` (`id_artikel`, `nama_artikel`, `isi_artikel`, `nama_penulis`, `tanggal_publish`, `tag_artikel`) VALUES
(1, 'Perkembangan Teknologi dan Dampaknya terhadap Kehidupan Manusia', 'Teknologi adalah hasil dari inovasi manusia untuk memudahkan kehidupan. Dari alat sederhana seperti roda dan api, kini teknologi berkembang pesat menjadi kecerdasan buatan (AI), internet of things (IoT), dan komputasi awan (cloud computing). Perkembangannya terasa di berbagai bidang seperti pendidikan, kesehatan, industri, dan komunikasi.\r\nManfaat teknologi sangat besar. Pekerjaan menjadi lebih cepat dan efisien, informasi mudah diakses lewat internet, dan layanan kesehatan serta pendidikan jadi lebih terbuka bagi banyak orang. Banyak hal yang dulu sulit kini bisa dilakukan dengan bantuan teknologi.\r\nNamun, teknologi juga punya sisi negatif. Ketergantungan yang berlebihan bisa membuat kita malas berpikir atau bertindak. Data pribadi bisa dicuri jika tidak hati-hati. Selain itu, otomatisasi bisa mengurangi lapangan kerja, dan penggunaan media sosial yang berlebihan bisa berdampak pada kesehatan mental.\r\nKesimpulannya, teknologi membawa manfaat besar, tapi juga perlu digunakan dengan bijak. Kita semua perlu belajar menggunakan teknologi secara sehat dan bertanggung jawab agar manfaatnya bisa dirasakan secara maksimal.', 'Nabila Azzahra', '2025-07-05', '#Motivasi #Pendidikan #Teknologi #GenerasiMuda #BelajarDigital #SemangatBerkembang'),
(3, 'Manfaat Teknologi Digital Terhadap Motivasi Belajar Peserta Didik', 'Teknologi digital telah berkembang pesat di abad ke-21 dan terbukti menjadi motivator dalam pendidikan. Digitalisasi mempercepat akses informasi, meningkatkan kompetensi hidup sebagai modal kerja, serta memudahkan guru dalam menyusun Rencana Pelaksanaan Pembelajaran (RPP). Inisiatif dari Kemendikbud seperti kurikulum digital dan sistem belajar online menunjukkan bahwa teknologi memang harus diintegrasikan dalam pendidikan guna mendukung visi Indonesia Kreatif 2045. Secara teknis, teknologi digital berbasis komputer menggunakan input 0 dan 1, memungkinkan transfer data yang lebih cepat dan efisien dibandingkan analog. Teknologi ini membuka komunikasi dinamis tanpa batas ruang dan waktu seperti lewat internet, blog, dan email meskipun hasil akhir informasi tetap diterima dalam bentuk analog oleh indera manusia. Secara psikologis, bahan ajar digital yang mengombinasikan teks, gambar, audio, video, dan animasi membuat proses belajar lebih menarik dan efektif. Kombinasi multimedia ini mampu merubah perilaku belajar siswa menjadi lebih aktif dan antusias dalam menguasai materi. \r\nNamun, tantangannya tidak kecil. Pemanfaatan teknologi harus disertai literasi digital dan pengawasan guru maupun orang tua untuk menghindari dampak negatif seperti gangguan digital atau penggunaan internet tanpa batas. Dengan sistem pendukung yang tepat, teknologi digital bukan hanya alat bantu, tetapi pendorong utama motivasi siswa untuk terus berkembang .\r\nArtikel ini menegaskan bahwa agar teknologi memberikan efek positif, dibutuhkan kolaborasi antara siswa, guru, dan orang tua untuk menciptakan lingkungan pembelajaran yang kondusif dan beretika. Dengan begitu, teknologi digital benar-benar dapat meningkatkan semangat dan efektivitas belajar.', 'Lukman Hakim, S.Sos, M.M.', '2023-09-27', '#Motivasi #Pendidikan #Teknologi #BelajarDigital #InovasiPendidikan'),
(4, '40+ Web Development Trends That Will Change the Way You Create Websites in 2025', 'Artikel ini merangkum tren web development tahun 2025, mencakup 48 poin penting seperti AI, PWA, IoT, voice search, dark mode, cybersecurity, micro frontends, VR, hingga teknologi serverless. Fokusnya pada adaptasi teknologi agar tetap relevan & aman.', 'GMI Research Team', '2025-05-07', '#WebDevelopment #Tren2025 #AI #PWA #Cybersecurity');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(5) NOT NULL,
  `judul` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `judul`, `foto`) VALUES
(2, 'Programmer', 'images (2).jpeg'),
(3, 'Tikus yang Suka Uang', 'download.png'),
(4, 'Digital', 'img teknologi.jpeg'),
(6, 'Teknologi ', 'download (6).jpeg'),
(7, 'AI', 'teknologi ai.jpeg'),
(8, 'Poster Gojek', 'WhatsApp Image 2025-06-03 at 21.38.22_a7cb89bd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) DEFAULT NULL,
  `nama_komentator` varchar(100) DEFAULT NULL,
  `isi_komentar` text DEFAULT NULL,
  `tanggal_komentar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `id_artikel`, `nama_komentator`, `isi_komentar`, `tanggal_komentar`) VALUES
(1, 1, 'nabila azz', 'bermanfaat sekali artikelnya', '2025-07-05 17:51:46'),
(2, 3, 'nabila azzahra', 'Artikel ini sangat membuka wawasan saya tentang pentingnya pemanfaatan teknologi dalam dunia pendidikan.', '2025-07-05 19:02:47'),
(3, 3, 'devi lestari', 'Saya setuju bahwa teknologi tidak hanya mempermudah akses informasi, tapi juga dapat meningkatkan semangat belajar jika digunakan dengan benar.', '2025-07-05 19:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`id`, `tanggal`, `jumlah`) VALUES
(1, '2025-07-06', 71);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_artikel`
--
ALTER TABLE `tbl_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
