<?php
include('session.php');
//$fullnameErr = $emailaddressErr = $passwordErr = $agreeErr = "";

// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['name'])){
 if (empty($_POST['name'])
 //|| empty($_POST['fileToUpload2'])
 || empty($_POST['biography'])
 || empty($_POST['yourlocation'])
 || empty($_POST['website'])){
 // Setting error message
 $_SESSION['error_page2'] = " Please fill all fields to continue";
 header("location: projectSummaryForm.php"); // Redirecting to first page
 } else {
 // unsanitized values
 //$fileToUpload2 = $_POST['fileToUpload2'];
 $name = $_POST['name'];
 $biography = $_POST['biography'];
 $yourlocation = $_POST['yourlocation'];
 $website = $_POST['website'];
 $name=stripslashes($name);
$biography=stripslashes($biography);
$yourlocation=stripslashes($yourlocation);
$website=stripslashes($website);
$_SESSION['name']=mysqli_real_escape_string($connection,$name);
$_SESSION['biography']=mysqli_real_escape_string($connection,$biography);
$_SESSION['yourlocation']=mysqli_real_escape_string($connection, $yourlocation);
$_SESSION['website']=mysqli_real_escape_string($connection, $website);
 }
} else {
 if (empty($_SESSION['error_page3'])) {
 header("location: startaproject.php");//redirecting to first page
 }
}
?>





<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["signup_button"])) {
	if ($_FILES["fileToUpload2"]["tmp_name"] == "") {
	$_SESSION['imageError2'] = "Please add your profile image to continue";
	header("location: startaproject.php");
	} else {
    $check = getimagesize($_FILES["fileToUpload2"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
//}
//}

// Check if file already exists
if (file_exists($target_file)) {
    $_SESSION['imageError2'] =  "Sorry, file already exists.";
    $uploadOk = 0;
}

 // Check file size
if ($_FILES["fileToUpload2"]["size"] > 500000) {
    $_SESSION['imageError2'] =  "Sorry, your file is too large, 500kb and below.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $_SESSION['imageError2'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
    if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
		 // Write Mysql Query Here to insert this $QueryInsertFile
		$QueryInsertFile="INSERT INTO fullprojectdetails SET fileToUpload2='$TargetPath'";
		$_SESSION['fileToUpload2']= $TargetPath;
        echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
}
?>


<!DOCTYPE html>
<html>
<head>
<title> Project Upload details | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<script type="text/javascript" src="projectUploadDetails.js"></script>
</head>
<body>

<!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>
<div id= "profileupperbody">
<br><br><br>
<div class="form" >
   <h4> Start here </h4> <br>
    <form class="register-form" method="post" name="myForm" action= "rewardForm.php" enctype="multipart/form-data" onsubmit="return(validate());">

<span class="error"> <div id="startprojecterror">
<!---- Initializing Session for errors --->
  <?php
 if (!empty($_SESSION['error_page3'])) {
 echo $_SESSION['error_page3'];
 unset($_SESSION['error_page3']);
 }
  ?>
    <br>
 <?php
  if (!empty($_SESSION['imageError3'])) {
 echo $_SESSION['imageError3'];
 unset($_SESSION['imageError3']);
 }
  ?>
 </div></span>
      <h2> Project Video</h2> <br>      Select video to upload: <strong>Max file size of 2MB </strong>
    <input type="file" name="fileToUpload3" id="fileToUpload3">
	 <h2> Project Description</h2> <br>
	   <textarea rows="4" cols="31" name="projectdetails2" placeholder = "Project Description in full">
</textarea>
      <button name="signup_button">Save and continue</button>

	  <!--<p class="message1">Forgot Password? <a href="#">Forgot Password</a></p> -->
    </form>

	</div>

</div>
<?php require 'logged-in-footer.php';?>
</body>
</html>
