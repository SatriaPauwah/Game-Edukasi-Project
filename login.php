<?php
session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query the database dengan menggunakan prepared statement untuk mencegah SQL Injection
    $query = "SELECT * FROM user WHERE username=? AND pass=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $response = array("success" => true, "level" => $row["level"]);

        // Set session data untuk pengguna yang berhasil login
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nama'] = $row['nama'];
    } else {
        $response = array("success" => false);
    }

    // Tutup prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();

    // Send the response back as JSON
    header("Content-Type: application/json");
    echo json_encode($response);
}
