<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0; url=Employee.php" />
</head>
<body>
 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['tick'])){
	$value = $_POST['tick'];

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	foreach($value as $id){
		$sql = "DELETE FROM emp WHERE id='".$id."'";
		$conn->query($sql);
		changelog($id);
	}
}

function changelog($id){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "changelog";
	$type = "Removed";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO `changes` (`id`, `type`) VALUES ('$id', '$type')";
	$conn->query($sql);
	$conn->close();
}

$conn->close();
?>
</body>
</html>