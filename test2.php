<html>
<head>
</head>
<body>
<?php

$formType = $_GET["q"];

switch ($formType){
	case "Time":
		timecard();
		break;
	case "Payslip":
		paySlip();
		break;
	case "Sales":
		sales();
		break;
	default:
	echo "На хуй иди";
}

function timeCard(){
	echo "<form> 
	<input type='text'>
	<input type='submit'>
	</form>";
}

function paySlip(){
	echo "your payment is 0 cause system does not work, haha";
}

function sales(){
	echo "<form>
	<input type='text'>
	<input type='submit>
	</form>";
}

?>
</body>
</html>