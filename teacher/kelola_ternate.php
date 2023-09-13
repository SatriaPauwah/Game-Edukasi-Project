<?php
include('../koneksi.php');

// Initialize an empty array for errors
$errors = [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $wisataBencana = $_POST['wisata_bencana'];

    // Validate data: Ensure it is not empty
    if (empty($wisataBencana)) {
        $errors[] = "Wisata Bencana tidak boleh kosong.";
    } else {
        // Insert data into the database if data is valid
        $sql = "INSERT INTO bencana_tte (bencana) VALUES ('$wisataBencana')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to prevent duplicate submissions
            header("Location: kelola_ternate.php");
            exit; // Terminate the script after the redirect
        } else {
            // Handle database insertion error
            $errors[] = "Terjadi kesalahan. Data gagal ditambahkan.";
        }
    }
}

// Get the list of wisata bencana from the database
    $sql = "SELECT * FROM bencana_tte";
    $result = mysqli_query($conn, $sql);

    // Initialize an array for wisata bencana
    $bencana = [];

    if ($result) {
        // Populate the array with data from the database
        while ($row = mysqli_fetch_assoc($result)) {
            $bencana[] = $row['bencana'];
        }
    }

    // Close the database connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="bootstrap,fontawesome/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/kabkota.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <?php include('header.php'); ?>
    <title>Document</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <?php include('navbar.php'); ?>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <?php include('logo.php'); ?>

            <!-- Sidebar -->
            <?php include('sidebar.php'); ?>
            <!-- /.sidebar -->
        </aside>
        <div class="wisata-bencana">
            <h4>Kelola</h4>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Wisata Bencana</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="kelola_ternate.php">
                            <div class="modal-body">
                                <input class="form-control" type="text" placeholder="Tambah Wisata" aria-label="Tambah Wisata" name="wisata_bencana" id="wisata_bencana">
                                <?php if (!empty($errors)) : ?>
                                    <div class="alert alert-danger mt-2">
                                        <?php foreach ($errors as $error) : ?>
                                            <p><?php echo $error; ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="list">
                <div class="list1">
                    <h5 class="wb">Wisata Bencana</h5>
                    <h5 class="m">Manage</h5>
                </div>
                <?php foreach ($bencana as $wisata) : ?>
                    <div class="list1">
                        <h5 class="bencana"><?php echo $wisata; ?></h5>
                        <a href="literasi_tte.php" class="literasi">
                            <p>Literasi</p>
                        </a>

                        <a href="rps_tte.php" class="rps">
                            <p>RPS</p>
                        </a>

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
                                        <input class="form-control" type="text" placeholder="Edit Wisata" aria-label="Edit Wisata">
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
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>