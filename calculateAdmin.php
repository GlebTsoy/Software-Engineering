<!DOCTYPE html>
<html>
<head>

<meta http-equiv="refresh" content="0; url=employee.php" />
</head>
<body>
  <?php
    require_once "databaseConnection.php";
    require "mail.php";
    $day_of_the_month = date("d");
	echo $day_of_the_month;
    $day_of_the_week = date("l");
	echo $day_of_the_week;
    $last_day = date("t");
    if ($day_of_the_month == $last_day && $day_of_the_week!="Friday"){
      $emps = getSalaries("commission");
      send($emps);
      $emps2 = getSalaries("fixed");
      send($emps2);
    }
    elseif($day_of_the_week == "Friday" and $day_of_the_month!=$last_day){
      $emps = getSalaries("hourly");
      send($emps);
    }
    else{
      echo "Not a payday";
    }

    function send($emps){
      foreach ($emps as $emp) {
        sendMail($emp);
      }
    }
  ?>
</body>
</html>
