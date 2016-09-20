<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
#detailed, tr, td{border: 1px solid black;
	border-collapse: collapse;
}
#detailed{width: 50%;
	position: relative;
	left: 25%;
	top:10%;
}
tr, td{padding: 10px;}
</style>
<script>
	window.print();
</script>
</head>
<body>
<div>
<?php
	
	require "databaseConnection.php";
	
	$id = $_SESSION["id"];
	
	$row = selectById($id);

	echo "<table id='detailed'>
	<tr><td>ID</td><td name='details_id'>" . $row["id"] ."</td></tr>
	<tr><td>First Name</td><td>" . $row["firstname"] ."</td></tr>
	<tr><td>Last Name</td><td>" . $row["lastname"] ."</td></tr>
	<tr><td>DOB</td><td>" . $row["DOB"] ."</td></tr>
	<tr><td>Job</td><td>" . $row["Job"] ."</td></tr>
	<tr><td>Salary</td><td>" . $row["Salary"] ."$</td></tr>
	<tr><td>Gender</td><td>" . $row["gender"] ."</td></tr>
	<tr><td>Contact Number</td><td>" . $row["contactNum"] ."</td></tr>
	<tr><td>Email</td><td>" . $row["email"] ."</td></tr>
	<tr><td>Date Hired</td><td>" . $row["dateHired"] ."</td></tr>
	<tr><td>Date Terminated</td><td>" . $row["dateTerminated"] ."</td></tr>
	</table>"

?>
</div>
</body>
</html>