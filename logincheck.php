<?php

session_start();

?>
<!DOCTYPE HTML>
<html>
<body style=" background-image:url(bg.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:cover">
<div>
<?php
require "databaseConnection.php";

$user = strval($_POST["name"]);
$pass = strval($_POST["password"]);

$result = authorization($user, $pass);

$_SESSION["valid"] = $result["token"];
$_SESSION["loginID"] = $result["id"];

switch ($_SESSION["valid"]){

	case "Admin":
    echo "<script>window.location.assign('employee.php')</script>";
		break;
	case "User":
		echo "<script>window.location.assign('timecard.php')</script>";
		break;
	default:
		echo " <div align='center'> <h1>Wrong username or password!</h1><p> <br><a href='index.php'>Return</a></div></p> ";
}

?>
</div>
</body>
</html>
