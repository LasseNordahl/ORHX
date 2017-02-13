<?php
	session_start();

	$db = mysqli_connect("127.0.0.1", "root", "", "authentication");
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (isset($_POST['btn'])){
		$username = mysqli_real_escape_string($db, $_POST['username']);
		
		$email = mysqli_real_escape_string($db, $_POST['email']);

		$pass = mysqli_real_escape_string($db, $_POST['pass']);

		$id = mysqli_real_escape_string($db, $_POST['id']);

		$command = "INSERT INTO users(username, email, pass, id) VALUES('$username','$email', '$pass', '$id')";

		if (!mysqli_query($db,$command)) {
  			die('Error: ' . mysqli_error($db));
		}
		echo "1 record added";

		mysqli_close($db);
		$_SESSION['message'] = "Thanks for the submission!";

	}
?>