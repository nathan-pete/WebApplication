<?php
$servername = "localhost";
$username = "root";
$password = "admin";

$conn = new mysqli($servername, $username, $password, "webapp1");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?> 