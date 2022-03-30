<?php

  require_once "./connect.php";


  $query = "SELECT `userID`,`userName`, `email`,  `points`, `firstName`, `lastName`, `DoB`
            FROM users WHERE userID = ?";
  if ($stmt = mysqli_prepare($conn, $query)) {
    mysqli_stmt_bind_param($stmt, "i", $userID);
    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_bind_result($stmt, $userID, $userName, $email, $points, $firstName, $lastName, $DoB);
      mysqli_stmt_store_result($stmt);
      mysqli_stmt_fetch($stmt);
    } else {
      echo "Error executing query" . mysqli_error($conn);
    }
  } else {
    echo "Error preparing" . mysqli_error($conn);
  }
