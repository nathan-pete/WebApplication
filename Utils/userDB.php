<?php

  require_once "./connect.php";

  $query = $conn->prepare("SELECT `userID`,`userName`,`firstName`, `lastName`,`email`, `DoB`, `points`
            FROM users");

  $query->execute();
  $query->bind_result($userID, $userName, $firstname, $lastName, $email, $DoB, $points);
