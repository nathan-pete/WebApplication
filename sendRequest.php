<?php

	require "connect.php";
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$messages = [];

		try {
			$conn = new mysqli ($servername, $username, $password, "webapp");

			$sql = $conn->prepare("SELECT message FROM comments");

			$sql->execute();
			$sql->bind_result($message);

			while ($sql->fetch()) {
				$messages[] = $message;
			}

			$sql->close();
		} catch (Exception $e) {
			echo "Error! " . $e;
		}

		foreach ($messages as $txt) {
			echo "<p>" . $_SESSION ['userName'].": ". $txt . "</p>";
		}


	}
