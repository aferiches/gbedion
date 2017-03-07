<?php
include('session_new.php');

// Checking third page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['projectdetails2'])){
 if (empty($_POST['projectdetails2'])){
// || empty($_POST['fileToUpload3']))

 // Setting error message
 $_SESSION['error_page3'] = " Please fill all fields to continue";
 header("location: projectUploadDetails.php"); // Redirecting to former page
 }
  else {
 // sanitizing values
 //$fileToUpload3 = $_POST['fileToUpload3'];
 $projectdetails2 = $_POST['projectdetails2'];
 $projectdetails2=stripslashes($projectdetails2);
$_SESSION['projectdetails2']=mysqli_real_escape_string($connection,$projectdetails2);
 }
}
 else {
 if (empty($_SESSION['error_page4'])) {
 header("location: startaproject.php");//redirecting to first page
 }
}
?>

<!-- video upload code-->
<?php
if(isset($_FILES['fileToUpload3'])){
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload3"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
}
// Check if video file is a actual video or fake video
if(isset($_POST["signup_button"])) {
	if ($_FILES["fileToUpload3"]["tmp_name"] == "") {
	$_SESSION['imageError3'] = "Please add your video to continue";
	header("location: startaproject.php");
	}
//}
//}

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['imageError3'] =  "Sorry, file already exists.";
    $uploadOk = 0;
}

 // Check file size
if ($_FILES["fileToUpload3"]["size"] > 2000000) {
    $_SESSION['imageError3'] =  "Sorry, your file is too large, 2mb and below.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "mov" && $imageFileType != "avi" && $imageFileType != "mp4"
&& $imageFileType != "wmv" ) {
    $_SESSION['imageError3'] =  "Sorry, only mp4, avi, mov & wmv files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   // $_SESSION['imageError'] = "Sorry, your file was not uploaded.";
	 header("location: startaproject.php");//redirecting to first page
// if everything is ok, try to upload file
} else {
	$url = "http://gbedion/";
	$TargetPath=$url.$target_file;
	/*$TargetPath=time().$target_file; */
    if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
		 // Write Mysql Query Here to insert this $QueryInsertFile
		$QueryInsertFile="INSERT INTO fullprojectdetails SET fileToUpload2='$TargetPath'";
		$_SESSION['fileToUpload3']= $TargetPath;
        echo "The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

?>


<!DOCTYPE html>
<html>
<head>
<title> Reward | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<!-- jquery link from google api -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- jquery for dynamic reward form -->
<script>
$(document).ready(function(){
    $("#hide").click(function(){
        $(".form").hide();
    });
    $("#show").click(function(){
    $("#formHelp").append(' <form class="register-form" method="post" name="myForm" action= "bankDetailsForm.php" enctype="multipart/form-data" onsubmit="return(validate());">');
	$("#formHelp").append(' <span class="error"> <div id="startprojecterror"> </div></span><br><br><br><br><h2><strong> Reward </strong></h2><br> <br><br><h2> Title</h2> <br> <input type="text" placeholder="title" name="title[]"/>');
	$("#formHelp").append(' <h2> Pledge Amount</h2> <br> <input type="text" placeholder="pledge amount " name="pledgeAmount[]"/>');
	$("#formHelp").append(' <br><br><h2> Description</h2> <br> <textarea rows="4" cols="31" name="description[]" placeholder = "Reward Description"></textarea><br><br>');
	$("#formHelp").append(' <h2> Estimated Delivery Time</h2> <br><select name="deliverytime[]"><option value="selectMonth">Select Month</option><option value="january">January</option><option value="february">February</option><option value="march">March</option><option value="april">April</option><option value="may">May</option><option value="june">June</option><option value="july">July</option><option value="august">August</option><option value="september">September</option><option value="october">October</option><option value="november">November</option><option value="december">December</option></select><br><br>');
	$("#formHelp").append('  <select name="deliveryyear[]"><option value="selectYear">Select Year</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option></select><br><br>');
	$("#formHelp").append(' <h2> Shipping details</h2> <br><select name="shippingdetails[]"><option value="selectAnOption">Select an option</option><option value="No Shipping Involved">No Shipping Involved</option><option value="Only Shipping to Certain States">Only Shipping to Certain States</option><option value="Shipping to All States">Shipping to All States</option></select><br><br>');
	$("#formHelp").append(' <h2> Number available</h2> <br> <input type="text" placeholder="How many of this reward is available " name="reward1No[]"/>');
	$("#formHelp").append(' </form>');
    });
});
</script>


</head>
<body>

<!--require for the nav var-->
<?php require 'navbar.php';?>

<!--<div id= "upperbody"> &nsbp  -->


<!--<button id="hide">Hide</button> -->
<p id ="showWrapper"><button id="show">ADD NEW REWARD</button> (Another reward form will be added below once this button is clicked) </p>

<div id= "profileupperbody">
<!-- </div> -->
<div class="form" >
   <h4> Start here </h4> <br>
    <form class="register-form" method="post" name="myForm" action= "bankDetailsForm.php" enctype="multipart/form-data" onsubmit="return(validate());">
	  <span id ="formHelp">
<span class="error"> <div id="startprojecterror">
<!---- Initializing Session for errors --->
  <?php
 if (!empty($_SESSION['error_page4'])) {
 echo $_SESSION['error_page4'];
 unset($_SESSION['error_page4']);
 }
  ?>
      <br>
 <?php
  if (!empty($_SESSION['imageError4'])) {
 echo $_SESSION['imageError4'];
 unset($_SESSION['imageError4']);
 }
  ?>
 </div></span>
<h2> Reward 1 </h2>
	<br> <br><br>
	  <h2> Title</h2> <br> <input type="text" placeholder="title" name="title[]"/>
      <h2> Pledge Amount</h2> <br> <input type="text" placeholder="pledge amount " name="pledgeAmount[]"/>
	  <br><br><h2> Description</h2> <br>
	   <textarea rows="4" cols="31" name="description[]" placeholder = "Reward Description">
</textarea>
<br>
<br>
	   <h2> Estimated Delivery Time</h2> <br>
	   <select name="deliverytime[]">
	   <option value="selectMonth">Select Month</option>
    <option value="january">January</option>
	<option value="february">February</option>
	<option value="march">March</option>
	<option value="april">April</option>
	<option value="may">May</option>
	<option value="june">June</option>
	<option value="july">July</option>
	<option value="august">August</option>
	<option value="september">September</option>
	<option value="october">October</option>
	<option value="november">November</option>
	<option value="december">December</option>
	</select>
	<br>
	<br>
		   <select name="deliveryyear[]">
	   <option value="selectYear">Select Year</option>
    <option value="2017">2017</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
	</select>
	<br>
	<br>
		   <h2> Shipping details</h2> <br>
			   <select name="shippingdetails[]">
	   <option value="selectAnOption">Select an option</option>
    <option value="No Shipping Involved">No Shipping Involved</option>
	<option value="Only Shipping to Certain States">Only Shipping to Certain States</option>
	<option value="Shipping to All States">Shipping to All States</option>
	</select>
	   <br>
	   <br>
		<h2> Number available</h2> <br>
	   <input type="text" placeholder="How many of this reward is available " name="reward1No[]"/>
      </span>

	  <!--<p class="message1">Forgot Password? <a href="#">Forgot Password</a></p> -->
	  <button name="signup_button">Save and continue</button>
    </form>

	</div>
	</div>
<!-- page footer-->
<?php require 'footer.php';?>

</body>

</html>
