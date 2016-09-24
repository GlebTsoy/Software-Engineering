<?php

class DatabaseConnection {
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $empdbname = "employee";

	private $conn;

	public function __construct(){
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->empdbname);
		if (!$this->conn){
			die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function runSql($sql){
		$result = mysqli_query($this->conn, $sql);
		return $result;
	}

	public function closeConn(){
		mysqli_close($this->conn);
	}

}

function selectAll(){
	$a = new DatabaseConnection();
	$sql = "SELECT * FROM emp";
	$result = $a->runSql($sql);
	return $result;
}

function selectById($id){
	$a = new DatabaseConnection();
	$sql = "SELECT * FROM emp WHERE id='$id'";
	$result = $a->runSql($sql);
	$row = mysqli_fetch_assoc($result);
	return $row;
}

function authorization($username, $password){
	$token = "Denied";
	$a = new DatabaseConnection();
	$sql = "SELECT id, username, password, clearance FROM emp";
	$result = $a->runSql($sql);
	while($row = mysqli_fetch_assoc($result)){
		if($row["username"]==$username && $row["password"]==$password){
			if($row["clearance"]=="admin"){
				$token = "Admin";
				break;
			}
			else{
				$token="User";
				break;
			}
		}
	}
	$id_and_token = array("id"=>$row["id"], "token"=>$token);
	$a->closeConn();
	return $id_and_token;
}

function removeEmp($empIdArray){
	$a = new DatabaseConnection();
	foreach($empIdArray as $id){
		$sql = "DELETE FROM emp WHERE id='$id'";
		$a->runSql($sql);
	}
	$a->closeConn();
}

function addNewEmp($firstname, $lastname, $dob, $job, $salary, $salaryRate, $salaryType, $gender, $contactNum, $email, $dateHired, $username, $password, $clearance){
	$a = new DatabaseConnection();
	$sql = "INSERT INTO emp (firstname, lastname, DOB, Job, salaryType, gender, contactNum, email, dateHired, username, password, clearance)
	VALUES ('$firstname', '$lastname', '$dob', '$job', '$salaryType', '$gender', '$contactNum', '$email', '$dateHired', '$username', '$password','$clearance')";
	$id = mysqli_insert_id($a);
	$sql2 = "INSERT INTO hourlyemp (id, salaryRate) VALUSE ('$id', '$salaryRate')";
	$a->runSql($sql);
	$a->closeConn();
}

function editDetails($empId,$attributes){
	$a = new DatabaseConnection();
	foreach($attributes as $key=>$value){
		if($value!=""){
			$sql = "UPDATE emp SET $key = '$value' WHERE id = $empId";
			$a->runSql($sql);
		}
	}
	$a->closeConn();
}

function getSalaries($salaryType){
	$table = "";
	switch ($salaryType) {
		case 'hourly':
			$table = "hourlyemp";
			break;
		case 'commission':
			$table = 'commissionemp';
			break;
		default:
			$table = "fixedemp";
			break;
	}
	$a = new DatabaseConnection();
	$sql = "SELECT * FROM $table";
	$result = $a->runSql($sql);
	$a->closeConn();
	return $result;
}

function getRate($id, $table){
	$a = new DatabaseConnection();
	$sql = "SELECT * FROM $table";
	$result = $a->runSql($sql);
	$row = mysqli_fetch_assoc($result);
	$a->closeConn();
	return $row;
}

function setNumber($id, $table, $number){
	$a = new DatabaseConnection();
	foreach ($number as $key => $value) {
		$sql = "UPDATE $table SET $key = '$value' WHERE id = $id";
		$a->runSql($sql);
	}
	$a->closeConn();
}

function setSalary($id ,$salary, $table){
	$a = new DatabaseConnection();
	$sql = "UPDATE $table SET salary = '$salary' WHERE id = $id";
	$a->runSql($sql);
	$a->closeConn();
}

?>
