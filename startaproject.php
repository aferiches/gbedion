<?php
include('session.php');
$fullnameErr = $emailaddressErr = $passwordErr = $agreeErr = "";
?>

<!DOCTYPE html>
<html>
<head>
<title> Start a Project | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<script type="text/javascript" src="startAProject.js"></script>
</head>
<body>

<!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>
<div id= "profileupperbody">
<br><br><br>
<div class="form" >
   <h4> Start here </h4> <br>
    <form class="register-form" method="post" name="myForm" action= "personalDetailForm.php" enctype="multipart/form-data" onsubmit="return(validate());">

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
      <h2> Project Image</h2> <br>      Select image to upload: <strong>Max file size 500KB </strong>
    <input type="file" name="fileToUpload" id="fileToUpload">
	  <h2> Project Title</h2> <br> <input type="text" placeholder="project title" name="projecttitle"/>
      <h2> Project Created By</h2> <br> <input type="text" placeholder="project created by " name="projectcreated"/>
	  <h2> Project Category</h2> <br>
	  <select name="projectcategory">
    <option value="choose">Choose category</option>
    <option value="art-and-photography">Art and Photography</option>
	<option value="crafts">Crafts</option>
	<option value="dance">Dance</option>
	<option value="design">Design</option>
	<option value="events">Events</option>
	<option value="fashion">Fashion</option>
	<option value="film-and-video">Film and Video</option>
	<option value="games">Games</option>
	<option value="journalism">Journalism</option>
	<option value="music">Music</option>
	<option value="publishing">Publishing</option>
	<option value="technology">Technology</option>
	<option value="sport">Sport</option>
	</select>
	<br>
	<br>
	   <h2> Project Country</h2> <br>
	   <select name="projectcountry">
	   <option value="choose">Choose country</option>
    <option value="nigeria">Nigeria</option>
	</select>
	<br>
	<br>
	<h2> Project Details</h2> <br>
	   <textarea rows="4" cols="31" name="projectdetails" placeholder = "Your project details summarized">
</textarea>
<br>
<br>
	   <h2> Funding duration  </h2>
	   <br>
	   <input type="radio" id= "style" name="fundTime" value="30"> <label for = "style">30 Days </label>

	   <input type="radio" id= "stylee" name="fundTime" value="45"> <label for = "stylee">45 Days </label>

	   <input type="radio" id= "styleee" name="fundTime" value="60"> <label for = "styleee">60 Days </label>
	   <br>
	   <br>
		<h2> Funding Goal</h2> <br>
	   <input type="text" placeholder="Funding Goal (currency is Naira) " name="fundinggoal"/>
      <button name="signup_button">Save and continue</button>

	  <!--<p class="message1">Forgot Password? <a href="#">Forgot Password</a></p> -->
    </form>

	</div>

</div>
<?php require 'logged-in-footer.php';?>
</body>
</html>
