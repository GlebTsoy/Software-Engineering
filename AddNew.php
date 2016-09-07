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
            <li><a href="Employee.php">Employee List</a></li>
            <li class="active"><a href="AddNew.php">Add New</a></li>
            <li><a href="Changelog.php">Changelog</a></li>
            <li><a href="Help.php">Help</a></li>
            </ul>
        <!-- InstanceEndEditable --></nav>
      </div>

      <!-- Jumbotron --><!-- InstanceBeginEditable name="EditRegion3" -->
      <div class="jumbotron">
        <h1>Add new employee!</h1>
        <p class="lead">
        <style>
		td{ font-size:20px}
		#gender{width:218px}
		#dateform{width:218px}
		</style>
<table width="400" border="0" align="center">
  <tbody>
    <tr>
    
<form action="insert.php" method="post" action="#">
      <td>First Name:</td>
      <td><input type="text" name="FirstName" value=""></td>
    </tr>
    <tr>
      <td>Last Name:</td>
      <td><input type="text" name="LastName" value=""></td>
    </tr>
    <tr>
      <td>Date of Birth:</td>
      <td>
  <input type="date" name="DOB" id="dateform"></td>
    </tr>
    <tr>
      <td>Job:</td>
      <td><input type="text" name="Job" value=""></td>
    </tr>
    <tr>
      <td>Salary:</td>
      <td><input type="text" name="Salary" value=""></td>
    </tr>
        <tr>
      <td>Gender:</td>
      <td><select name="gender" id="gender" >
       <option value="M">Male</option>
       <option value="F">Female</option>
       <option value="?">?????</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>Contact Num:</td>
      <td><input type="text" name="contactNum" value=""></td>
    </tr>
    <tr>
      <td>E-Mail:</td>
      <td><input type="text" name="email" value=""></td>
    </tr>
    <tr>
      <td>Date Hired:</td>
      <td><input type="date" name="dateHired" id="dateform"></td>
    </tr>
  </tbody>
</table>        

<br> <input type="submit" />
<p><p><a class="btn btn-lg btn-success" href="RemoveEmp.php" role="button">Remove Employee</a></p></p>

</p>

</form>
<p></p>     </div>
      

      <!-- InstanceEndEditable --><!-- Example row of columns -->
      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2016 Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<!-- InstanceEnd -->
</html>
