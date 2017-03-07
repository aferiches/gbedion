<?php
include('session_new.php');
?>
<!DOCTYPE html>
<html>
<head>
<title> Edit Profile | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
</head>
<body>

<!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>

<div id= "upperbodyproject">
  <a href="startaproject.php">Edit Project Summary</a> <br>
  <a href="personalDetailForm.php">Edit Project Details</a><br>
  <a href="projectUploadDetails.php">Edit Project Upload and Details</a><br>
  <a href="rewardForm.php">Edit Reward</a><br>
  <a href="bankDetailsForm.php">Edit Bank Details</a>

</div>


<!-- page footer-->
<?php require 'footer.php';?>
</body>

</html>
