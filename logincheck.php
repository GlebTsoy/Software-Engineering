<?php 

session_start();

?>
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
	if($row["username"]==$user && $row["password"]==$pass){
			$_SESSION["valid"]=true;
			header("Location: employee.php");
			break;
	}
}
echo "<h1>Wrong username or password</h1><br> <a href='index.php'> Return back </a>   ";
$conn->close();
?>
</div>
</body>
</html>