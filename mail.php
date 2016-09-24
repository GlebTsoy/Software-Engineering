<?php
session_start();
require_once "databaseConnection.php";
function sendMail($emp){

$name = selectById($emp["id"])["firstname"];
$lname = selectById($emp["id"])["lastname"];
$salary = $emp["salary"];
$email = selectById($emp["id"])["email"];

$msg = "PAYCHECK \n
PAY TO THE ORDER OF ".$name." ".$lname." $".$salary.".\n
Payroll project";

mail($email,"Paycheck", $msg, "From: payroll@payroll.com");

}
?>
