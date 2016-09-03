<!DOCTYPE html>
  <head>
  </head>
  <body>
  	<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "employee";

				$conn = new mysqli($servername, $username, $password, $dbname);

				if ($conn->connect_error) {
					 die("Connection failed: " . $conn->connect_error);
				} 
$sql = "INSERT INTO `emp` (`id`, `firstname`, `lastname`, `DOB`, `Job`, `Salary $`) 
VALUES (NULL, 'John', 'Doe', '1990-01-01', 'Master', '9')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
				</body>
				
			</html>