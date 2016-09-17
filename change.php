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
$conn = new mysqli($servername, $username, $password, $dbname);
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

foreach($attributes as $key=>$value){
	if($value!=""){
		$change_sql = "INSERT INTO changes (id, type, change_from, change_to) VALUES ('$id','Edit', '".from($conn, $id, $key)."', '$value')";
		changelog($change_sql);
		$sql = "UPDATE emp SET $key = '$value' WHERE id = $id";
		$conn->query($sql);
	}
}
function from($conn, $id, $attribute){
	$sql = "SELECT $attribute FROM emp WHERE id=$id";
	$result = $conn->query($sql);
	$val = $result->fetch_assoc();
	return strval($val["$attribute"]);
}
$conn->close();

function changelog($sql){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "changelog";
	$type = "Removed";
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$conn->query($sql);
	$conn->close();
}

?>
</body>
</html>