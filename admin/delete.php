<?php
require_once 'functions.php';
$msg = '';
$pdo = connect_mysql();
// Check that the contact ID exists
if (isset($_GET['id_user'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM user WHERE id_user = ?');
    $stmt->execute([$_GET['id_user']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('User doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM user WHERE id_user = ?');
            $stmt->execute([$_GET['id_user']]);
            $msg = 'You have deleted the User!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>


<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete User #<?=$contact['id_user']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete User #<?=$contact['id_user']?>?</p>
    <div class="yesno">
        <a href="delete.php?id_user=<?=$contact['id_user']?>&confirm=yes">Yes</a>
        <a href="delete.php?id_user=<?=$contact['id_user']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>