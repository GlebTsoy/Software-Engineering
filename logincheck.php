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

$result = authorization($user, $pass);

$_SESSION["valid"] = $result["token"];
$_SESSION["loginID"] = $result["id"];

switch ($_SESSION["valid"]){
	
	case "Admin":
		header("Location: employee.php");
		break;
	case "User":
		header("Location: test.php");
		break;
	default:
		echo "Wrong username or password";
}


?>
</div>
</body>
</html>