<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, lastname, salary, email FROM emp WHERE id='".$_SESSION["id"]."'";
$result = $conn->query($sql);
$value = $result->fetch_assoc();

$name = $value["firstname"];
$lname = $value["lastname"];
$salary = $value["salary"];
$email = $value["email"];

$msg = "PAYCHECK \n
PAY TO THE ORDER OF ".$name." ".$lname." $".$salary.".\n
Payroll project";

mail($email,"Paycheck", $msg, "From: payroll@patroll.com");

$conn->close();

header("Location: employee.php");

?>