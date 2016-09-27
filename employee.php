<?php
session_start();
if ($_SESSION["valid"] != "Admin"){
	header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the heasord; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.7/bootstrap-3.3.7/docs/favicon.ico">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Employee table</title>
    <!-- InstanceEndEditable -->
    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.7/bootstrap-3.3.7/docs/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="__jquery.tablesorter/jquery-latest.js"></script>
		<script src="__jquery.tablesorter/jquery.tablesorter.js"></script>

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
  </head><link rel="stylesheet" type="text/css" href="assets/header-login-signup.css">

  <body style=" background-image:url(bg.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:cover">

    <div class="container" >
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">


        <nav><!-- InstanceBeginEditable name="EditRegion4" -->
              <header class="header-login-signup">
	<div class="header-limiter">
		<h1>Payroll <span>System</span></h1>
		<nav>
			<a href="employee.php" class="selected">Employee List</a>
			<a href="addnew.php">Add New</a>
			<a href="faq.php">FAQ</a>
			<a href="contacts.php">Contacts</a>

		</nav>

		<ul>
			<li><a style="float:right; font-size:14px; border:1px; border-style:solid; border-color: #0C8A12; padding: 0.5em; background-color: #78D96C ; color:white;border-radius: 10px;" href="#" role="button" onclick="window.location.href='index.php'">Logout</a></li>
		</ul>

	</div>
</header>
        <!-- InstanceEndEditable --></nav>
      </div>
                          <div id="mid">
      <!-- Jumbotron --><!-- InstanceBeginEditable name="EditRegion3" -->
      <div class="jumbotron">
        <h1>Employee List </h1>
        <p class="lead">
			<style>
				table {border-collapse: collapse; width: 100%;  }
				th, td {padding: 8px; text-align: left; border: 1px solid #ddd;}
				tr:nth-child(even) {background-color: #f2f2f2;}
				tr:nth-child(odd) {background-color: #FFFFFF;}
				tr:hover{background-color:#ddd;}
				th {background-color: #4CAF50; color: white;}
				th:hover{background-color: white; color: #4CAF50;}
				td a{display: block; color: inherit; text-decoration: none;}
				td a:hover{text-decoration: none;}
				#id:hover{background-color:#4caf50; color:white}
				#detailed{width:50%; position:relative; left:25%}
				#remove{padding: 8px; margin: 10px;}
				#tableinfo{background-color: #4caf50; font-weight:500; color: white; width:200px}

			</style>
			<script>
			function showUser(id){

				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
					}
					xmlhttp.onreadystatechange=function() {
						if (this.readyState==4 && this.status==200) {
							document.getElementById("employeeDetails").innerHTML=this.responseText;
							}
						}
						xmlhttp.open("GET","details.php?q="+id,true);
						xmlhttp.send();
			}
			</script>
			 <div align="center">

			<?php
				require "databaseConnection.php";
				$result = selectAll();
				if (mysqli_num_rows($result)>0) {
					 echo "<form action='remove.php' method='post'><table id='empTable'><thead><tr><th></th><th>ID</th><th>First Name</th><th>Last name</th><th>Job</th><th>Salary type</th></tr></thead><tbody>";
					 while($row = mysqli_fetch_assoc($result)) {
						 echo "<tr>
						 <td><input type='checkbox' name='tick[]' value='" .$row["id"]. "'></td>
						 <td id='id' onclick='showUser(this.textContent); setTimeout(scrollfunction, 10)'>" . $row["id"]. "</td>
						 <td style='	text-transform: capitalize;'>" . $row["firstname"]. "</td>
						 <td style='text-transform: capitalize;'>" . $row["lastname"]. "</td>
						 <td>" . $row["Job"]."</td>
						 <td>" . $row["salarytype"]. "</td>
						 </tr>";
					 }
					 echo "</tbody></table>
						<input style='font-size:14px; border:2px; border-style:solid; border-color: #770001; padding: 0.5em; background-color: #E74545 ; color:white;border-radius: 10px;' id='remove' type='submit' value='Delete'> 				
						</form>";
				} else {
					 echo "0 results";
				}
			?>
		</p>
		</div>
						<button style="font-size:14px; border:1px; border-style:solid; border-color: #0C8A12; padding: 0.5em; background-color: #78D96C ; color:white;border-radius: 10px;" onclick = "window.location.href = 'calculateAdmin.php' ">Paycheck</button>


        <div id="employeeDetails"><b>Click on id to get more detailed information</b></div>        
      </div>
      <script type-"text/javascript">

       function scrollfunction(e) {

       window.location.href="#employeeDetails";
       }

     </script>
	 	<script>
		$(document).ready(function(){
			$("#empTable").tablesorter();
		});
	</script>
	  <!-- InstanceEndEditable --><!-- Example row of columns -->
      </div>
      <!-- Site footer -->
            <footer class="footer" style="bottom:0;left:0;right:0;height:30px;">
        <p style="font-size:9px">&copy; 2016 The Company's Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<!-- InstanceEnd --></html>
