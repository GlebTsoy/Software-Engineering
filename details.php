<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h2>Employee detailed information</h2>
<?php
	require "databaseConnection.php";
	$id = intval($_GET['q']);
	
	$row = selectById($id);
	
	echo "<form action='print.php' method='post'>
	<table id='detailed'>
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
	</table>
	<input type='submit' value='Document to print'>
	</form>";
	$_SESSION["id"] = $row["id"];
	
?>
<button onclick="window.location.href='changepage.php'">Change</button>
<button onclick="window.location.href='mail.php'">Send Paycheck</button>
</body>
</html>