<?php
  require_once "./connect.php";

  $query = $conn->prepare("SELECT `name`, `picture`
            FROM games");

  $query->execute();
  $query->bind_result($name, $picture);
