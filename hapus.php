<?php 
include 'koneksi.php';
$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT gambar FROM kebaya WHERE id='$id'");
$row = mysqli_fetch_array($data);
$gambar_lama = "img/" . $row['gambar'];

if(file_exists($gambar_lama)){
    unlink($gambar_lama);
}

mysqli_query($koneksi, "DELETE FROM kebaya WHERE id='$id'");

header("location:admin.php?alert=terhapus");
?>