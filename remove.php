<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="0; url=Employee.php" />
</head>
<body>
<?php
require "databaseConnection.php";
if (isset($_POST['tick'])){
	$values = $_POST['tick'];
}

removeEmp($values);
?>
</body>
</html>