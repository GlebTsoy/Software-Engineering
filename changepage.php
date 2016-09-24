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
    <title>Change Employee Details</title>
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
			<a href="employee.php">Employee List</a>
			<a href="addnew.php">Add New</a>
			<a href="faq.php">FAQ</a>
			<a href="contacts.php">Contacts</a>
		</nav>

		<ul>
			<li><a style="float:right; font-size:14px; border:1px; border-style:solid; border-color: #0C8A12; padding: 0.5em; background-color: #78D96C ; color:white;border-radius: 10px;" href="#" role="button" onclick="window.location.href='index.php'">Logout</a></li>
		</ul>

	</div>
</header>

<link rel="stylesheet" type="text/css" href="css/tablestyle.css">
        <!-- InstanceEndEditable --></nav>
      </div>
                          <div id="mid">
      <!-- Jumbotron --><!-- InstanceBeginEditable name="EditRegion3" -->
      <div class="jumbotron">
        <h1>Change the Employee Details!</h1>
        <p class="lead">
        <style>
		td{ font-size:20px}
		#gender{width:218px}
		#dateform{width:218px}
		</style>
		<?php
			require "databaseConnection.php";
			$row = selectById($_SESSION["id"]);
		?>
<table width="400" border="0" align="center">
  <tbody>
    <tr>

<form action="change.php" method="post">
      <td id='tableinfo'>First Name:</td>
      <td><input type="text" name="FirstName" style="text-transform: capitalize;"  value="<?php echo $row['firstname']; ?>"></td>
    </tr>
    <tr>
      <td id='tableinfo'>Last Name:</td>
      <td><input type="text" name="LastName" style="text-transform: capitalize;"  required value="<?php echo $row['lastname']; ?>"></td>
    </tr>
    <tr>
      <td id='tableinfo'>Date of Birth:</td>
      <td>
  <input type="date" name="DOB" id="dateform" value="<?php echo $row['DOB']; ?>"></td>
    </tr>
    <tr>
      <td id='tableinfo'>Job:</td>
      <td><input type="text" name="Job" value="<?php echo $row['Job']; ?>"></td>
    </tr>
		<tr>
			<td id='tableinfo'>Salary Type:</td>
			<td>
				<select name="salaryType" id="salaryType" onchange="salaryTypeChange()">
					<option value="fixed">Fixed Pay</option>
					<option value="hourly">Hourly Pay</option>
					<option value="commission">Sales Commission</option>
				</select></td>
		</tr>
		<tr>
			<td id='tableinfo'>Salary:</td>
			<td><input type="number" name="Salary" id="Salary" required value="<?php echo $row['Salary']; ?>"></td>
		</tr>
     <tr>
      <td id='tableinfo'>Salary Rate:</td>
		<td><input type='number' name = 'salaryRate' id="salaryRate" value="<?php echo $row['salaryRate']; ?>"></td>
    </tr>
        <tr>
      <td id='tableinfo'>Gender:</td>
      <td><select name="gender" required id="gender">
	   <option value="<?php echo $row['gender']; ?>" label="<?php echo $row['gender']; ?>" hidden></option>
       <option value="M">M</option>
       <option value="F">F</option>
       <option value="?">?????</option>
      </select>
      </td>
    </tr>
    <tr>
      <td id='tableinfo'>Contact Num:</td>
      <td><input type="tel" name="contactNum" value="<?php echo $row['contactNum']; ?>"></td>
    </tr>
    <tr>
      <td id='tableinfo'>E-Mail:</td>
      <td><input type="email" name="email" required value="<?php echo $row['email']; ?>"></td>
    </tr>
    <tr>
      <td id='tableinfo'>Date Hired:</td>
      <td><input type="date" name="dateHired" id="dateform" required value="<?php echo $row['dateHired']; ?>"></td>
    </tr>
	<tr>
      <td id='tableinfo'>Date Terminated:</td>
      <td><input type="date" name="dateTerminated" id="dateform" value="<?php echo $row['dateTerminated']; ?>"></td>
    </tr>
  </tbody>
</table>

<br> <input type="submit" />
</form>
<p></p>     </div>


      <!-- InstanceEndEditable --><!-- Example row of columns -->
      </div>
			<script>
			 function salaryTypeChange()
			 {
			 	var select_element = document.getElementById("salaryType").value;
			 	if(select_element == "fixed"){
			 	  document.getElementById("Salary").disabled = false;
			 		document.getElementById("salaryRate").disabled = true;
			 	}else if(select_element == "hourly"){
			 	  document.getElementById("Salary").disabled = true;
			 		document.getElementById("salaryRate").disabled = false;
			 }
			 else if(select_element == "commission"){
				 document.getElementById("Salary").disabled = true;
				 document.getElementById("salaryRate").disabled = true;
			}
			  }
			 </script>
      <!-- Site footer -->
            <footer class="footer" style="bottom:0;left:0;right:0;height:30px;">
        <p style="font-size:9px">&copy; 2016 The Company's Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<!-- InstanceEnd --></html>
