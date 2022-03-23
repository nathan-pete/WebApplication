<?php
	
	require "dbh.php";
	session_start();

	/*
	$ipAddress = "192.168.137.12";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		foreach ($_POST as $postRequest) {
			if (isset($postRequest)) {
				$url = curl_init("http://" . $ipAddress . "/" . $postRequest);
				curl_exec($url);
				curl_close($url);
				echo $postRequest;
			}
		}
	}
	*/
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$messages = [];
		
		try {
			$conn = new mysqli ($servername, $username, $password, $dbname);
			
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
			echo "<p>".	$_SESSION['User'].": ". $txt . "</p>"; 
		}


	}