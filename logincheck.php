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

$_SESSION["valid"] = authorization($user, $pass);

if($_SESSION["valid"] == "Admin"){
	header("Location: employee.php");
}
else{
	echo " <div align='center'> <h1>Wrong username or password!</h1><p> <br><a href='index.php'>Return</a></div></p> ";
}

?>
</div>
</body>
</html>