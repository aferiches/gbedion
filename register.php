<?php
session_start();
$firstNameErr = $emailaddressErr = $passwordErr = $agreeErr = "";
?>

<!DOCTYPE html>
<html>
<head>
<title> Adio consulting Group Register </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<script type="text/javascript" src="startAProject2.js"></script>
</head>
<body>

<!--require for the nav var-->
<?php require 'navbar2.php';?>
<div id= "profileupperbody">
<br><br><br>
<div class="form" >
   <h4> Start here </h4> <br>
    <form class="register-form" method="post" name="myForm" action= "registerPost.php" enctype="multipart/form-data" onsubmit="return(validate());">

<span class="error"> <div id="startprojecterror">
<!---- Initializing Session for errors --->
  <?php
 if (!empty($_SESSION['error'])) {
 echo $_SESSION['error'];
 unset($_SESSION['error']);
 }
 ?>
 <br>
 <?php
  if (!empty($_SESSION['imageError'])) {
 echo $_SESSION['imageError'];
 unset($_SESSION['imageError']);
 }
  ?>
 </div></span>
      <h2> Upload Passport</h2> <br>      Select image to upload: <strong>Max file size 500KB </strong>
    <input type="file" name="fileToUpload" id="fileToUpload">
	  <h2> First Name</h2> <br> <input type="text" placeholder="First Name" name="firstName"/>
      <h2>Surname</h2> <br> <input type="text" placeholder="Surname " name="Surname"/>
	<br>
  <h2>Phone Number</h2> <br> <input type="text" placeholder="Phone Number " name="phoneNumber"/>
<br>
<h2>Email Address</h2> <br> <input type="text" placeholder="Email Address " name="emailAddress"/>
<br>

      <button name="submit_button">Submit</button>

	  <!--<p class="message1">Forgot Password? <a href="#">Forgot Password</a></p> -->
    </form>

	</div>

</div>
<?php require 'footer.php';?>
</body>
</html>
