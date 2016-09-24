<?php
session_start();
?>
<!DOCTYPE html>
<head>
<meta http-equiv="refresh" content="0; url=profile.php" />
</head>
<body>
<?php

require "databaseConnection.php";

$id = $_SESSION["loginID"];
$salaryType = $_POST["salaryType"];
$email = $_POST["email"];
$attributes = array(
	"salaryType"=>$salaryType,
	"email"=>$email,
);

editDetails($id, $attributes);

?>
</body>
</html>
