<html>
<head>
</head>
<body>
<?php
session_start();
require "databaseConnection.php";
$formType = $_GET["q"];

switch ($formType){
	case "Time":
		timecard();
		break;
	case "Payslip":
		paySlip();
		break;
	case "Sales":
		sales();
		break;
}

function timeCard(){
	$time = date("H:i");
	echo $time;
	echo "<form action='calculate.php' method = 'post'>
	<input type='hidden' name='form' value = 'time'>
	<button type='submit' name='check' value='in'>Check in</button>
	<button type='submit' name='check' value='out'>Check out</button>
	</form>";
}

function paySlip(){
	$id = $_SESSION["loginID"];
	$weekday = date("l");
	$monthDay = date("d");

	$row = selectById($id);
	if($weekday == "Friday"){
		echo "Payday, your salary is ".$row["Salary"];
	}
	else{
		echo "It is not payday yet, your earnings so far: ".$row["Salary"]."$";
	}
}

function sales(){
	echo "<form>
	<input type='text'>
	<input type='hidden' name='form' value='sales'
	<input type='text' name='value'>
	<input type='submit'>
	</form>";
}

?>
</body>
</html>
