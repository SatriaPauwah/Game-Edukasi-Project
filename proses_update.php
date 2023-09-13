<?php
include('koneksi.php');

// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah pengguna telah login
if (!isset($_SESSION['id_user'])) {
    echo "Unauthorized access"; // Atau lakukan tindakan lain sesuai kebijakan Anda
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['inputUsername'];
    $newNama = $_POST['inputNama'];
    $userId = $_SESSION['id_user'];

    // Lakukan validasi data di sini jika diperlukan

    // Update data pengguna di database
    $query = "UPDATE user SET username = ?, nama = ? WHERE id_user = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssi', $newUsername, $newNama, $userId);

    if ($stmt->execute()) {
        echo "success"; // Berhasil menyimpan data
    } else {
        echo "Error: " . $stmt->error; // Gagal menyimpan data
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request";
}
?>
