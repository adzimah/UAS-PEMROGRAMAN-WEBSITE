<?php 
session_start();
if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Admin - Airent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background-color: #fff0f5;">

    <nav class="navbar navbar-dark bg-danger p-3">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Admin Airent</span>
            <div>
                <a href="admin.php" class="btn btn-sm btn-light text-danger fw-bold me-2">Data Kebaya</a>
                <a href="data_sewa.php" class="btn btn-sm btn-outline-light">Data Pesanan</a>
                
                <a href="logout.php" class="btn btn-sm btn-warning ms-3">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-danger">Data Kebaya</h5>
                <a href="tambah.php" class="btn btn-danger btn-sm"><i class="fas fa-plus"></i> Tambah Kebaya</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th width="15%">Gambar</th>
                            <th>Nama Kebaya</th>
                            <th>Harga Sewa</th>
                            <th>Status</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        $data = mysqli_query($koneksi,"SELECT * FROM kebaya");
                        while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td>
                                <img src="img/<?php echo $d['gambar']; ?>" width="80" height="80" style="object-fit:cover; border-radius:5px;">
                            </td>
                            <td><?php echo $d['nama_kebaya']; ?></td>
                            <td>Rp <?php echo number_format($d['harga_sewa']); ?></td>
                            <td>
                                <?php if($d['status'] == 'Tersedia'): ?>
                                    <span class="badge bg-success">Tersedia</span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">Disewa</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-warning text-white"><i class="fas fa-edit"></i></a>
                                <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data ini?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>