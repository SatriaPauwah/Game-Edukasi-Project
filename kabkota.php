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
    <link rel="stylesheet" href="css/kabkota.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <?php include('header.php'); ?>
    <title>Document</title>
    <style>
        body {
            background-color: #E9EDC9;
        }
    </style>
</head>

<body>
    <?php include('navbar.php'); ?>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="color: #505050;;">Kab/Kota</span>
        </div>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <?php include('logo.php'); ?>

        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>
        <!-- /.sidebar -->
    </aside>

    <div class="kabkota">
        <a class="ternate" id="ternateLink" href="ternate1.php">
            <p>Ternate</p>
        </a>

        <a class="tidore" id="tidoreLink" href="#">
            <p>Tidore</p>
        </a>

        <a class="halmahera-barat" id="halmaheraBaratLink" href="#">
            <p>Halmahera Barat</p>
        </a>

        <a class="halmahera-selatan" id="halmaheraSelatanLink" href="#">
            <p>Halmahera Selatan</p>
        </a>

        <a class="halmahera-utara" id="halmaheraUtaraLink" href="#">
            <p>Halmahera Utara</p>
        </a>

        <a class="taliabu" id="taliabuLink" href="#">
            <p>Taliabu</p>
        </a>
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
    <div class="lanjutkan">
        <p class="l">Lanjutkan</p>
        <p class="w">*wajib di klik</p>
        <a href="#">
            <i class='fa-solid fa-x' style="text-decoration: none; color: #505050; position: absolute; margin-left: 70%; margin-top: 5%;"></i>
        </a>

        <a href="javascript:void(0);" id="centangButton">
            <i class='fa fa-check ' style="text-decoration: none; color: #505050; position: absolute; margin-left: 86%; margin-top: 5%;"></i>
        </a>
    </div>
    <?php include('footer.php'); ?>
</body>
<script>
    // Ambil elemen tombol centang dan link-link kabkota
    const centangButton = document.getElementById('centangButton');
    const ternateLink = document.getElementById('ternateLink');
    const tidoreLink = document.getElementById('tidoreLink');
    const halmaheraBaratLink = document.getElementById('halmaheraBaratLink');
    const halmaheraSelatanLink = document.getElementById('halmaheraSelatanLink');
    const halmaheraUtaraLink = document.getElementById('halmaheraUtaraLink');
    const taliabuLink = document.getElementById('taliabuLink');

    // Atur status awal link-link kabkota tidak dapat di klik
    ternateLink.style.pointerEvents = 'none';
    tidoreLink.style.pointerEvents = 'none';
    halmaheraBaratLink.style.pointerEvents = 'none';
    halmaheraSelatanLink.style.pointerEvents = 'none';
    halmaheraUtaraLink.style.pointerEvents = 'none';
    taliabuLink.style.pointerEvents = 'none';

    // Tambahkan event listener pada tombol centang
    centangButton.addEventListener('click', function() {
        // Ketika tombol centang diklik, atur link-link kabkota dapat di klik
        ternateLink.style.pointerEvents = 'auto';
        tidoreLink.style.pointerEvents = 'auto';
        halmaheraBaratLink.style.pointerEvents = 'auto';
        halmaheraSelatanLink.style.pointerEvents = 'auto';
        halmaheraUtaraLink.style.pointerEvents = 'auto';
        taliabuLink.style.pointerEvents = 'auto';
    });
</script>


</html>