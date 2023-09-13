<?php
require_once 'functions.php';
$pdo = connect_mysql();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id_user'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : NULL;
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
        $level = isset($_POST['level']) ? $_POST['level'] : '';;
        
        // Update the record
        $stmt = $pdo->prepare('UPDATE user SET username = ?, nama = ?, pass = ?, level = ? WHERE id_user = ?');
        $stmt->execute([$username, $nama, $pass, $level, $_GET['id']]);
        $msg = 'Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM user WHERE id_user = ?');
    $stmt->execute([$_GET['id_user']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>



<?=template_header('Read')?>

<div class="content update">
	<h2>Update User <?=$contact['nama']?></h2>
    <form action="update.php?id_user=<?=$contact['id_user']?>" method="post">
        <label for="username">Username</label>
        <label for="nama">Nama</label>
        <input type="text" name="username" id="username">
        <input type="text" name="nama" id="nama">
        <label for="pass">Password</label>
        <input type="password" name="pass" id="pass">
        <label for="level">Level</label>
        <input list="akses" name="level" id="level">
        <datalist id="akses">
            <option value="Teacher">
            <option value="Student">
        </datalist>
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>