<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<title>Document</title>
</head>
<body>
<h1>Test points</h1>
<h2 id="text">
	<?php
		session_start();
		$_SESSION['userId'];
		$_SESSION['points'] = 5;
		include "./connect.php";
		
		if (isset($_GET['submitT'])) {
			
			if (isset($userID)) {
				
				$query = $conn->prepare("SELECT `points` FROM users WHERE userID = ?");
				
				if (!$query) {
					echo 'Prepare failed' . mysqli_error($conn);
				}
				
				$query->bind_param("i", $userID);
				
				if (!$query) {
					echo 'Binding failed' . mysqli_error($conn);
				}
				
				$query->execute();
				
				if (!$query) {
					echo 'Execute failed' . mysqli_error($conn);
				}
				
				$result = $query->get_result();
				$data = $result->fetch_all(MYSQLI_ASSOC);
				
				$query->close();
				
				$tokenPl = $_SESSION['points'];
				$tokenPl++;
				
				$pushT = $conn->prepare("UPDATE users SET points = ? WHERE userID = ?");
				
				if (!$pushT) {
					echo 'Prepare failed' . mysqli_error($conn);
				}
				
				$pushT->bind_param("ii", $tokenPl, $userID);
				
				if (!$pushT) {
					echo 'Binding failed' . mysqli_error($conn);
				}
				$pushT->execute();
				$pushT->close();
			}
		}
	
	?>
	<?php
		/*foreach($data as $row) {
			$_SESSION['token'] = $row['token'];
			echo 'Received tokens are :' . $_SESSION['token'];
		}*/
	?>
	<!--<form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
            <input type="hidden" name="action" value="delete">-->
	<!--<input type="submit" name="submitT" value="Submit">-->
	<!--</form>-->
</h2>
</body>
</html>
<script>
	let counter = 0;
	let UserId = 11; //change it
	var intervalId = window.setInterval(function () {
		counter++;
		document.getElementById("text").innerHTML = counter;
		$.ajax({
			type: 'POST',
			url: 'point-query.php',
			dataType: "json",
			data: ({
				"userId": UserId,
				"points": counter
			}),
			success: function (data) {
			}
		});
	}, 3000);
</script>
