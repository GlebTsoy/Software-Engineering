<?php
session_start();
if ($_SESSION["valid"] == "Denied"){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php require "databaseConnection.php";
		$row =  getSalaries("hourly");

		?>

	</body>
</html>
