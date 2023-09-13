<?php
require_once '../koneksi.php';
include 'functions.php';
$pdo = connect_mysql();

// Get the page via GET request (URL param: page), if non-exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our waiting_list table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM waiting_list ORDER BY id_pendaftar LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records so we can display them in our template.
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Count the total number of records in the waiting_list table
$num_contacts = $pdo->query('SELECT COUNT(*) FROM waiting_list')->fetchColumn();
?>

<?= template_header('Home') ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['approve'])) {
        // Ambil ID pendaftar yang disetujui
        $idPendaftar = $_POST['id_pendaftar'];

        // Query untuk mengambil data pendaftar yang akan dipindahkan
        $query = "SELECT nama_lengkap, username, password, level FROM waiting_list WHERE id_pendaftar = :id_pendaftar";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_pendaftar', $idPendaftar, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            // Simpan data pendaftar ke tabel "user"
            $nama = $row['nama_lengkap'];
            $username = $row['username'];
            $password = $row['password'];
            $role = $row['level'];
            $insertQuery = "INSERT INTO user (nama, username, pass, level) VALUES (:nama, :username, :password, :role)";
            $stmt = $pdo->prepare($insertQuery);
            $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $stmt->execute();

            // Hapus data pendaftar dari tabel "waiting_list"
            $deleteQuery = "DELETE FROM waiting_list WHERE id_pendaftar = :id_pendaftar";
            $stmt = $pdo->prepare($deleteQuery);
            $stmt->bindParam(':id_pendaftar', $idPendaftar, PDO::PARAM_INT);
            $stmt->execute();
        }
        
    } elseif (isset($_POST['delete'])) {
        // Ambil ID pendaftar yang akan dihapus
        $idPendaftar = $_POST['id_pendaftar'];

        // Hapus data pendaftar dari tabel "waiting_list"
        $deleteQuery = "DELETE FROM waiting_list WHERE id_pendaftar = :id_pendaftar";
        $stmt = $pdo->prepare($deleteQuery);
        $stmt->bindParam(':id_pendaftar', $idPendaftar, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>

<div class="content read">
    <h2>Daftar Tunggu Pendaftar</h2>
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Username</td>
                <td>Nama</td>
                <td>Level</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= $contact['id_pendaftar'] ?></td>
                <td><?= $contact['nama_lengkap'] ?></td>
                <td><?= $contact['username'] ?></td>
                <td><?= $contact['level'] ?></td>
                <td class="actions">
                    <form method="post">
                        <input type="hidden" name="id_pendaftar" value="<?= $contact['id_pendaftar'] ?>">
                        <button type="submit" name="approve" class="approve-button">Approve</button>
                        <button type="submit" name="delete" class="delete-button">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
        <a href="read.php?page=<?= $page-1 ?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page*$records_per_page < $num_contacts): ?>
        <a href="read.php?page=<?= $page+1 ?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>

<?= template_footer() ?>
