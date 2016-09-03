<html>
<body>

Welcome <?php echo $_POST["fname"]; ?><?php echo $_POST["lname"]; ?><br>
Your DOB is: <?php echo $_POST["DOB"]; ?><br>
Your job is: <?php echo $_POST["job"]; ?><br>
Your salary is: <?php echo $_POST["salary"]; ?>

<script>
var fname = <?php echo json_encode($_POST["fname"], JSON_HEX_TAG); ?>;;
var lname = <?php echo json_encode($_POST["lname"], JSON_HEX_TAG); ?>;;
var DOB = <?php echo json_encode($_POST["DOB"], JSON_HEX_TAG); ?>;;
var job = <?php echo json_encode($_POST["job"], JSON_HEX_TAG); ?>;;
var salary = <?php echo json_encode($_POST["salary"], JSON_HEX_TAG); ?>;;

</script>

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


$sql = "INSERT INTO `emp` (`id`, `firstname`, `lastname`, `DOB`, `Job`, `Salary`) 
VALUES (NULL, $fname, $lname, DOB, job, salary)";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>

</body>
</html>