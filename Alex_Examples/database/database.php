<?php
	require "./credentials.php";
	function connectDB()
	{
		if ($DB = mysqli_connect($hostname, $username, $password, $database)) {
			return $DB;
		}
	}
