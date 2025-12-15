<?php
session_start();
if($_SESSION['status']!="login"){ header("location:login.php"); }
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM kebaya WHERE id='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data - Airent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #fff0f5;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0">Edit Data Kebaya</h5>
                    </div>
                    <div class="card-body">
                        <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                            
                            <div class="mb-3">
                                <label>Nama Kebaya</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $d['nama_kebaya']; ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3" required><?php echo $d['deskripsi']; ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label>Harga Sewa</label>
                                <input type="number" name="harga" class="form-control" value="<?php echo $d['harga_sewa']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label>Status Kebaya</label>
                                <select name="status" class="form-select">
                                    <option value="Tersedia" <?php if($d['status']=="Tersedia") echo "selected"; ?>>Tersedia</option>
                                    <option value="Disewa" <?php if($d['status']=="Disewa") echo "selected"; ?>>Sedang Disewa</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Ganti Foto (Biarkan kosong jika tidak ingin mengganti)</label>
                                <br>
                                <img src="img/<?php echo $d['gambar']; ?>" width="100" class="mb-2">
                                <input type="file" name="foto" class="form-control">
                            </div>
                            
                            <a href="admin.php" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-warning text-white">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>