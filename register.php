<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0  maximum-scale=1, user-scalable=no">
    <script type="text/javascript" src="bootstrap,fontawesome/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="bootstrap,fontawesome/css/bootstrap.min.css" />
    <link rel="stylesheet" href="bootstrap,fontawesome/fontawesome-free-6.4.2-web/css/all.css">
    <title>Document</title>
</head>
<?php
// Sisipkan file koneksi database
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $fullName = $_POST[$firstName . ' ' . $lastName];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash kata sandi
    $role = $_POST["level"];

    // Siapkan pernyataan SQL untuk menyimpan data
    $sql = "INSERT INTO waiting_list (nama_depan, nama_belakang, nama_lengkap, username, password, level) VALUES (?, ?, ?, ?, ?, ?)";

    // Siapkan pernyataan menggunakan prepared statement
    $stmt = $conn->prepare($sql);

    // Bind parameter ke pernyataan
    $stmt->bind_param("ssssss", $firstName, $lastName, $fullName, $username, $password, $role);

    // Eksekusi pernyataan
    if ($stmt->execute()) {
        // Data berhasil disimpan
        echo "Pendaftaran berhasil!";
    } else {
        // Terjadi kesalahan saat menyimpan data
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    // Tutup pernyataan dan koneksi
    $stmt->close();
    $conn->close();
}
?>

<body>
    <div class="regist">
        <p class="p1">Game Edukasi</p>
        <p class="p2">Berbasis Mitigasi</p>
        
            <div class="register">
                <h1 class="h11">Register</h1>
                <a href="index.html" class="login" style="text-decoration: none;">sign in</a>
                <input id="firstName" class="form-control" style="width: 32%; height: 45px; background-color: #FFD9B7; margin-top: 140px; position: absolute;"
                    type="text" placeholder="First Name" aria-label="default input example">
                <input id="lastName" class="form-control" style="width: 32%; height: 45px; background-color: #FFD9B7; position: absolute; margin-top: 140px; margin-left: 50%;"
                    type="text" placeholder="Last Name" aria-label="default input example">
                <input id="username" class="form-control" style="width: 70%; height: 45px; background-color: #FFD9B7; margin-top: 205px;"
                    type="text" placeholder="Username" aria-label="default input example">
                <input id="password" class="form-control" style="width: 70%; height: 45px; background-color: #FFD9B7; margin-top: 20px;"
                    type="password" placeholder="New Password" aria-label="default input example">
                <input id="confirmPassword" class="form-control" style="width: 70%; height: 45px; background-color: #FFD9B7; margin-top: 20px;"
                    type="password" placeholder="Confirm Password" aria-label="default input example">
                <select id="role" class="form-control" style="width: 70%; height: 45px; background-color: #FFD9B7; margin-top: 20px;">
                    <option value="student">Student</option>
                </select>
                <button id="registerButton" style="margin-top: 20px; margin-left: 30%; font-size: 20px; width: 40%;" type="submit" class="btn btn-outline-primary">
                    Register
                </button>
            </div>
    </div>

    <script>
        document.getElementById("registerButton").addEventListener("click", function () {
            // Mendapatkan nilai dari input
            var firstName = document.getElementById("firstName").value;
            var lastName = document.getElementById("lastName").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;
            var role = document.getElementById("role").value;

            // Validasi data (contoh: pastikan semua field diisi)
            if (!firstName || !lastName || !username || !password || !confirmPassword) {
                alert("Harap isi semua field!");
                return;
            }

            // Validasi konfirmasi password
            if (password !== confirmPassword) {
                alert("Konfirmasi password tidak sesuai!");
                return;
            }

            // Buat objek FormData untuk mengirim data ke server
            var formData = new FormData();
            formData.append("firstName", firstName);
            formData.append("lastName", lastName);
            formData.append("username", username);
            formData.append("password", password);
            formData.append("role", role);

            // Kirim data ke server menggunakan fetch API
            fetch("pendaftar.php", {
                method: "POST",
                body: formData,
            })
            .then(function (response) {
                return response.text();
            })
            .then(function (data) {
                console.log(data);
                if (data === "success") {
                    alert("Registrasi berhasil!");
                    // Redirect atau lakukan tindakan lain setelah registrasi berhasil
                } else {
                    alert("Registrasi gagal!");
                }
            })
            .catch(function (error) {
                console.error(error);
                alert("Terjadi kesalahan saat mengirim data.");
            });
        });
    </script>
    
</body>
</html>

