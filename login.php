
<?php
include ('registration.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Log in | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<script type="text/javascript" src="loginform.js"></script>
</head>
<body>

<!--require for the nav var-->
<?php require 'navbar.php';?>


<!--login code -->
<div class="login-page">
  <div class="form">
  <h2> Log In </h2> <br> <br>
  <span class="error"> <?php echo $error; ?> </span>
  <!-- the form method and action need to be added-->
    <form class="register-form" name="myForm" method="post" action="" onsubmit="return(validate());">
      <input type="text" placeholder="email" name= "username"/>
      <input type="password" placeholder="password" name="password" />
      <button name="submit">log in</button>
	   <p class="message">Not registered? <a href="#">Create an account</a></p>
	  <p class="message1">Forgot Password? <a href="#">Forgot Password</a></p>
    </form>
 </div>
</div>


<!-- require page footer-->
<?php require 'footer.php';?>

</body>

</html>
