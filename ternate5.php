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
    <link rel="stylesheet" href="css/ternate5.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
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
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="color: #505050;;">Ternate</span>
        </div>
    </nav>

    <div class="card1">
        <div class="card2">
            <hr>
            <h5 style="position: absolute;">Materi</h5>
            <hr style="margin-top: 8%;">
            <p style="margin-left: 16%; position: absolute;">Tanggal : <span id="tanggalOutput"></span><p style="margin-left: 45%;">Pembahasan Sejarah</p></p>
            <hr style="position: absolute; margin-top: -2%; width: 85%;">
            <h6>RPS Sejarah</h6>
            <p style="font-size: 12px; position: absolute;">
                silahkan ditonton materi yang telah tersedia di link yang telah disediakan dibawah ini  
                <div>
                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                </div>
            </p>
            
            <a href="#">
                <div class="link-vidio">
                    link/vidio
                </div>
            </a>
            <h6>RPS Sejarah</h6>
            <p style="font-size: 12px; position: absolute;">
                silahkan ditonton materi yang telah tersedia di link yang telah disediakan dibawah ini 
                <div>
                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                </div>
            </p>
               
            <h6>RPS Sejarah</h6>
            <p style="font-size: 12px; position: absolute; ">
                silahkan ditonton materi yang telah tersedia di link yang telah disediakan dibawah ini 
                <div>
                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                </div>
            </p>
            
            <h6>RPS Sejarah</h6>
            <p style="font-size: 12px; position: absolute;">
                silahkan ditonton materi yang telah tersedia di link yang telah disediakan dibawah ini 
                <div>
                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                </div>
            </p>

            
            <h6>RPS Sejarah</h6>
            <p style="font-size: 12px; position: absolute;">
                silahkan ditonton materi yang telah tersedia di link yang telah disediakan dibawah ini 
                <div>
                    <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                </div>
            </p>

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

    <div class="absensi">
        <p class="student-absen"><?php echo $_SESSION['nama']; ?></p>
        <p class="berhasil-absen">Berhasil Absen</p>
        <a href="">
            <i class="bi bi-check-lg"></i>
        </a>
    </div>

    <div class="lanjutkan">
        <p class="l">Lanjutkan</p>
        <p class="w">*wajib di isi</p>
        <a href="ternate6.php">
            <i class='fa fa-check'
                style="text-decoration: none; color: #505050; position: absolute; margin-left: 86%; margin-top: 5%;"></i>
        </a>
    </div>
    <script>
        // Menampilkan tanggal dalam elemen HTML dengan ID "tanggalOutput"
        document.getElementById('tanggalOutput').textContent = tanggalFormat;
    </script>

</body>

</html>