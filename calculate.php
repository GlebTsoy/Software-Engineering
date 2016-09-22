<?php
session_start();
require "databaseConnection.php";

$form = $_POST["form"];
$value = $_POST["value"];
$id = $_SESSION["loginID"];

$row = selectById($id);
$SALES_RATE = 0;
switch ($form){
	case "time":
		$SALES_RATE = 1;
		break;
	case "sales":
		$SALES_RATE = 0.01;
		break;
}

$salary = intval($row["salaryRate"])*$value*$SALES_RATE;

$attribute = array("salary"=>$salary);
editDetails($id, $attribute);

?>