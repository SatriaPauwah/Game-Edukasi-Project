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
    <link rel="stylesheet" href="css/ternate2.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <title>Document</title>
    <?php include('header.php');?>
    <style>
        body {
            background-color: #E9EDC9;
        }
    </style>
</head>

<body>
    <?php include('navbar.php');?>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="color: #505050;;">Ternate</span>
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
        <a class="wisata" href="ternate3.php" id="wisataLink1">
            <p>Wisata</p>
        </a>

        <a class="option-b" href="#" id="wisataLink2">
            <p>Option b</p>
        </a>

        <a class="option-c" href="#" id="wisataLink3">
            <p>Option c</p>
        </a>

        <a class="option-d" href="#" id="wisataLink4">
            <p>Option d</p>
        </a>

        <a class="option-e" href="#" id="wisataLink5">
            <p>Option e</p>
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
        <a href="javascript:void(0);" id="tombolLanjut">
            <i class='fa fa-check' style="text-decoration: none; color: #505050; position: absolute; margin-left: 86%; margin-top: 5%;"></i>
        </a>
    </div>
    <script>
        const wisataButton1 = document.getElementById('wisataLink1');
        const wisataButton2 = document.getElementById('wisataLink2');
        const wisataButton3 = document.getElementById('wisataLink3');
        const wisataButton4 = document.getElementById('wisataLink4');
        const wisataButton5 = document.getElementById('wisataLink5');
        const lanjutButton = document.getElementById('tombolLanjut');

        wisataButton1.style.pointerEvents = 'none';
        wisataButton2.style.pointerEvents = 'none';
        wisataButton3.style.pointerEvents = 'none';
        wisataButton4.style.pointerEvents = 'none';
        wisataButton5.style.pointerEvents = 'none';

        lanjutButton.addEventListener('click', function() {
            // Ketika tombol centang diklik, atur link-link kabkota dapat di klik
            wisataButton1.style.pointerEvents = 'auto';
            wisataButton2.style.pointerEvents = 'auto';
            wisataButton3.style.pointerEvents = 'auto';
            wisataButton4.style.pointerEvents = 'auto';
            wisataButton5.style.pointerEvents = 'auto';
        });
    </script>
    <?php include('footer.php');?>
</body>

</html>