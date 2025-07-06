<?php
include('../koneksi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

$judul = mysqli_real_escape_string($db, $_POST['nama_artikel']);
$isi = mysqli_real_escape_string($db, $_POST['isi_artikel']);
$penulis = mysqli_real_escape_string($db, $_POST['nama_penulis']);
$tanggal = mysqli_real_escape_string($db, $_POST['tanggal_publish']);
$tag = mysqli_real_escape_string($db, $_POST['tag_artikel']);

// Simpan ke database tanpa gambar
$sql = "INSERT INTO tbl_artikel (nama_artikel, isi_artikel, nama_penulis, tanggal_publish, tag_artikel)
        VALUES ('$judul', '$isi', '$penulis', '$tanggal', '$tag')";

$query = mysqli_query($db, $sql);

if ($query) {
    echo "<script>alert('Artikel berhasil ditambahkan.'); window.location='data_artikel.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan artikel.'); history.back();</script>";
}
?>