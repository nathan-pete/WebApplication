<?php
	session_start();
	//session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="./style/style.css">
		<title>Logout</title>
	</head>
	<body>
	<div class="body">
		<?php
			include "header.php";
		?>
        <div class="logout-container">
            <h1>You are now logged out!</h1><br>
            <a href="index.php">Back</a>
        </div>
	</div>
	<?php
		include "footer.html";
	?>
	</body>
</html>
