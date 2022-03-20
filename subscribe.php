<?php
	include('connection.php');
	$email = "";
	$errors = array(); 
	$table = "subscribe";
	//echo isset($_POST["subscribe"]);
	if (isset($_POST["subscribe"])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		//echo $email;
		if (empty($email)) {
			array_push($errors, "Email is required"); 
		}
		else{
			$user_check_query = "SELECT * FROM t_subscribe WHERE email='$email' LIMIT 1";
			//echo $user_check_query;
			$result = mysqli_query($db, $user_check_query);
			$user = mysqli_fetch_assoc($result);
			//var_dump($user['email']);
			if ($user) { // if user exists
				if ($user['email'] === $email) {
					array_push($errors, "You have already subscribed");
				}
			}
			//echo count($errors);
			if (count($errors) == 0) {
				$query = "INSERT INTO t_subscribe (email) VALUES('$email')";
				//echo $query;
				$t = mysqli_query($db, $query);
				//echo $t;
				if($t){
					echo "Successful....";
					$from = "info@ztesting.shouryaacademyedu.com"; // this is your Email address
					$to = $_POST['email']; // this is the sender's Email address
					$subject = "Form Submission Confirmation";
					$message = "Dear,\n\n Greetings From Shourya Academy!\n\n Thanks for subscribing us and we are really appreciate to reach out to us.\n\nPlease have a patience, we will get back to you soon.\n\nFor any query please feel free to connect us (cell:+91 9798451257)\n\n\n\n\n\n\n\nCheers\nShourya Academy\nAddress: New Colony, Jharna Tola,\nKunrathat New Kalawati Marriage Hall,\nGorakhpur, Uttar Pradesh";
					$message2 = "Hi,\n" . $_POST['email'] . "  sends some enquiry request------\nPlease connect with the sender.";
					$headers = 'From: info@ztesting.shouryaacademyedu.com' . "\r\n" . 'Reply-To: info@ztesting.shouryaacademyedu.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
					
					mail($to,$subject,$message, $headers); // sends a copy of the message to the sender
					mail($from,$subject,$message2);
				}
			}	
		}	
	}
	

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Shourya Academy | Subscribe</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
body {
font-family: 'Varela Round', sans-serif;
}
.modal-confirm {
color: #636363;
width: 325px;
}
.modal-confirm .modal-content {
padding: 20px;
border-radius: 5px;
border: none;
}
.modal-confirm .modal-header {
border-bottom: none;
position: relative;
}
.modal-confirm h4 {
text-align: center;
font-size: 26px;
margin: 30px 0 -15px;
}
.modal-confirm .form-control, .modal-confirm .btn {
min-height: 40px;
border-radius: 3px;
}
.modal-confirm .close {
position: absolute;
top: -5px;
right: -5px;
}
.modal-confirm .modal-footer {
border: none;
text-align: center;
border-radius: 5px;
font-size: 13px;
}
.modal-confirm .icon-box {
color: #fff;
position: absolute;
margin: 0 auto;
left: 0;
right: 0;
top: -70px;
width: 95px;
height: 95px;
border-radius: 50%;
z-index: 9;
background: #82ce34;
padding: 15px;
text-align: center;
box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-confirm .icon-box i {
font-size: 58px;
position: relative;
top: 3px;
}
.modal-confirm.modal-dialog {
margin-top: 80px;
}
.modal-confirm .btn {
color: #fff;
border-radius: 4px;
background: #82ce34;
text-decoration: none;
transition: all 0.4s;
line-height: normal;
border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
background: #6fb32b;
/* outline: none; */
}
.trigger-btn {
/* display: inline-block; */
margin: 100px auto;
}
</style>
</head>
<body>
	<div class="text-center">
		<!-- Button HTML (to Trigger Modal) -->
		<!-- <a href="#" class="trigger-btn" data-toggle="modal">Click to Open Confirm Modal</a> -->
	</div>
	<!-- Modal HTML -->
	<div id="myModal" class="">
		<div class="modal-dialog modal-confirm">
			<div class="modal-content">
				<div class="modal-header">
					<div class="icon-box">
						<i class="material-icons">&#xE876;</i>
					</div>
					<h4 class="modal-title">Awesome!</h4>
				</div>
				<div class="modal-body">
					<p class="text-center">Thanks for subscribing us! We will reach out to you soon.</p>
				</div>
				<div class="modal-footer">
					<a href="index.html"><button class="btn btn-success btn-block">OK</button></a>
				</div>
			</div>
		</div>
	</div>
</body>
</html> 