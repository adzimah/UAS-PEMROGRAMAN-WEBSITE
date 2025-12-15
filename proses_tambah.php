<?php 
include 'koneksi.php';

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

// Upload File Logic
$rand = rand();
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


if(!in_array($ext, ['png','jpg','jpeg'])){
    header("location:tambah.php?alert=gagal_ekstensi");
}else{
    if($ukuran < 1044070){ // Maksimal 1MB
        $xx = $rand.'_'.$filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$xx);
        
        mysqli_query($koneksi, "INSERT INTO kebaya VALUES(NULL,'$nama','$deskripsi','$harga','$xx','Tersedia')");
        header("location:admin.php?alert=berhasil");
    }else{
        header("location:tambah.php?alert=gagal_ukuran");
    }
}
?>