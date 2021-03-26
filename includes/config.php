<?php
	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Asia/Bangkok");

	//$con = mysqli_connect("localhost", "root", "", "slotify");

	$con = mysqli_connect("us-cdbr-east-03.cleardb.com", "b86ee8b785f9c5", "bc878095", "heroku_053062795ec22b7");

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>
