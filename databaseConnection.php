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
	$sql = "SELECT username, password, clearance FROM emp";
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
	$a->closeConn();
	return $token;
}

function removeEmp($empIdArray){
	$a = new DatabaseConnection();
	foreach($empIdArray as $id){
		$sql = "DELETE FROM emp WHERE id='$id'";
		$a->runSql($sql);
	}
	$a->closeConn();
}

function addNewEmp($id, $firstname, $lastname, $dob, $job, $salary, $gender, $contactNum, $email, $dateHired, $username, $password, $clearance){
	$a = new DatabaseConnection();
	$sql = "INSERT INTO `emp` (`id`, `firstname`, `lastname`, `DOB`, `Job`, `Salary`, `gender`, `contactNum`, `email`, `dateHired`, username, password, clearance) 
	VALUES ('$id', '$firstname', '$lastname', '$dob', '$job', '$salary', '$gender', '$contactNum', '$email', '$dateHired', '$username', '$password','$clearance')";
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
?>