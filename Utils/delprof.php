<?php
  require "./connect.php";
  require "./userDB.php";
  $deleteusr = $_GET['userID'];
  $sql = "DELETE FROM users WHERE userID = '$userID'";

  if ($conn->query($sql) === TRUE) {
    header("location: index.php");

  } else {

    echo "Error deleting record: " . $conn->error;
  }

  $conn->close();


