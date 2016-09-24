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
$email = $_POST["email"];
$attributes = array(
	"email"=>$email,
);

editDetails($id, $attributes);

?>
</body>
</html>
