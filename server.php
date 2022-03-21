<?php 
// initializing variables
  $username = "";
  $email    = "";
  $phone    = "";
  $errors = array(); 
  $success = array(); 

  // Posting Query
  if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    if (empty($username)) { array_push($errors, "Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($phone)) { array_push($errors, "Phone is required"); }
  
  // Finally, send the query to admin 
  if (count($errors) == 0) {
    array_push($success, "Your query is registered successfully.");
  	$from = "info@ztesting.shouryaacademyedu.com"; // this is your Email address
		//$to = $_POST['email']; // this is the sender's Email address
		$subject = "Thanks For Your Query!!!";
		$message = "Dear,\n\n Greetings From Shourya Academy!\n\n Thanks for posting a query and we are really appreciate to reach out to us.\n\nPlease have a patience, we will get back to you soon.\n\nFor any query please feel free to connect us (cell:+91 9798451257)\n\n\n\n\n\n\n\nCheers\nShourya Academy\nAddress: New Colony, Jharna Tola,\nKunrathat New Kalawati Marriage Hall,\nGorakhpur, Uttar Pradesh";
		$message2 = "Hi,\n\nDear " . $username . " sends some enquiry request------\nPlease connect with the sender. Details are as follows :\n   Email :". $email . "\n   Phone no :" . $phone;
		$headers = 'From: info@ztesting.shouryaacademyedu.com' . "\r\n" . 'Reply-To: info@ztesting.shouryaacademyedu.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		mail($email,$subject,$message, $headers); // sends a copy of the message to the sender
		mail($from,"Incoming Query",$message2);
  	//header('location: index.php');
  }
}
?>