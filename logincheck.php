<?php 

session_start();

?>
<!DOCTYPE HTML>
<html>  
<body>
<div>
<?php
require "databaseConnection.php";

$user = strval($_POST["name"]);
$pass = strval($_POST["password"]);

$_SESSION["valid"] = authorization($user, $pass);

if($_SESSION["valid"] == True){
	header("Location: employee.php");
}
else{
	echo "Wrong username or password!";
}

?>
</div>
</body>
</html>