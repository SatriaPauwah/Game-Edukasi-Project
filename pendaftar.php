<?php
// Pastikan Anda sudah memiliki koneksi ke database
include "koneksi.php";

// Periksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data dari formulir
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $fullName = $firstName . ' ' . $lastName;
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Hash password (disarankan menggunakan hashing yang aman seperti bcrypt)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data ke database
    $sql = "INSERT INTO waiting_list (nama_depan, nama_belakang, nama_lengkap, username, password, level) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssss", $firstName, $lastName, $fullName, $username, $hashedPassword, $role);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error";
        }

        $stmt->close();
    } else {
        echo "error: " . $conn->error;
    }

    $conn->close();
}
