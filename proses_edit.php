<?php 
include 'koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$status = $_POST['status'];

$filename = $_FILES['foto']['name'];

// Jika TIDAK mengganti gambar
if($filename == "") {
    mysqli_query($koneksi, "UPDATE kebaya SET nama_kebaya='$nama', deskripsi='$deskripsi', harga_sewa='$harga', status='$status' WHERE id='$id'");
    header("location:admin.php?alert=berhasil_update");

} else {
    // MENGGANTI gambar
    $rand = rand();
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext, ['png','jpg','jpeg'])){
        header("location:edit.php?id=$id&alert=gagal_ekstensi");
    }else{
        $xx = $rand.'_'.$filename;
        move_uploaded_file($_FILES['foto']['tmp_name'], 'img/'.$xx);
        
        // Update data beserta nama gambar baru
        mysqli_query($koneksi, "UPDATE kebaya SET nama_kebaya='$nama', deskripsi='$deskripsi', harga_sewa='$harga', gambar='$xx', status='$status' WHERE id='$id'");
        header("location:admin.php?alert=berhasil_update");
    }
}
?>