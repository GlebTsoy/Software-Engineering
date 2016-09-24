	
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

function addNewEmp($id, $firstname, $lastname, $dob, $job, $salary, $salaryRate, $salaryType, $gender, $contactNum, $email, $dateHired, $username, $password, $clearance){
	$a = new DatabaseConnection();
	$sql = "INSERT INTO `emp` (`id`, `firstname`, `lastname`, `DOB`, `Job`, `Salary`, salaryRate, salaryType, `gender`, `contactNum`, `email`, `dateHired`, username, password, clearance)
	VALUES ('$id', '$firstname', '$lastname', '$dob', '$job', '$salary', '$salaryRate', '$salaryType', '$gender', '$contactNum', '$email', '$dateHired', '$username', '$password','$clearance')";
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

function table($row){	
	echo "<form action='print.php' method='post'>
	<table id='detailed'>
	<tr><td id='tableinfo'>ID</td><td name='details_id'>" . $row["id"] ."</td></tr>
	<tr><td id='tableinfo'>First Name</td><td>" . $row["firstname"] ."</td></tr>
	<tr><td id='tableinfo'>Last Name</td><td>" . $row["lastname"] ."</td></tr>
	<tr><td id='tableinfo'>DOB</td><td>" . $row["DOB"] ."</td></tr>
	<tr><td id='tableinfo'>Job</td><td>" . $row["Job"] ."</td></tr>
	<tr><td id='tableinfo'>Salary</td><td>" . $row["Salary"] ."$</td></tr>
	<tr><td id='tableinfo'>Gender</td><td>" . $row["gender"] ."</td></tr>
	<tr><td id='tableinfo'>Contact Number</td><td>" . $row["contactNum"] ."</td></tr>
	<tr><td id='tableinfo'>Email</td><td>" . $row["email"] ."</td></tr>
	<tr><td id='tableinfo'>Date Hired</td><td>" . $row["dateHired"] ."</td></tr>
	<tr><td id='tableinfo'>Date Terminated</td><td>" . $row["dateTerminated"] ."</td></tr>
	</table>
	<input type='submit' value='Document to print'>
	</form>";
}

?>
		<style>
				table {border-collapse: collapse; width: 500px}
				th, td {padding: 8px; text-align: left; border: 1px solid black;}
				tr:nth-child(even) {background-color: #f2f2f2;}
				tr:nth-child(odd) {background-color: #FFFFFF;}
				tr:hover{background-color:#ddd;}
				th:hover{background-color: white; color: #4CAF50;}
				#tableinfo{background-color: #4caf50; font-weight:500; color: white; width:150px}
				
			</style>
