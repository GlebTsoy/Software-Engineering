<!DOCTYPE html>
  <head>
  </head>
  <body>
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "DELETE FROM emp WHERE id='$_POST[IDRemove]'";
if ($conn->query($sql) === TRUE) {
    echo "RIP Employee for that ID";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>
				</body>
				
			</html>