<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
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


<head>
    <title>Profil Pengguna</title>
    <link rel="stylesheet" type="text/css" href="profile.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('navbar.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <?php include('logo.php'); ?>

            <!-- Sidebar -->
            <?php include('sidebar.php'); ?>
            <!-- /.sidebar -->
        </aside>
        <!-- /.content-wrapper -->
        <?php include('footer.php'); ?>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <input type="file" id="uploadImage" style="display: none;" accept="image/jpeg, image/png">
                        <button class="btn btn-primary" type="button" id="uploadButton">Upload new image</button>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form>
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="<?php echo $_SESSION['username']; ?>">
                            </div>
                            <!-- Form Row-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nama Lengkap</label>
                                <input class="form-control" id="inputUsername" type="text" placeholder="Enter your Nama Lengkap" value="<?php echo $_SESSION['nama']; ?>">
                            </div>
                            <!-- Save changes button-->
                            <button class="btn btn-primary" type="button">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ... (kode sebelumnya) ... -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#uploadButton').click(function() {
                $('#uploadImage').click();
            });

            $('#uploadImage').change(function() {
                var fileInput = this;
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('.img-account-profile').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(fileInput.files[0]);
                }
            });

            $('form').submit(function(e) {
                e.preventDefault();

                var newUsername = $('#inputUsername').val();
                var newNama = $('#inputNama').val();

                $.ajax({
                    type: 'POST',
                    url: 'proses_update.php',
                    data: {
                        inputUsername: newUsername,
                        inputNama: newNama
                    },
                    success: function(response) {
                        if (response === 'success') {
                            alert('Profile updated successfully!');
                            // Anda juga bisa memperbarui nilai username dan nama yang ditampilkan di halaman
                        } else {
                            alert('Error updating profile: ' + response);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error updating profile: ' + error);
                    }
                });
            });
        });
    </script>

    <script src="profile_update.js"></script>
</body>

</html>