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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.7/bootstrap-3.3.7/docs/favicon.ico">
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- InstanceBeginEditable name="head" -->
  <!-- InstanceEndEditable -->
  </head>
  <body style=" background-image:url(bg.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size:cover">
  
    <div class="container" >
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <div class="masthead">
              <h3 class="text-muted" style=" font-weight:bold">Payroll System <a style="float:right; font-size:14px; border:1px; border-style:solid; border-color: #0C8A12; padding: 0.5em; background-color: #78D96C ; color:white;border-radius: 10px;" href="#" role="button" onclick="window.location.href='index.php'">Log out</a></h3>
        <nav><!-- InstanceBeginEditable name="EditRegion4" -->
          <ul class="nav nav-justified">
            <li class="active"><a href="employee.php">Employee List</a></li>
            <li><a href="addnew.php">Add New</a></li>
            <li><a href="help.php">Help</a></li>
            </ul>
        <!-- InstanceEndEditable --></nav>
      </div>
                          <div id="mid">
      <!-- Jumbotron --><!-- InstanceBeginEditable name="EditRegion3" -->
      <div class="jumbotron">
        <h1>Employee List </h1>
        <p class="lead">
			<style>
				table {border-collapse: collapse; width: 100%;}
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
			<?php
				require "databaseConnection.php";
				$result = selectAll();
				if (mysqli_num_rows($result)>0) {
					 echo "<form action='remove.php' method='post'><table><thead><tr><th></th><th>ID</th><th>First Name</th><th>Last name</th><th>Job</th></tr></thead><tbody>";
					 while($row = mysqli_fetch_assoc($result)) {
						 echo "<tr>
						 <td><input type='checkbox' name='tick[]' value='" .$row["id"]. "'></td>
						 <td id='id' onclick='showUser(this.textContent); setTimeout(scrollfunction, 10)'>" . $row["id"]. "</td>
						 <td>" . $row["firstname"]. "</td>
						 <td>" . $row["lastname"]. "</td>
						 <td>" . $row["Job"]."</td>
						 </tr>";
					 }
					 echo "</tbody></table>
						<input id='remove' type='submit' value='Delete'>
						
						</form>";
				} else {
					 echo "0 results";
				}
			?>
		</p>
		<div id="employeeDetails"><b>Click on id to get more detailed information</b></div>
      </div>
      <script type-"text/javascript">
	
       function scrollfunction(e) {
		   
       window.location.href="#employeeDetails";
       }

     </script>
      <!-- InstanceEndEditable --><!-- Example row of columns -->
      </div>
      <!-- Site footer -->
      <footer class="footer">
        <p style="font-size:9px">&copy; 2016 The Company's Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<!-- InstanceEnd --></html>
