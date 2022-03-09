<?php
	
	require "./database/credentials.php";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
			try {
				$conn = new mysqli($hostname, $username, $password, $database);
				
				$sql = $conn->prepare("INSERT INTO messages (message) VALUES (?);");
				
				$sql->bind_param("s", $message);
				$sql->execute();
				$sql->close();
				
			} catch (Exception $e) {
				echo "Error! " . $e;
			}
		}
	}
