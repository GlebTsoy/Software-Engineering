<!DOCTYPE html>
<head>
<meta http-equiv="refresh" content="0; url=employee.php" />
</head>
<body style=" background-image:url(bg.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:cover">
<?php
require "databaseConnection.php";
$firstname = $_POST["FirstName"];
$lastname = $_POST["LastName"];
$dob = $_POST["DOB"];
$job = $_POST["Job"];
$salary = $_POST["Salary"];
$salaryRate = $_POST["salaryRate"];
$salaryType = $_POST["salaryType"];
$gender = $_POST["gender"];
$contactNum = $_POST["contactNum"];
$email = $_POST["email"];
$dateHired = $_POST["dateHired"];
$username = $_POST["username"];
$password = $_POST["password"];
$clearance = $_POST["clearance"];

addNewEmp($firstname, $lastname, $dob, $job, $salary, $salaryRate, $salaryType, $gender, $contactNum, $email, $dateHired, $username, $password, $clearance);

?>
</body>
</html>
