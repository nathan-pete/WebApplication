<?php
  require_once "./connect.php";

  $query = $conn->prepare("SELECT `name`, `picture`,`descrption`
            FROM games");

  $query->execute();
  $query->bind_result($name, $picture, $description);
