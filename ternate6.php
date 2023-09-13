<?php
include('koneksi.php');
// Mulai sesi
session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['id_user'])) {
    // Jika tidak, arahkan pengguna ke halaman login atau tindakan lain
    header("Location: login.php");
    exit(); // Hentikan eksekusi skrip ini
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <script type="text/javascript" src="bootstrap,fontawesome/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/ternate6.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <title>Document</title>
    <style>
        body{
            background-color: #E9EDC9;
        }
    </style>
    
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="color: #505050;;">Ternate</span>
        </div>
    </nav>

    <div class="card1">
        <p>Selamat Mengerjakan Kuis</p>
    </div>

    <div class="student-score">
        <div class="profil">
            <img src="img/profil.jpg" alt="profil">
        </div>
        <p class="name-student">
            <?php echo $_SESSION['nama']; ?>
        </p>
        <p class="score">
            Score :
        </p>
    </div>

    <div class="absensi">
        <p class="student-absen"><?php echo $_SESSION['nama']; ?></p>
        <p class="berhasil-absen">Berhasil Absen</p>
        <a href="">
            <i class="bi bi-check-lg"></i>
        </a>
    </div>

    <div class="lanjutkan">
        <p class="l">Lanjutkan</p>
        <p class="w">*wajib di klik</p>
        <a href="kabkota.php">
            <i class='fa fa-check'
                style="text-decoration: none; color: #505050; position: absolute; margin-left: 86%; margin-top: 5%;"></i>
        </a>
    </div>

</body>

</html>