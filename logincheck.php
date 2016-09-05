<!DOCTYPE HTML>
<html>  
<body>
<div>
<?php

$user = strval($_POST["name"]);
$pass = strval($_POST["password"]);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$conn = new mysqli ($servername, $username, $password, $dbname);

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, password FROM login";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
	if($row["username"]==$user){
		if($row["password"]==$pass){
			header("Location: employee.php");
		}
	}
	else {
		echo "<h1>Wrong username or password<h1>";
	}
}
$conn->close();
?>
</div>
</body>
</html>