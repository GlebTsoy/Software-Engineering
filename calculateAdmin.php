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
      $table = 'commissionemp';
      $array = array("number_of_contracts"=>0);
      send($emps, $table, $array);
      $emps2 = getSalaries("fixed");
      $table = 'fixedemp';
      send($emps2, $table, $array);
    }
    elseif($day_of_the_week == "Friday" and $day_of_the_month!=$last_day){
      $emps = getSalaries("hourly");
      $table = 'hourlyemp';
      $array = array("hours"=>0);
      send($emps, $table, $array);
      }
    else{
      echo "Not a payday";
    }

    function send($emps, $table, $array){
      foreach ($emps as $emp) {
        sendMail($emp);
<<<<<<< HEAD
        setSalary($emp["id"], 0, $table);
        setNumber($emp['id'], $table, $array);
=======
>>>>>>> origin/master
      }
    }
  ?>
</body>
</html>
