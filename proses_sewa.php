<?php
include 'koneksi.php';

$id_kebaya = $_POST['id_kebaya'];
$nama = $_POST['nama_penyewa'];
$hp = $_POST['no_hp'];
$tgl = $_POST['tgl_sewa'];
$alamat = $_POST['alamat'];

// Simpan ke tabel transaksi
mysqli_query($koneksi, "INSERT INTO transaksi (id_kebaya, nama_penyewa, no_hp, tanggal_sewa, alamat, status_transaksi) VALUES ('$id_kebaya', '$nama', '$hp', '$tgl', '$alamat', 'Menunggu')");

// PENTING: Arahkan kembali ke halaman depan (index.php) bukan admin
header("location:index.php?pesan=berhasil_sewa");
?>