<?php

  $birthDate = $_POST['dOb'];
  $dateToday = date("Y-m-d");
  $age = date_diff(date_create($birthDate), date_create($dateToday));
  $ageCalc = $age->format('%y');
  if (isset($_POST['submit'])) {

    if ($birthDate == '' or $birthDate >= $dateToday) {
      echo "Please enter a valid date of birth";
    } elseif ($ageCalc <= '10') {
      echo "Must be older than 10 years to register.";
    } elseif ($ageCalc >= '18') {
      echo $ageCalc . " years";
    } else {
      if ($ageCalc == '1') {
        echo $ageCalc . " year";
      } else {
        echo $ageCalc . " years";
      }
    }
  }


?>