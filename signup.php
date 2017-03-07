
<?php
include('signup-registration.php'); // Includes Login Script 

if(isset($_SESSION['login_user'])){
header("location: profile.php");
} 
?>

<!DOCTYPE html>
<html>
<head>
<title> Sign Up | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
</head>
<body> 

<!--require for the nav var-->
<?php require 'navbar.php';?>

<!--login code -->
<div class="login-page">
  <div class="form" >
   <h2> Sign Up </h2> <br>
    <form class="register-form" method="post" action= "">
<span class="error"> <?php echo $fullnameErr;?><br> <?php echo $emailaddressErr;?> 
	 <br> <?php echo $passwordErr;?> <br> <?php echo $agreeErr;?></span> 	
      <input type="text" placeholder="full name" name="fullname"/>
	  <input type="text" placeholder="email address" name="emailaddress"/>
      <input type="password" placeholder="password" name="password"/>
	  <input type="radio" id= "style" name="agree" value="terms-of-use"> Agree to terms of use 
      <button name="signup_button">Sign up</button>
	   <p class="message">Already registered? <a href="#">Login In</a></p> 
	  <!--<p class="message1">Forgot Password? <a href="#">Forgot Password</a></p> -->
    </form>
	
	</div>
	</div>


<!-- page footer-->
<?php require 'footer.php';?>
</body>

</html>