<?php
	require "connect.php";
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$messages = [];
		try {
			$conn = new mysqli ($servername, $username, $password, "webapp");

			$sql = $conn->prepare("SELECT `message`, `users`.`userName` FROM `comments` JOIN `users` where users.userID = comments.userID ORDER BY users.userName");

			$sql->execute();
			$sql->bind_result($message, $userNameOut);

			$i = 1000;
			while ($sql->fetch()) {
				$messages += [$userNameOut . $i => $message];
				$i++;
			}

			$sql->close();
		} catch (Exception $e) {
			echo "Error! " . $e;
		}

		foreach ($messages as $userName => $txt) {
			echo "<b><p>" . substr($userName, 0, -4) . ":</b> " . $txt . "</p>";
		}


	}
