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
	echo "<form action='calculate.php' method = 'post'>
	<input type='hidden' name='form' value = 'time'>
	<input type='number' name='value'>
	<input type='submit'>
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
	<input type='number' name='value'>
	<input type='submit'>
	</form>";
}

?>
<style>
		input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
</style>

</body>
</html>
