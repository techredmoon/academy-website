<?php
	include('connection.php');
	$subscribed = false;
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
			$user_check_query = "SELECT * FROM subscribe WHERE email='$email' LIMIT 1";
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
				$query = "INSERT INTO subscribe (email) VALUES('$email')";
				#echo $query;
				$t = mysqli_query($db, $query);
				#echo $t;
				if($t){
					$from = "info@shouryaacademyedu.com/"; // this is your Email address
					$to = $_POST['email']; // this is the sender's Email address
					$subject = "Form Submission Confirmation";
					//$subject2 = "Copy of your form submission";
					$message = "Hi,\n\n Greetings From Shourya Academy\n\n Thanks for your subprition and we appericiate you to reach out us.\n\nWe will get back to you soon.\n\n\n\n\n\n\n\n\n\nCheers\nShourya Academy\n\nFor any query please feel free to connect us (cell:+91 9798451257)";
					//$message2 = "Hi,\n" . $_POST['email'] . "  sends some request------\n" . $_POST['message'];
					$headers = "Shourya Academy:".$from;
					$headers2 = "From:" . $to;
					$headers = "From:" . $from;
					$headers = "From: Shourya Academy info@shouryaacademyedu.com";
					mail($to,$subject,$message);
					//mail($to,$subject,$message,$headers); // sends a copy of the message to the sender
					//echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
					$subscribed = true;
				}
			}
			else{
				$subscribed = false;
			}	
		}	
	}
	

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shourya Academy | Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">

	<link rel="stylesheet" href="css/sastyle.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/sastyle.css">
	<link rel="stylesheet" href="css/mystyle.css">
  </head>
  <body>

<!-- ##################################################################################### -->
<div class="popup"> 
		<a href="index.html" class="close">
			<svg onclick="closePopup()" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
				x="0px" y="0px" width="10px" height="10px" viewBox="215.186 215.671 80.802 80.8"
				enable-background="new 215.186 215.671 80.802 80.8" xml:space="preserve">
				<polygon fill="#FFFFFF" points="280.486,296.466 255.586,271.566 230.686,296.471 215.19,280.964 240.086,256.066 215.186,231.17 
				230.69,215.674 255.586,240.566 280.475,215.671 295.985,231.169 271.089,256.064 295.987,280.96 "
				/>
		   </svg>
		</a>
	
		<div class="valid">
			<svg version="1.1" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
				x="0px" y="0px" width="15px" height="15px" viewBox="222.744 227.408 67.744 58.526"
				enable-background="new 222.744 227.408 67.744 58.526" xml:space="preserve">
				<path fill="#39BA6F" d="M250.062,285.934c-9.435-11.111-15.731-18.195-27.318-28.935l5.793-5.357
				c6.778,3.28,11.076,5.774,18.693,11.204c14.32-16.25,23.783-24.495,41.372-35.438l1.886,4.335
				C275.983,244.402,265.359,258.502,250.062,285.934z" />
			X</svg>
		</div>
		 <h1 id="subh">Welcome!</h1>
		<?php 
			if($subscribed){
				echo '<p id="subp">Thanks For Subscribe Us!</p>';
			}

			else{
				echo '<p id="subp">Something went wrong. Please try again!</p>';
			}
		?>
		<!-- <div class="bottom-popup"><a class="start" href="#">START</a> -->
	
		</div>
	</div>

	<!-- #################################################################################### -->
	<script src="scripts/myscript.js"></script>  
</body>
</html>