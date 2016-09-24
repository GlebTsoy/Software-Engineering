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
    <title>FAQ</title>
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
			<a href="faq.php" class="selected">FAQ</a>
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
        <h1>FAQ</h1>
        <h2>I think my paycheck is incorrect. What should I do?</h2>
<h4>Contact your Home Department Coordinator since all pay starts at the Home Department Level. The HDC will investigate your question and let you know the resolution. </h4>
<br>
<h2> Am I eligible for Overtime?</h2>
<h4>Eligibility for Overtime is determined by job classification. See your Home Department Coordinator. </h4>
<br>
<h2>When is my payday? </h2>
<h4>Your payday will depends on your job. It could be weekly on every friday, or monthly every second friday of the month. </h4>
<br>        
<h2>How do I calculate my salary?</h2>
<h4>Depends on the method decided by the admins. If your method is by calculating the timecard, then it will be the work hours times the salary multiplier set by the admins. If it's by sales number, then it will be your number of successful sales times the salary multiplier. If it's fixed, then it will be decided by the admins themselves.</h4>
<br>  
<h2>How do I change my personal details?</h2>
<h4>You can only change some of your details. For further details, contact one of the admins to change it for you.</h4>
</div>
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