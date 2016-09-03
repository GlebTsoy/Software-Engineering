<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.7/bootstrap-3.3.7/docs/favicon.ico">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Justified Nav Template for Bootstrap</title>
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- InstanceBeginEditable name="head" -->
  <!-- InstanceEndEditable -->
  </head>

  <body>

    <div class="container">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
        <h3 class="text-muted">Payroll System</h3>
        <nav><!-- InstanceBeginEditable name="EditRegion4" -->
          <ul class="nav nav-justified">

            <li class="active"><a href="Employee.html">Employee List</a></li>
            <li><a href="AddNew.html">Add New</a></li>
            <li><a href="Changelog.html">Changelog</a></li>
            <li><a href="Help.html">Help</a></li>
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
					 echo "<table><tr><th>ID</th><th>First Name</th><th>Last name</th><th>DOB</th><th>Job</th><th>Salary</th></tr>";
					 while($row = $result->fetch_assoc()) {
						 echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["DOB"]. "</td><td>" . $row["Job"]."</td><td>" . $row["Salary"]."</td></tr>";
					 }
					 echo "</table>";
				} else {
					 echo "0 results";
				}

				$conn->close();
			?>
		</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Add some new dudes</a></p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Exterminate your workers</a></p>
      </div>
      <!-- InstanceEndEditable --><!-- Example row of columns -->
      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<!-- InstanceEnd --></html>
