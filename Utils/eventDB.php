<?php
  require_once "./connect.php";


  $query = "SELECT `name`, `picture`,`descrption` FROM games";
  if ($stmt = mysqli_prepare($conn, $query)) {
    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_bind_result($stmt, $name, $picture, $description);
      mysqli_stmt_store_result($stmt);
      mysqli_stmt_fetch($stmt);
    } else {
      echo "Error executing query" . mysqli_error($conn);
    }
  } else {
    echo "Error preparing" . mysqli_error($conn);
  }
