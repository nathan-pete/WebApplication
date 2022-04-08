<?php
	$upload = $_FILES["file"]["name"];
	if (isset($_POST["submitty"])) {
		if (!empty($_FILES["file"]["name"])) {
			$sql = "UPDATE games SET `ProfilePicture` = ? WHERE id=?";
			$data = Query($conn, $sql, "si", $upload, $id);
		} else
			echo "Please select new Profile Picture";
		header("Location:profile.php");
	}
?>
