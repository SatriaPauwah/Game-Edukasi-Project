<?php
function connect_mysql()
{
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'gamalama_sql';
	try {
		return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
	} catch (PDOException $exception) {
		// If there is an error with the connection, stop the script and display the error.
		exit('Failed to connect to database!');
	}
}
function template_header($title)
{
	echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Admin</h1>
            <a href="admin.php"><i class="fas fa-home"></i>Waiting List</a>
    		<a href="read.php"><i class="fas fa-address-book"></i>User</a>
			<a href="../index.html"><i class="fas fa-sign-out-alt"></i>Logout</a>
    	</div>
    </nav>
EOT;
}
function template_footer()
{
	echo <<<EOT
    </body>
</html>
EOT;
}
