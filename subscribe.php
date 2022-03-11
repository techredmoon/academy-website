<?php
	include('connection.php');
	$email = "";
	$errors = array(); 
	$table = "subscribe";
	echo isset($_POST["subscribe"]);
	if (isset($_POST["subscribe"])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		echo $email;
		if (empty($email)) {
			array_push($errors, "Email is required"); 
		}
		else{
			$user_check_query = "SELECT * FROM t_subscribe WHERE email='$email' LIMIT 1";
			echo $user_check_query;
			$result = mysqli_query($db, $user_check_query);
			$user = mysqli_fetch_assoc($result);
			//var_dump($user['email']);
			if ($user) { // if user exists
				if ($user['email'] === $email) {
					array_push($errors, "You have already subscribed");
				}
			}
			echo count($errors);
			if (count($errors) == 0) {
				$query = "INSERT INTO t_subscribe (email) VALUES('$email')";
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
					//mail($to,$subject,$message2);
					mail($to,$subject,$message,$headers); // sends a copy of the message to the sender
					//echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
				}
			}	
		}	
	}
	

?>