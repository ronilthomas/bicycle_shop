<?php
session_start();
$_SESSION = array();
session_destroy();
$_SESSION['message'] = 'logged out';
echo $_SESSION['message']." ";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Click <a href="home.php">here</a> to login</p>
</body>
</html>