<?php
	session_start();

	require "connect.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($message = filter_input(INPUT_POST,"message", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
			try {
				$userID = $_SESSION['userID'];
				global $conn;
				$sql = $conn->prepare("INSERT INTO `comments` (`message`, `userID`) VALUES (?,?)");
				$sql->bind_param("si", $message, $userID);
				$sql->execute();
				$sql->close();



			} catch (Exception $e) {
				echo "Error! " . $e;
			}
		}
	}
