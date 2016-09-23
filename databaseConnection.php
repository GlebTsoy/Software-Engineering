
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
	public function multiSql($sql){
		$result = mysqli_multi_query($this->conn, $sql);
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
		$sql2 = "DELETE FROM hourlyemp WHERE id = '$id'";
		$a->runSql($sql2);
		$sql3 = "DELETE FROM fixedemp WHERE id = '$id'";
		$a->runSql($sql3);
		$sql4 = "DELETE FROM commissionemp WHERE id = '$id'";
		$a->runSql($sql4);
	}
	$a->closeConn();
}

function addNewEmp($firstname, $lastname, $dob, $job, $salary, $salaryRate, $salaryType, $gender, $contactNum, $email, $dateHired, $username, $password, $clearance){
	$a = new DatabaseConnection();
	$sql = "INSERT INTO emp (firstname, lastname, DOB, Job, salaryType, gender, contactNum, email, dateHired, username, password, clearance)
	VALUES ('$firstname', '$lastname', '$dob', '$job', '$salaryType', '$gender', '$contactNum', '$email', '$dateHired', '$username', '$password','$clearance')";
	$a->runSql($sql);
	if($salaryType == "hourly"){
		$sql2= "INSERT INTO hourlyemp (id ,salaryRate) VALUES ((SELECT id FROM emp WHERE username = '$username'),'$salaryRate')";
	}
	elseif ($salaryType == "commission") {
		$sql2= "INSERT INTO commissionemp (id) VALUES ((SELECT id FROM emp WHERE username = '$username'))";
	}
	else{
		$sql2= "INSERT INTO fixedemp (id ,salary) VALUES ((SELECT id FROM emp WHERE username = '$username'), '$salary')";
	}
	$a->runSql($sql2);
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
	$sql = "SELECT * FROM $table WHERE id='$id'";
	$sql = "SELECT * FROM $table WHERE id = $id";
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

function table($row){
	echo "<form action='print.php' method='post'>
	<table id='detailed'>
	<tr><td id='tableinfo'>ID</td><td name='details_id'>" . $row["id"] ."</td></tr>
	<tr><td id='tableinfo'>First Name</td><td>" . $row["firstname"] ."</td></tr>
	<tr><td id='tableinfo'>Last Name</td><td>" . $row["lastname"] ."</td></tr>
	<tr><td id='tableinfo'>DOB</td><td>" . $row["DOB"] ."</td></tr>
	<tr><td id='tableinfo'>Job</td><td>" . $row["Job"] ."</td></tr>
	<tr><td id='tableinfo'>Gender</td><td>" . $row["gender"] ."</td></tr>
	<tr><td id='tableinfo'>Contact Number</td><td>" . $row["contactNum"] ."</td></tr>
	<tr><td id='tableinfo'>Email</td><td>" . $row["email"] ."</td></tr>
	<tr><td id='tableinfo'>Date Hired</td><td>" . $row["dateHired"] ."</td></tr>
	<tr><td id='tableinfo'>Date Terminated</td><td>" . $row["dateTerminated"] ."</td></tr>
	<tr><td id='tableinfo'>Salary Type</td><td>" . $row["salarytype"] ."</td></tr>
	</table>
	</form>";
}

?>
