<?php
session_start();
require "databaseConnection.php";

$value = selectById($_SESSION["id"]);

$name = $value["firstname"];
$lname = $value["lastname"];
$salary = $value["salary"];
$email = $value["email"];

$msg = "PAYCHECK \n
PAY TO THE ORDER OF ".$name." ".$lname." $".$salary.".\n
Payroll project";

mail($email,"Paycheck", $msg, "From: payroll@payroll.com");

$conn->close();

header("Location: employee.php");
?>