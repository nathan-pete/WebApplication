<?php

	require "connect.php";
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$messages = [];

		try {
			$conn = new mysqli ($servername, $username, $password, "webapp");

			$sql = $conn->prepare("SELECT `message`, `users`.`userName` FROM `comments` JOIN `users` where users.userID = comments.userID;");

			$sql->execute();
			$sql->bind_result($message, $userNameOut );

			while ($sql->fetch()) {
				$messages[] = $message;
			}

			$sql->close();
		} catch (Exception $e) {
			echo "Error! " . $e;
		}

		foreach ($messages as $txt) {
			echo "<p>" .$userNameOut.": ". $txt . "</p>";
		}


	}
