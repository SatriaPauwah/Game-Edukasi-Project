<?php
include('../koneksi.php');

// Inisialisasi variabel deskripsi
$deskripsi = "";

// Query untuk mengambil deskripsi dari database
$sql = "SELECT deskripsi FROM literasi_tte";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mengambil data deskripsi dari hasil query
    $row = $result->fetch_assoc();
    $deskripsi = $row["deskripsi"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newDeskripsi = $_POST["deskripsi"];

    // Query untuk mengupdate deskripsi ke database
    $updateSql = "UPDATE literasi_tte SET deskripsi = '$newDeskripsi'";
    
    if ($conn->query($updateSql) === TRUE) {
        echo "Deskripsi berhasil diperbarui.";
        $deskripsi = $newDeskripsi; // Update deskripsi yang ditampilkan
    } else {
        echo "Error: " . $updateSql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="bootstrap,fontawesome/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/literasi.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <title>Document</title>
    <?php include('header.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php include('preloader.php'); ?>
    <?php include('navbar.php'); ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <?php include('logo.php'); ?>

        <!-- Sidebar -->
        <?php include('sidebar.php'); ?>
        <!-- /.sidebar -->
    </aside>
    <div class="literasi">
        <div class="list">
            <div class="list1">
                <h5>Literasi</h5>
            </div>
        </div>
        <p class="desk">
            Deskripsi
        </p>
        <div class="foto">
            <img src="#" alt="foto">
        </div>
        <button type="button" class="btn btn-secondary">Ganti foto</button>

        <form method="POST" action="">
            <div class="deskripsi">
                <textarea name="deskripsi" rows="4" cols="50"><?php echo $deskripsi; ?></textarea>
            </div>
            <button type="submit" class="btn btn-danger" style="margin-top: 10%; margin-left: 78%; margin-bottom: 15px;">
                Simpan
            </button>
        </form>

    </div>
    <?php include('footer.php'); ?>
</body>

</html>