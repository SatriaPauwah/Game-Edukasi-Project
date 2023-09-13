<?php
include('../koneksi.php');

$sql = "SELECT * FROM rps_tte";
$result = mysqli_query($conn, $sql);
$rps = [];

// Handle form submission to add new RPS
if (isset($_POST['tambah_rps'])) {
    $nama_rps = $_POST['nama_rps'];
    $link_rps = $_POST['link_rps'];
    $deskripsi_rps = $_POST['deskripsi_rps'];

    // Validasi data jika diperlukan

    // Insert data into the database
    $sql = "INSERT INTO rps_tte (nama_rps, link_rps, deskripsi) VALUES ('$nama_rps', '$link_rps', '$deskripsi_rps')";
    if (mysqli_query($conn, $sql)) {
        // Redirect to prevent duplicate submissions or display a success message
        header("Location: rps_tte.php");
        exit; // Terminate the script after the redirect
    } else {
        // Handle database insertion error
        echo "Terjadi kesalahan. Data gagal ditambahkan.";
    }
}

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $rps[] = $row;
    }
} else {
    // Handle jika tidak ada data yang ditemukan
    echo "Tidak ada data wisata bencana yang ditemukan.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="bootstrap,fontawesome/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/rps.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <?php include('header.php'); ?>
    <title>Document</title>
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
    <div class="wisata-bencana">
        <h4>Kelola Wisata Bencana</h4>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah
        </button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Wisata Bencana</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="rps_tte.php">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama_rps" placeholder="Masukkan Nama">
                            </div>
                            <div class="form-group">
                                <label for="link">Link:</label>
                                <input type="text" class="form-control" id="link" name="link_rps" placeholder="Masukkan Link">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi_rps" rows="3" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary" name="tambah_rps">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        </a>
        <div class="list">
            <div class="list1">
                <h5 class="rps">RPS</h5>
                <h5 class="m">Manage</h5>
            </div>
            <!-- list -->
            <div class="list">
                <?php foreach ($rps as $item) : ?>
                    <div class="list1">
                        <h5 class="wb"><?php echo $item['nama_rps']; ?></h5>
                        <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">
                            <p>Edit</p>
                        </a>

                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Wisata Bencana</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="form-group">
                                                <label for="nama">Nama:</label>
                                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" value="<?php echo $item['nama_rps']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="link">Link:</label>
                                                <input type="text" class="form-control" id="link" placeholder="Masukkan Link" value="<?php echo $item['link_rps']; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi:</label>
                                                <textarea class="form-control" id="deskripsi" rows="3" placeholder="Masukkan Deskripsi"><?php echo $item['deskripsi']; ?></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <!-- list -->


        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>