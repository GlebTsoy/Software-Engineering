<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <?php
    require "databaseConnection.php";
    require "mail.php";
    $day_of_the_month = date("l");
    $day_of_the_week = date("D");
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
      $emps = getSalaries("commission");
      $emps2 = getSalaries("fixed");
      $emps3 = getSalaries("hourly");
    }

    function send($emps){
      foreach ($emps as $emp) {
        sendMail($array);
      }
    }
  ?>
</body>
</html>
