<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Airent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fce4ec; /* Pink muda */
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .btn-pink {
            background-color: #e83e8c;
            color: white;
            width: 100%;
        }
        .btn-pink:hover {
            background-color: #c21768;
            color: white;
        }
    </style>
</head>
<body>
    <div class="card p-4" style="width: 350px;">
        <h3 class="text-center mb-4" style="color: #e83e8c;">Login Airent</h3>
        
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "<div class='alert alert-danger'>Login Gagal! Username/Password salah.</div>";
            } else if($_GET['pesan'] == "belum_login"){
                echo "<div class='alert alert-warning'>Silakan Login dulu.</div>";
            }
        }
        ?>

        <form action="cek_login.php" method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-pink">Masuk</button>
            <a href="index.php" class="d-block text-center mt-3 text-muted small">Kembali ke Web Utama</a>
        </form>
    </div>
</body>
</html>