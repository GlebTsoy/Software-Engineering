<?php
require "databaseConnection.php";

$form = $_POST["form"];
$value = $_POST["value"];
$id = 1;
if($form == "time"){
	$row = selectById($id);
	$salary = intval($row["salaryRate"])*$value;
	$attribute = array("salary"=>$salary);
	editDetails($id, $attribute);
}

?>