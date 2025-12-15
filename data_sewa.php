<?php 
session_start();
if($_SESSION['status']!="login"){ header("location:login.php"); }
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pesanan - Airent Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body style="background-color: #fff0f5;">

    <nav class="navbar navbar-dark bg-danger p-3">
        <div class="container">
            <span class="navbar-brand mb-0 h1">Admin Airent</span>
            <div>
                <a href="admin.php" class="btn btn-sm btn-outline-light me-2">Data Kebaya</a>
                <a href="data_sewa.php" class="btn btn-sm btn-light text-danger fw-bold">Data Pesanan</a>
                <a href="logout.php" class="btn btn-sm btn-warning ms-3">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card shadow">
            <div class="card-header bg-white">
                <h5 class="mb-0 text-danger">Daftar Pesanan Masuk</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penyewa</th>
                            <th>Kebaya</th>
                            <th>Tgl Pakai</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Join tabel transaksi dengan tabel kebaya agar nama kebaya muncul
                        $data = mysqli_query($koneksi,"SELECT transaksi.*, kebaya.nama_kebaya FROM transaksi LEFT JOIN kebaya ON transaksi.id_kebaya = kebaya.id ORDER BY transaksi.id DESC");
                        $no = 1;
                        while($d = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $d['nama_penyewa']; ?></td>
                            <td><?php echo $d['nama_kebaya']; ?></td>
                            <td><?php echo $d['tanggal_sewa']; ?></td>
                            <td>
                                <a href="https://wa.me/<?php echo $d['no_hp']; ?>" target="_blank" class="btn btn-sm btn-success">
                                    <i class="fab fa-whatsapp"></i> <?php echo $d['no_hp']; ?>
                                </a>
                            </td>
                            <td><?php echo $d['alamat']; ?></td>
                            <td>
                                <a href="hapus_sewa.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus pesanan ini?')"><i class="fas fa-trash"></i></a>
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