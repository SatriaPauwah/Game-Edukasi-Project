<?php
require_once 'functions.php';
$pdo = connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id_user = isset($_POST['id_user']) ? $_POST['id_user'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
    $level = isset($_POST['level']) ? $_POST['level'] : '';

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO user (username, nama, pass, level) VALUES (?, ?, ?, ?)');
    $stmt->execute([$username, $nama, $pass, $level]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post">
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
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?=template_footer()?>