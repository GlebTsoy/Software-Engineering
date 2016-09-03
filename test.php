<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1>Success</h1>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "employee";

	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$q = intval($_GET['q']);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT id, firstname, lastname, DOB, Job, Salary FROM emp WHERE id='".$q."'";
	$result = $conn->query($sql);
	
	echo "<table><thead><tr><th>ID</th><th>First Name</th><th>Last name</th><th>DOB</th><th>Job</th><th>Salary</th></tr></thead><tbody>";
	
	while($row = $result->fetch_assoc()) {
		echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td>" . 
		$row["lastname"]. "</td><td>" . $row["DOB"]. "</td><td>" . 
		$row["Job"]."</td><td>" . $row["Salary"]."</td></tr>";
	}
	echo "</tbody></table>";
	
	$conn->close();
	
?>
</body>
</html>