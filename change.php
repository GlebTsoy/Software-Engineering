<?php
session_start();
?>
<!DOCTYPE html>
<head>
<meta http-equiv="refresh" content="0; url=employee.php" />
</head>
<body>
<?php

require "databaseConnection.php";

$id = $_SESSION["id"];
$firstname = $_POST["FirstName"];
$lastname = $_POST["LastName"];
$DOB = $_POST["DOB"];
$Job = $_POST["Job"];
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
