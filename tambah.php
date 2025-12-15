<?php
session_start();
if($_SESSION['status']!="login"){ header("location:login.php"); }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data - Airent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #fff0f5;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-danger text-white">
                        <h5 class="mb-0">Tambah Kebaya Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label>Nama Kebaya</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Harga Sewa (Per Hari)</label>
                                <input type="number" name="harga" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Upload Foto</label>
                                <input type="file" name="foto" class="form-control" required>
                                <small class="text-muted">Format: JPG/PNG/JPEG</small>
                            </div>
                            
                            <a href="admin.php" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-danger">Simpan Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>