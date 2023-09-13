<?php
// Menghubungkan ke database
include "koneksi.php";
// ID pengguna yang terlogin (contoh)
$id_terlogin = 1; // Gantilah dengan ID yang sesuai

// Mengeksekusi kueri SQL untuk mengambil nama
$sql = "SELECT nama FROM user WHERE id_user = $id_terlogin";
$hasil = $koneksi->query($sql);

// Memeriksa apakah kueri berhasil
if ($hasil->num_rows > 0) {
    // Mengambil hasil query
    $baris = $hasil->fetch_assoc();
    $nama_pengguna = $baris["Nama"];

    // Menampilkan nama pengguna
    echo "Nama pengguna: " . $nama_pengguna;
} else {
    echo "Pengguna tidak ditemukan.";
}

// Menutup koneksi ke database
$koneksi->close();
?>
