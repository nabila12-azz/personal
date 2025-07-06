<?php
include('../koneksi.php');
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
    exit;
}

$id = $_POST['id_artikel'];
$judul = mysqli_real_escape_string($db, $_POST['nama_artikel']);
$isi = mysqli_real_escape_string($db, $_POST['isi_artikel']);
$penulis = mysqli_real_escape_string($db, $_POST['nama_penulis']);
$tanggal = mysqli_real_escape_string($db, $_POST['tanggal_publish']);
$tag = mysqli_real_escape_string($db, $_POST['tag_artikel']);

// Query update tanpa gambar
$sql = "UPDATE tbl_artikel SET 
            nama_artikel = '$judul', 
            isi_artikel = '$isi', 
            nama_penulis = '$penulis', 
            tanggal_publish = '$tanggal', 
            tag_artikel = '$tag'
        WHERE id_artikel = '$id'";

$query = mysqli_query($db, $sql);

if ($query) {
    echo "<script>alert('Artikel berhasil diperbarui.'); window.location='data_artikel.php';</script>";
} else {
    echo "<script>alert('Gagal mengedit artikel.'); history.back();</script>";
}
?>
