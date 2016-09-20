<!DOCTYPE html>
<head>
<meta http-equiv="refresh" content="0; url=Employee.php" />
</head>
<body>
<?php
require "databaseConnection.php";
$id = NULL;
$firstname = $_POST["FirstName"];
$lastname = $_POST["LastName"];
$dob = $_POST["DOB"];
$job = $_POST["Job"];
$salary = $_POST["Salary"];
$gender = $_POST["gender"];
$contactNum = $_POST["contactNum"];
$email = $_POST["email"];
$dateHired = $_POST["dateHired"];

addNewEmp($id, $firstname, $lastname, $dob, $job, $salary, $gender, $contactNum, $email, $dateHired);

?>
</body>
</html>