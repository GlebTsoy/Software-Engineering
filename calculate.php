<meta http-equiv="refresh" content="0; url=timecard.php" />
<?php
session_start();
require "databaseConnection.php";

$form = $_POST["form"];
$value = $_POST["value"];
$id = $_SESSION["loginID"];

$row = selectById($id);
$rate = 0;
$table = "";
$salary = 0;
switch ($form){
	case "time":
		$table = "hourlyemp";
		$hours = intval(getRate($id, $table)["hours"]);
		$hours = $hours + $value;
		$number = array('hours' => $hours);
		setNumber($id, $table, $number);
		$rate = intval(getRate($id, $table)["salaryRate"]);
		$salary = $rate * $hours;
		break;
	case "sales":
		$table = "commissionemp";
		$contracts = getRate($id, $table)["number_of_contracts"];
		$contracts = $contracts + $value;
		$number = array('number_of_contracts'=>$contracts);
		setNumber($id, $table, $number);
		$salary = $contracts*1000*0.01;
		break;
}

setSalary($id, $salary, $table);

?>
