<?php
	session_start();

	$db = mysqli_connect("localhost", "root", "", "ORHX Sign Ups");
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
		mysqli_close($db);

	}
?>

<!doctype html>
<script src="https://use.fontawesome.com/11d46c1bf8.js"></script>

<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
		<link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<link href="https://cdn.muicss.com/mui-0.9.9-rc2/css/mui.min.css" rel="stylesheet" type="text/css" />
		<script src="https://cdn.muicss.com/mui-0.9.9-rc2/js/mui.min.js"></script>

		<script type="text/javascript">
			$(function () {
				$("#gender, #priorinfo, #email, #fullname, #tshirt").bind("change keyup",
		function () {      
			if ($("#gender").val() != "" && $("#priorinfo").val() != "" && $("#email").val().includes("@") && $("#fullname").val() != "" && $("#tshirt").val() != "" && $("#email").val().substr(0,$("#email").val().indexOf('@'))!="" && $("#email").val().split('@')[0] != "" && $("#email").val().split('@')[1] != "")
				$(this).closest("form").find(":submit").removeAttr("disabled");
			else
				$(this).closest("form").find(":submit").attr("disabled", "disabled");      
			});
				});
		</script>

		
		
		<title>ORHX</title>
		<style>
			/* The Modal (background) */
			.modalDialog {
				position: fixed;
				font-family: Arial, Helvetica, sans-serif;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				background: rgba(0,0,0,0.8);
				z-index: 99999;
				opacity:0;
				-webkit-transition: opacity 400ms ease-in;
				-moz-transition: opacity 400ms ease-in;
				transition: opacity 400ms ease-in;
				pointer-events: none;
			}
			.modalDialog:target {
				opacity:1;
				pointer-events: auto;
			}
			
			.modalDialog > div {
				width: 400px;
				position: relative;
				margin: 10% auto;
				padding: 5px 20px 13px 20px;
				border-radius: 10px;
				background: #fff;
				background: -moz-linear-gradient(#fff, #999);
				background: -webkit-linear-gradient(#fff, #999);
				background: -o-linear-gradient(#fff, #999);
			}
			.close {
				background: #606061;
				color: #FFFFFF;
				line-height: 25px;
				position: absolute;
				right: -12px;
				text-align: center;
				top: -10px;
				width: 24px;
				text-decoration: none;
				font-weight: bold;
				-webkit-border-radius: 12px;
				-moz-border-radius: 12px;
				border-radius: 12px;
				-moz-box-shadow: 1px 1px 3px #000;
				-webkit-box-shadow: 1px 1px 3px #000;
				box-shadow: 1px 1px 3px #000;
			}
			
			.close:hover { background: #00d9ff; }
		</style>

	</head>
	<body class="submit">

		<div class="mui-row">
			<div class="mui-col-md-1">
				<a href="javascript:history.go(-1)">
					<button class="mui-btn mui-btn--fab mui-btn--primary button-footer-hover"	style="display:block; margin-top:15px !important; margin-left:1px !important;" onClick="goBack()">
						<i class="fa fa-arrow-left button-footer-hover fa-lg"  aria-hidden="true"></i>
					</button>
				</a>
			</div>
			<div class="mui-col-md-9"></div>
		</div>
		<iframe name="votar" style="display:none;"></iframe>
		<form class="mui-form" method="post" action="signup.php" target="votar">

			<div class="mui-col-md-3"></div>
			<div class="mui-col-md-6">
				<h1 style="text-align: center; font-family: Raleway; margin-bottom:3%;"> ORHX Sign Ups </h1>

					<div class="mui-textfield mui-textfield--float-label">
						<input class="dark-input" type="text" name = "fullname" id="fullname">
						<label class="dark-input">Name*</label>
					</div>

					<div class="mui-textfield mui-textfield--float-label">
						<input class="dark-input" type="email" name="email" id="email">
						<label class="dark-input" >Email*</label>
					</div>

					<div class="mui-select">
						<select class="dark-input" name="priorinfo" id="priorinfo">
							<option> </option>
							<option>Yes</option>
							<option>No</option>
						</select>
						<label class="dark-input input-size">Is this your first hackathon?*</label>
					</div>

					<div class="mui-select">
						<select name="gender" id="gender">
							<option> </option>
							<option>Male</option>
							<option>Female</option>
							<option>Prefer not to answer</option>
						</select>
						<label class="dark-input input-size">Gender*</label>
					</div>

					<div class="mui-select">
						<select name="tshirt" id="tshirt">
							<option> </option>
							<option>Small</option>
							<option>Medium</option>
							<option>Large</option>
							<option>X-Large</option>
						</select>
						<label class="dark-input input-size">T-Shirt Size*</label>
					</div>

					<div class="mui-textfield mui-textfield--float-label">
						<textarea class="dark-input" name="diet"></textarea>
						<label class="dark-input input-size">Dietary Restrictions</label>
					</div>

					<button id="myBtn" class="mui-btn mui-btn--raised mui-btn--primary" style="align: center;" type="submit" name = "btn" disabled="disabled" >Submit</button>

				</div>
		    <div class="mui-col-md-3"></div>
	  	</div


		</form>

		<!-- The Modal -->
		<div id="openModal" class="modalDialog">
			<!-- Modal content -->
			<div>
				<a  href="index.html" title="Close" class="close">X</a>
				<p>Thank you for submitting your application, we will get back to you as soon as possible</p>
			</div>
		</div>
		<script>
			var btn = document.getElementById("myBtn");
			btn.onclick = function() {
				location.href = "#openModal";
			};

		</script>

	</body>
</html>
