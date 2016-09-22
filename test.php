<?php
session_start();
if ($_SESSION["valid"] == "Denied"){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>

		<script>
		
			function showForm(formName){
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
					}
					xmlhttp.onreadystatechange=function() {
						if (this.readyState==4 && this.status==200) {
							document.getElementById("forms").innerHTML=this.responseText;
							}
						}
						xmlhttp.open("GET","test2.php?q="+formName,true);
						xmlhttp.send();
			}

		</script>

		<button onclick = "showForm(this.textContent)">Time</button>
		<button onclick = "showForm(this.textContent)">Sales</button>
		<button onclick = "showForm(this.textContent)">Payslip</button>
		<div id="forms"></div>

	</body>
</html>