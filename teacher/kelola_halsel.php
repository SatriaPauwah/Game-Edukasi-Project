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
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Wisata Bencana</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input class="form-control" type="text" placeholder="Tambah Wisata"
                                aria-label="Disabled input example">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="list">
                <div class="list1">
                    <h5 class="wb">Wisata Bencana</h5>
                    <h5 class="m">Manage</h5>
                </div>

                <div class="list1">
                    <h5 class="wb">1990-1992</h5>
                    <a href="literasi.php" class="literasi">
                        <p>Literasi</p>
                    </a>

                    <a href="rps.php" class="rps">
                        <p>RPS</p>
                    </a>

                    <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <p>Edit</p>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">  </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input class="form-control" type="text" placeholder="edit wisata"
                                            aria-label="Disabled input example">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            

            </div>
        </div>
        <?php include('footer.php'); ?>
    </div>
</body>

</html>