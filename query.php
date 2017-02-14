<?php
	session_start();

	$db = mysqli_connect("localhost", "orhx_web_user1", "orhx_web_user1", "ORHX Sign Ups");
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (isset($_POST['btn'])){
		$fullname = mysqli_real_escape_string($db, $_POST['fullname']);
		
		$email = mysqli_real_escape_string($db, $_POST['email']);

		$tshirt = mysqli_real_escape_string($db, $_POST['tshirt']);

		$gender = mysqli_real_escape_string($db, $_POST['gender']);
		
		$priorinfo = mysqli_real_escape_string($db, $_POST['priorinfo']);
		
		$diet = mysqli_real_escape_string($db, $_POST['diet']);

		$command = "INSERT INTO Data(fullname, email, tshirt, gender, priorinfo, diet) VALUES('$fullname','$email', '$tshirt', '$gender', '$priorinfo', '$diet')";

		if (!mysqli_query($db,$command)) {
  			die('Error: ' . mysqli_error($db));
		}
		echo "1 record added";

		mysqli_close($db);
		$_SESSION['message'] = "Thanks for the submission!";

	}
?>