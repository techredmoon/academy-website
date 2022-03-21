<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
      * {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.icon-bar {
  position: fixed;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
.tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: dodgerblue;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  
  left: 105%;
}
.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 20px;
}

.icon-bar a:hover .tooltiptext{
  background-color: #000;
  visibility: visible;
}

.facebook {
  background: #3B5998;
  color: white;
}

.twitter {
  background: #55ACEE;
  color: white;
}

.instagram {
  background: #dd4b39;
  color: white;
}

.linkedin {
  background: #007bb5;
  color: white;
}

.youtube {
  background: #bb0000;
  color: white;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
form, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background: white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
    width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #6CBB3C; 
  color: #3c763d; 
  background: #6CBB3C; 
  border-radius: 5px; 
  text-align: left;
  /* color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px; */
}

#register{
    margin-bottom: 30px;
}

  </style>
</head>
<body>

<div class="icon-bar">
  <a href="index.html" class="facebook"><i class="fa fa-home"></i><span class="tooltiptext">Home</span></a> 
  <a href="https://twitter.com/AcademyShourya/" class="twitter"><i class="fa fa-twitter"></i><span class="tooltiptext">Twitter</span></a> 
  <a href="https://www.facebook.com/academyshourya/" class="facebook"><i class="fa fa-facebook"></i><span class="tooltiptext">Facebook</span></a> 
  <a href="https://www.instagram.com/academyshourya/" class="instagram"><i class="fa fa-instagram"></i><span class="tooltiptext">Instagram</span></a>
  <a href="https://www.linkedin.com/in/academyshourya" class="linkedin"><i class="fa fa-linkedin"></i><span class="tooltiptext">Linkedin</span></a>
  <a href="https://www.youtube.com/channel/UCQwP16OqjbiQjtVmRzqH6cg" class="youtube"><i class="fa fa-youtube"></i><span class="tooltiptext">Youtube</span></a> 
</div>
<div id="register">
    <div class="header">
  	    <h2>Post a Query</h2>
    </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Student Name</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
      </div>

      <div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="text" name="phone" value="<?php echo $email; ?>">
      </div>
    <div class="input-group">
  	  <label>Your Class</label>
  	  <input type="text" name="class" value="<?php echo $email; ?>">
  	</div>
  	<!-- <div class="input-group">
  	  <label>Query</label>
  	  <input type="text" name="password_1">
  	</div> -->
  	<div class="input-group">
  	  <label>Query</label>
        <textarea name="password_2" id="" cols="52" rows="10"></textarea>
  	  <!-- <input type="password" name="password_2"> -->
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</div>
</body>
</html>