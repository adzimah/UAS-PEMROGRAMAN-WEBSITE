<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM kebaya");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airent - Rental Kebaya Elegan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Airent Pink Theme & Styles */
        :root { --pink-primary: #e83e8c; --pink-soft: #fce4ec; --pink-hover: #c21768; }
        body { font-family: 'Poppins', sans-serif; background-color: #fff0f5; }
        html { scroll-behavior: smooth; scroll-padding-top: 80px; }
        .navbar { background-color: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-size: 1.8rem; color: var(--pink-primary) !important; font-weight: bold; }
        .carousel-item { height: 550px; background-color: #fd97b9ff; }
        .carousel-item img { height: 100%; width: 100%; object-fit: cover; opacity: 0.7; }
        .carousel-caption { bottom: 35%; z-index: 2; }
        .carousel-caption h1 { font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: bold; text-shadow: 2px 2px 5px rgba(0,0,0,0.5); }
        .card { border: none; border-radius: 15px; transition: transform 0.3s; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .card:hover { transform: translateY(-5px); }
        .card-img-top { height: 300px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px; }
        .btn-airent { background-color: var(--pink-primary); color: white; border-radius: 20px; padding: 8px 20px; }
        .btn-airent:hover { background-color: var(--pink-hover); color: white; }
        .badge-status { position: absolute; top: 10px; right: 10px; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">🌸 Airent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#katalog">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="#cara-sewa">Cara Sewa</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-danger ms-2 rounded-pill" href="login.php">Login Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero mt-5">
    <div id="heroCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1596564239714-bce21d09e571?q=80&w=1600&auto=format&fit=crop" class="d-block w-100" alt="Kebaya 1">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-white">Anggun Bersama Airent</h1>
                    <p>Pusat Penyewaan Kebaya Premium dengan Harga Mahasiswa.</p>
                    <a href="#katalog" class="btn btn-airent btn-lg mt-3 shadow">Lihat Koleksi</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1537637894980-0a256df73319?q=80&w=1600&auto=format&fit=crop" class="d-block w-100" alt="Kebaya 2">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-white">Diskon Spesial Wisuda</h1>
                    <p>Tampil cantik di hari bahagiamu tanpa bikin kantong bolong.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1549488347-197e884e93fb?q=80&w=1600&auto=format&fit=crop" class="d-block w-100" alt="Kebaya 3">
                <div class="carousel-caption d-none d-md-block">
                    <h1 class="text-white">Koleksi Terbaru 2025</h1>
                    <p>Model Kutu Baru, Modern, hingga Full Payet tersedia.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></button>
    </div>
    </header>

    <section id="katalog" class="container py-5">
        <h2 class="text-center mb-5" style="font-family: 'Playfair Display'; color: #e83e8c;">Koleksi Terbaru</h2>
        
        <?php if(isset($_GET['pesan']) && $_GET['pesan'] == 'berhasil_sewa'): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Terima Kasih!</strong> Pesanan Anda telah diterima. Admin akan segera menghubungi nomor Anda.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php while($data = mysqli_fetch_array($query)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php if($data['status'] == 'Tersedia'): ?>
                            <span class="badge bg-success badge-status">Tersedia</span>
                        <?php else: ?>
                            <span class="badge bg-secondary badge-status">Disewa</span>
                        <?php endif; ?>

                        <img src="img/<?= $data['gambar']; ?>" class="card-img-top" alt="<?= $data['nama_kebaya']; ?>" style="cursor: pointer;" onclick="bukaGambar('img/<?= $data['gambar']; ?>', '<?= $data['nama_kebaya']; ?>')" onerror="this.src='https://via.placeholder.com/300x400?text=No+Image'">
                        
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $data['nama_kebaya']; ?></h5>
                            <p class="card-text text-muted small"><?= substr($data['deskripsi'], 0, 50); ?>...</p>
                            <h6 class="text-danger mb-3">Rp <?= number_format($data['harga_sewa'], 0, ',', '.'); ?> / hari</h6>
                            
                            <?php if($data['status'] == 'Tersedia'): ?>
                                <button type="button" class="btn btn-airent w-100" onclick="isiFormSewa('<?= $data['id']; ?>', '<?= $data['nama_kebaya']; ?>')">
                                    Sewa Sekarang
                                </button>
                            <?php else: ?>
                                <button class="btn btn-secondary w-100" disabled>Sedang Disewa</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>

    <section id="cara-sewa" class="py-5" style="background-color: white;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="font-family: 'Playfair Display'; color: #e83e8c;">Cara Sewa Kebaya</h2>
                <p class="text-muted">Mudah dan Cepat Tampil Cantik bersama Airent</p>
            </div>
            <div class="row text-center">
                <div class="col-md-3 mb-4"><div class="p-4 rounded shadow-sm h-100" style="background-color: #fff0f5;"><i class="fas fa-search fa-3x mb-3" style="color: #e83e8c;"></i><h5 class="fw-bold">1. Pilih Kebaya</h5><p class="small text-muted">Cari model kebaya favoritmu di katalog.</p></div></div>
                <div class="col-md-3 mb-4"><div class="p-4 rounded shadow-sm h-100" style="background-color: #fff0f5;"><i class="fas fa-file-alt fa-3x mb-3" style="color: #e83e8c;"></i><h5 class="fw-bold">2. Isi Formulir</h5><p class="small text-muted">Klik Sewa dan isi data diri lengkap.</p></div></div>
                <div class="col-md-3 mb-4"><div class="p-4 rounded shadow-sm h-100" style="background-color: #fff0f5;"><i class="fas fa-money-bill-wave fa-3x mb-3" style="color: #e83e8c;"></i><h5 class="fw-bold">3. Konfirmasi</h5><p class="small text-muted">Admin akan menghubungi untuk pembayaran.</p></div></div>
                <div class="col-md-3 mb-4"><div class="p-4 rounded shadow-sm h-100" style="background-color: #fff0f5;"><i class="fas fa-shopping-bag fa-3x mb-3" style="color: #e83e8c;"></i><h5 class="fw-bold">4. Ambil Kebaya</h5><p class="small text-muted">Kebaya siap diambil sesuai tanggal.</p></div></div>
            </div>
        </div>
    </section>

    <footer class="text-center py-4 bg-white mt-5">
        <p class="mb-0 text-muted">&copy; 2025 Airent Kebaya Rental. Created for UAS.</p>
    </footer>

    <div class="modal fade" id="modalGambar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background-color: transparent; border: none;">
                <div class="text-end mb-2"><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body p-0 text-center">
                    <img src="" id="gambarJumbo" class="img-fluid rounded shadow-lg">
                    <h4 id="captionGambar" class="text-white mt-3 text-shadow" style="text-shadow: 2px 2px 4px #000;"></h4>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalSewa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Formulir Sewa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="proses_sewa.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id_kebaya" id="id_kebaya_form">
                        
                        <div class="mb-3">
                            <label class="fw-bold">Kebaya yang dipilih:</label>
                            <input type="text" class="form-control" id="nama_kebaya_form" readonly style="background-color: #fce4ec;">
                        </div>
                        <div class="mb-3">
                            <label>Nama Penyewa</label>
                            <input type="text" name="nama_penyewa" class="form-control" required placeholder="Masukkan nama kamu">
                        </div>
                        <div class="mb-3">
                            <label>Nomor HP / WA</label>
                            <input type="number" name="no_hp" class="form-control" required placeholder="Contoh: 0812...">
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Rencana Pakai</label>
                            <input type="date" name="tgl_sewa" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control" rows="2" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Kirim Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function bukaGambar(urlGambar, namaKebaya) {
            document.getElementById('gambarJumbo').src = urlGambar;
            document.getElementById('captionGambar').innerText = namaKebaya;
            var myModal = new bootstrap.Modal(document.getElementById('modalGambar'));
            myModal.show();
        }

        // Fungsi Baru untuk Buka Form Sewa
        function isiFormSewa(id, nama) {
            document.getElementById('id_kebaya_form').value = id;
            document.getElementById('nama_kebaya_form').value = nama;
            var formModal = new bootstrap.Modal(document.getElementById('modalSewa'));
            formModal.show();
        }
    </script>
</body>
</html>