<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en"><!-- InstanceBegin template="/Templates/indexEmp.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-3.3.7/bootstrap-3.3.7/docs/favicon.ico">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Timecard</title>
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
    <header class="header-login-signup">
	<div class="header-limiter">
		<h1>Payroll <span>System</span></h1>
           <nav><!-- InstanceBeginEditable name="EditRegion4" -->
		<nav>
			<a href="timecard.php" class="selected">Timecard</a>
			<a href="profile.php">Profile</a>
 			<a href="profilechange.php">Change E-Mail</a>

		</nav>

  <!-- InstanceEndEditable --></nav>
		<ul>
			<li><a style="float:right; font-size:14px; border:1px; border-style:solid; border-color: #0C8A12; padding: 0.5em; background-color: #78D96C ; color:white;border-radius: 10px;" href="#" role="button" onclick="window.location.href='index.php'">Logout</a></li>
		</ul>
	</div>
</header>  
<link rel="stylesheet" type="text/css" href="assets/header-login-signup.css">
      </div>
                          <div id="mid">
      <!-- Jumbotron --><!-- InstanceBeginEditable name="EditRegion3" -->
      <div class="jumbotron">
        <h1>Payment</h1>
        <p class="lead">
    <?php require "databaseConnection.php";
      $id = $_SESSION["loginID"];
      $salarytype = selectById($id)["salarytype"];
	  
    ?>
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

		<button id="time" onclick = "showForm(this.textContent)">Time</button>
		<button id="sales" onclick = "showForm(this.textContent)">Sales</button>
		<div id="forms"></div>

        </p>
      </div>
	  
 <script>
      var salarytype = "<?php echo $salarytype ?>";
      switch (salarytype) {
        case "commission":
          document.getElementById("time").disabled = true;
          break;
        case "hourly":
          document.getElementById("sales").disabled = true;
          break;
        default:
          document.getElementById("time").disabled = true;
          document.getElementById("sales").disabled = true;
      }
      </script>
      <!-- InstanceEndEditable --><!-- Example row of columns -->
      </div>
      <!-- Site footer -->
      <footer class="footer">
        <p style="font-size:9px">2016 The Company's Company, Inc.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap-3.3.7/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
<!-- InstanceEnd --></html>
