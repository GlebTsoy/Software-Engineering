<!DOCTYPE html>
<html>
<head>
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
	}
}

else{
	header("Location: employee.php");
}

header("Location: employee.php");

$conn->close();
?>
</body>
</html>