<?php

  require_once "./connect.php";

  $query = $conn->prepare("SELECT `userID`,`userName`, `email`,  `points`, `firstName`, `lastName`, `DoB` 
            FROM users WHERE userID = 13");

  $query->execute();
  $query->bind_result($userID, $userName, $email, $points, $firstName, $lastName, $DoB);
  $query->fetch();
