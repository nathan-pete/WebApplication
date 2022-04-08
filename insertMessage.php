<?php
	session_start();

	require "connect.php";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($message = filter_input(INPUT_POST,"message", FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
			try {
				$userID = $_SESSION['userID'];
				global $conn;
				$stmt = mysqli_prepare($conn, "INSERT INTO `comments` (`message`, `userID`) VALUES (?,?)");
				mysqli_stmt_bind_param($stmt, "si", $message, $userID);
				if(mysqli_stmt_execute($stmt)){
				    echo "Data inserted successfully.";
				}
				// else data not inserted
				else{
				    echo "Something going wrong!";
				}
				mysqli_close($conn);



			} catch (Exception $e) {
				echo "Error! " . $e;
			}
		}
	}
