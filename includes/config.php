<?php
	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Asia/Bangkok");

	//$con = mysqli_connect("localhost", "root", "", "slotify");

	$con = mysqli_connect("us-cdbr-east-03.cleardb.com", "b1c496e6919c3f", "1266051f", "heroku_da1df6b3d9cac50");

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>
