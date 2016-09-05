<?php
session_start();
if ($_SESSION["valid"] == false){
	header("Location: index.php");	
}
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="cash.png">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Employee table</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-3.3.7/bootstrap-3.3.7/docs/examples/justified-nav/justified-nav.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/js/ie-emulation-modes-warning.js"></script>
	<script src="__jquery.tablesorter/jquery-latest.js"></script>
	<script src="__jquery.tablesorter/jquery.tablesorter.js"></script>
	<script>
	function showUser(id){
		
		if (window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
		}
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				document.getElementById("txtHint").innerHTML=this.responseText;
			}
		}
		xmlhttp.open("GET","details.php?q="+id,true);
		xmlhttp.send();
	}
	</script>
  </head>

  <body>

    <div class="container">
      <div class="masthead">
        <h3 class="text-muted">Payroll System</h3>
        <nav><!-- InstanceBeginEditable name="EditRegion4" -->
          <ul class="nav nav-justified">

            <li class="active"><a href="employee.php">Employee List</a></li>
            <li><a href="AddNew.php">Add New</a></li>
            <li><a href="Changelog.php">Changelog</a></li>
            <li><a href="Help.php">Help</a></li>
            </ul>
        <!-- InstanceEndEditable --></nav>
      </div>

      <!-- Jumbotron --><!-- InstanceBeginEditable name="EditRegion3" -->
      <div class="jumbotron">
        <h1>Employee List </h1>
        <p class="lead">
			<style>
				table {border-collapse: collapse; width: 100%;}
				th, td {padding: 8px; text-align: left; border: 1px solid #ddd;}
				tr:nth-child(even) {background-color: #f2f2f2;}
				tr:hover{background-color:#ddd;}
				th {background-color: #4CAF50; color: white;}
				th:hover{background-color: white; color: #4CAF50;}
				td a{display: block; color: inherit; text-decoration: none;}
				td a:hover{text-decoration: none;}
				#id:hover{background-color:#4caf50; color:white}
				#detailed{width:50%; position:relative; left:25%}
			</style>
			<?php
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "employee";

				$conn = new mysqli($servername, $username, $password, $dbname);

				if ($conn->connect_error) {
					 die("Connection failed: " . $conn->connect_error);
				}

				$sql = "SELECT id, firstname, lastname, DOB, Job, Salary FROM emp";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					 echo "<table><thead><tr><th>ID</th><th>First Name</th><th>Last name</th><th>Job</th></tr></thead><tbody>";
					 while($row = $result->fetch_assoc()) {
						 echo "<tr><td id='id' onclick='showUser(this.textContent)'>" . 
						 $row["id"]. "</td><td>" . 
						 $row["firstname"]. "</td><td>" . 
						 $row["lastname"]. "</td><td>" . 
						 $row["Job"]."</td></tr>";
					 }
					 echo "</tbody></table>";
				} else {
					 echo "0 results";
				}

				$conn->close();
			?>
		</p>
		<div id="txtHint"><b>Click on id to get more detailed information</b></div>
      </div>
      <!-- InstanceEndEditable --><!-- Example row of columns -->
      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->

	<script>
		$(document).ready(function(){ 
			$("table").tablesorter(); 
		});
	</script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<!-- InstanceEnd --></html>
