<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2>Employee detailed information</h2>
<?php
	require "databaseConnection.php";
	$id = intval($_GET['q']);
	$row = selectById($id);
	table($row);
	$_SESSION["id"] = $row["id"];

?>
<button onclick="window.location.href='changepage.php'">Change</button>
</body>
</html>
