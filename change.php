<?php
session_start();
?>
<!DOCTYPE html>
<head>
<meta http-equiv="refresh" content="0; url=Employee.php" />
</head>
<body>
<?php

require "databaseConnection.php";

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
$attributes = array(
	"firstname"=>$firstname,
	"lastname"=>$lastname,
	"DOB"=>$DOB,
	"Job"=>$Job,
	"Salary"=>$Salary,
	"gender"=>$gender,
	"contactNum"=>$contactNum,
	"email"=>$email,
	"dateHired"=>$dateHired,
	"dateTerminated"=>$dateTerminated
);

editDetails($id, $attributes);

?>
</body>
</html>