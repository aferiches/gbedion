
<?php
include ('registration2.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profileAdmin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Adio Admin Login </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<script type="text/javascript" src="loginform.js"></script>
</head>
<body>

<!--require for the nav var-->
<?php require 'navbar2.php';?>


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
    </form>
 </div>
</div>


<!-- require page footer-->
<?php require 'footer.php';?>

</body>

</html>
