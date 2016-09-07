<?php
session_start();
$_SESSION["valid"]=false;
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign in</title>
<link rel="icon" href="cash.png">
<style>
.login { 
	position: absolute;
	top:50%;
	left:50%;
	height:auto;
	width:auto;
	margin: -150px 0 0 -150px;
	border:1px #CCC solid;
	padding:10px;
}

.login input { 
	padding:5px;
	margin:5px
 }
</style>
</head>
<body>
<div class="login">
<h2>Payroll</h2>
<form action="logincheck.php" method="post">
<input type="text" name = "name" placeholder="username"><br>
<input type="password" name = "password" placeholder="password"></br>
<input type="submit" value="Sign in">
</form>
</div>
</body>
</html>