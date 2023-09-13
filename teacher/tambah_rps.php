<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="bootstrap,fontawesome/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/tambah_rps.css">
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
    <div class="literasi">
        <div class="list">
            <div class="list1">
                <h5>Tambah</h5>
            </div>
            <h5 class="tl">Nama</h5>
            <div class="link">
                <input type="text" placeholder="Nama">
            </div>
            <h5 class="tl">Link</h5>
            <div class="link">
                <input type="text" placeholder="Link">
            </div>
            <h5 class="tl">Deskrisi</h5>
            <div class="deskripsi">
                <textarea id="subject" name="subject" placeholder="Deskripsi"></textarea>  
            </div>
            <button type="button" class="btn btn-danger" style="margin-top: 10%; margin-left: 78%; margin-bottom: 15px;">
                Simpan
            </button>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>