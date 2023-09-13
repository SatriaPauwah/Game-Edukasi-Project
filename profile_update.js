// Menampilkan foto yang diunggah oleh pengguna
document.getElementById('foto').addEventListener('change', function () {
    const previewFoto = document.getElementById('previewFoto');
    const file = this.files[0];
    const reader = new FileReader();

    reader.onload = function () {
        previewFoto.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        previewFoto.src = '#';
    }
});

// Menyimpan perubahan profil ke server (simulasi)
document.getElementById('simpanButton').addEventListener('click', function () {
    const nama = document.getElementById('nama').value;
    const username = document.getElementById('username').value;
    // Anda dapat mengirim data ini ke server Anda untuk menyimpan perubahan profil
    // Di sini, hanya menampilkan data yang telah disimpan.
    alert('Profil disimpan:\nNama: ' + nama + '\nUsername: ' + username);
});

$(document).ready(function() {
    // Toggle sidebar saat tombol toggle diklik
    $(".sidebar-toggle").click(function() {
      $(".sidebar").toggleClass("show");
    });
  });