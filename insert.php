<!DOCTYPE html>
<head>
<meta http-equiv="refresh" content="0; url=Employee.php" />
</head>
<body style=" background-image:url(bg.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:cover">
<?php
require "databaseConnection.php";
$id = NULL;
$firstname = $_POST["FirstName"];
$lastname = $_POST["LastName"];
$dob = $_POST["DOB"];
$job = $_POST["Job"];
$salary = $_POST["Salary"];
$salaryRate = $_POST["salaryRate"];
$gender = $_POST["gender"];
$contactNum = $_POST["contactNum"];
$email = $_POST["email"];
$dateHired = $_POST["dateHired"];
$username = $_POST["username"];
$password = $_POST["password"];
$clearance = $_POST["clearance"];

addNewEmp($id, $firstname, $lastname, $dob, $job, $salary, $salaryRate, $gender, $contactNum, $email, $dateHired, $username, $password, $clearance);

?>
</body>
</html>