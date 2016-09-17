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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO `emp` (`id`, `firstname`, `lastname`, `DOB`, `Job`, `Salary`, `gender`, `contactNum`, `email`, `dateHired`) 
VALUES (NULL, '$_POST[FirstName]', '$_POST[LastName]', '$_POST[DOB]', '$_POST[Job]','$_POST[Salary]', '$_POST[gender]', '$_POST[contactNum]', '$_POST[email]', '$_POST[dateHired]')";
if ($conn->query($sql) === TRUE) {
    echo "Redirecting...";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>
</body>
</html>