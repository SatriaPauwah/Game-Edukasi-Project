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
    <link rel="stylesheet" href="css/ternate1.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <?php include('header.php');?>
    <title>Document</title>
    <style>
        body{
            background-color: #E9EDC9;
        }
    </style>
    <script>
        // Kode JavaScript Anda
        var tanggalSekarang = new Date();
        var tanggal = tanggalSekarang.getDate();
        var bulan = tanggalSekarang.getMonth() + 1;
        var tahun = tanggalSekarang.getFullYear();
        var tanggalFormat = tanggal + '/' + bulan + '/' + tahun;
    </script>
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


    <div class="ternate">
        <div class="card1">
            <p>Silahkan Mengisi Terlebih dahulu</p>
        </div>
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

    <div class="presensi">
        <p style="position: absolute; font-weight: 600; font-size: 18px; margin-left: 40%;">PRESENSI</p>
        <hr style="width: 80%; color: black; margin-left: 10%; margin-top: 10%;">
        <p class="get-name-student"><?php echo $_SESSION['nama']; ?></p> 
        <div style="position: absolute; margin-left: 82%; margin-top: 9%; " class="form-check form-check-reverse">
            <input class="form-check-input" type="checkbox" id="reverseCheck1">
            <label class="form-check-label" for="reverseCheck1"></label>
        </div>
        <p class="presensi-by-kalender">Tanggal : <span id="tanggalOutput"></span></p>
        <div style="position: absolute; margin-left: 82%;" class="form-check form-check-reverse">
            <input class="form-check-input" type="checkbox" id="reverseCheck2">
            <label class="form-check-label" for="reverseCheck2"></label>
        </div>
        <hr style="width: 80%; color: black; margin-left: 10%; margin-top: 25%;">
    </div>
    <div class="lanjutkan">
        <p class="l">Lanjutkan</p>   
        <a href="ternate2.php" id="lanjutkanButton">
            <i class='fa fa-check' style="text-decoration: none; color: #505050; position: absolute; margin-left: 86%; margin-top: 5%;"></i><i class='fa fa-check' style="text-decoration: none; color: #505050; position: absolute; margin-left: 86%; margin-top: 5%;"></i>
        </a>
    </div>
    <script>
        // Menampilkan tanggal dalam elemen HTML dengan ID "tanggalOutput"
        document.getElementById('tanggalOutput').textContent = tanggalFormat;
    </script>
    <?php include('footer.php');?>
</body>
    <script>
        // Mengecek apakah kedua kotak centang tercentang
        function checkIfBothChecked() {
            var checkbox1 = document.getElementById("reverseCheck1");
            var checkbox2 = document.getElementById("reverseCheck2");
            var lanjutkanButton = document.getElementById("lanjutkanButton");
            lanjutkanButton.style.pointerEvents = 'none';

            // Jika kedua kotak centang tercentang, aktifkan tombol Lanjutkan
            if (checkbox1.checked && checkbox2.checked) {
                lanjutkanButton.style.pointerEvents = 'auto';
            } else {
                lanjutkanButton.style.pointerEvents = 'none';
            }
        }

        // Menambahkan event listener ke kedua kotak centang
        var checkbox1 = document.getElementById("reverseCheck1");
        var checkbox2 = document.getElementById("reverseCheck2");
        checkbox1.addEventListener("change", checkIfBothChecked);
        checkbox2.addEventListener("change", checkIfBothChecked);

        // Panggil fungsi ini saat halaman dimuat untuk menginisialisasi status tombol Lanjutkan
        checkIfBothChecked();
    </script>



</html>