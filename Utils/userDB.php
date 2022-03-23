<?php

  require_once "./connect.php";

  $query = $conn->prepare("SELECT `userName`,`firstName`, `lastName`,`email`, `DoB`, `points`
            FROM users");

  $query->execute();
  $query->bind_result($userName, $firstname, $lastName, $email, $DoB, $points);
