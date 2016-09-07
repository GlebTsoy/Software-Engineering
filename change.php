<?php

session_start();

?>
<!DOCTYPE html>
  <head>
  <meta http-equiv="refresh" content="0; url=Employee.php" />
  </head>
  <body>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";




// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_SESSION["id"];
$firstname = $_POST["FirstName"];
$lastname = $_POST["LastName"];
$DOB = $_POST["DOB"];
$Job = $_POST["Job"];
$Salary = $_POST["Salary"];
$gender = $_POST["gender"];
$contactNum = $_POST["contactNum"];
$email = $_POST["email"];
$dateHired = $_POST["dateHired"];
$dateTerminated = $_POST["dateTerminated"];

if($firstname!=""){
	$sql = "UPDATE emp SET firstname = '$firstname' WHERE id=$id";
	$conn->query($sql);
}
if($lastname!=""){
	$sql = "UPDATE emp SET lastname = '$lastname' WHERE id=$id";
	$conn->query($sql);
}
if($DOB!=""){
	$sql = "UPDATE emp SET DOB = '$DOB' WHERE id=$id";
	$conn->query($sql);
}
if($Job!=""){
	$sql = "UPDATE emp SET Job = '$Job' WHERE id=$id";
	$conn->query($sql);
}
if($Salary!=""){
	$sql = "UPDATE emp SET Salary = '$Salary' WHERE id=$id";
	$conn->query($sql);
}
if($gender!=""){
	$sql = "UPDATE emp SET gender = '$gender' WHERE id=$id";
	$conn->query($sql);
}
if($contactNum!=""){
	$sql = "UPDATE emp SET contactNum = '$contactNum' WHERE id=$id";
	$conn->query($sql);
}
if($email!=""){
	$sql = "UPDATE emp SET email = '$email' WHERE id=$id";
	$conn->query($sql);
}
if($dateHired!=""){
	$sql = "UPDATE emp SET dateHired = '$dateHired' WHERE id=$id";
	$conn->query($sql);
}
if($dateTerminated!=""){
	$sql = "UPDATE emp SET dateTerminated = '$dateTerminated' WHERE id=$id";
	$conn->query($sql);
}





$conn->close();
?>
				</body>
				
			</html>