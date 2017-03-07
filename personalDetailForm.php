<?php
include('session.php');

// Checking first page values for empty,If it finds any blank field then redirected to first page.
if (isset($_POST['projecttitle'])){
 if (empty($_POST['projecttitle'])
 || empty($_POST['projectcreated'])
 || empty($_POST['projectcategory'])
 || empty($_POST['projectcountry'])
 || empty($_POST['projectdetails'])
 //|| empty($_POST['fileToUpload'])
 || empty($_POST['fundinggoal'])){
 // Setting error message
 $_SESSION['error'] = " Please fill all fields to continue";
 header("location: startaproject.php"); // Redirecting to first page
 } else {
 // unsanitized values
 $projecttitle = $_POST['projecttitle'];
 $projectcreated = $_POST['projectcreated'];
 $projectcategory = $_POST['projectcategory'];
 $projectcountry = $_POST['projectcountry'];
 $projecttitle = $_POST['projecttitle'];
 $projectdetails = $_POST['projectdetails'];
 $fundTime=$_POST['fundTime'];
//$duration45=$_POST['duration45'];
//$duration60=$_POST['duration60'];
 $fundinggoal=$_POST['fundinggoal'];

 $projecttitle=stripslashes($projecttitle);
$projectcreated=stripslashes($projectcreated);
$projectcategory=stripslashes($projectcategory);
$projectcountry=stripslashes($projectcountry);
$projectdetails=stripslashes($projectdetails);
$fundTime=stripslashes($fundTime);
//$duration45=stripslashes($duration45);
//$duration60=stripslashes($duration60);
$fundinggoal=stripslashes($fundinggoal);
$_SESSION['projecttitle']=mysqli_real_escape_string($connection,$projecttitle);
$_SESSION['projectcreated']=mysqli_real_escape_string($connection,$projectcreated);
$_SESSION['projectcategory']=mysqli_real_escape_string($connection,$projectcategory);
$_SESSION['projectcountry']=mysqli_real_escape_string($connection,$projectcountry);
$_SESSION['projectdetails']=mysqli_real_escape_string($connection,$projectdetails);
$_SESSION['fundTime']=mysqli_real_escape_string($connection,$fundTime);
//$_SESSION['duration45']=mysqli_real_escape_string($connection,$duration45);
//$_SESSION['duration60']=mysqli_real_escape_string($connection,$duration60);
$_SESSION['fundinggoal']=mysqli_real_escape_string($connection,$fundinggoal);


 /*$projecttitle = $_POST['projecttitle'];
 $projectcreated = $_POST['projectcreated'];
 $projectcategory = $_POST['projectcategory'];
 $projectcountry = $_POST['projectcountry'];
 $fundinggoal = $_POST['projecttitle']; */
 }
} else {
 if (empty($_SESSION['error_page2'])) {
 header("location: startaproject.php");//redirecting to first page
 }
}
?>





<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["signup_button"])) {
	if ($_FILES["fileToUpload"]["tmp_name"] == "") {
	$_SESSION['imageError'] = "Please add your project image to continue";
	header("location: startaproject.php");
	} else {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
    $_SESSION['imageError'] =  "Sorry, file already exists.";
    $uploadOk = 0;
}

 // Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $_SESSION['imageError'] =  "Sorry, your file is too large, 500kb and below.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $_SESSION['imageError'] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		 // Write Mysql Query Here to insert this $QueryInsertFile
		$QueryInsertFile="INSERT INTO fullprojectdetails SET fileToUpload='$TargetPath'";
		$_SESSION['fileToUpload']= $TargetPath;
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
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
<title> Personal Details | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<script type="text/javascript" src="personalDetailForm.js"></script>
</head>
<body>

<!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>
<div id= "profileupperbody">
<br><br><br>
<div class="form" >
   <h4> Start here </h4> <br>
    <form class="register-form" method="post" name="myForm" action= "projectUploadDetails.php" enctype="multipart/form-data" onsubmit="return(validate());">

<span class="error"> <div id="startprojecterror">
<!---- Initializing Session for errors --->
  <?php
 if (!empty($_SESSION['error_page2'])) {
 echo $_SESSION['error_page2'];
 unset($_SESSION['error_page2']);
 }
  ?>
  <br>
 <?php
  if (!empty($_SESSION['imageError2'])) {
 echo $_SESSION['imageError2'];
 unset($_SESSION['imageError2']);
 }
  ?>
 </div></span>
      <h2> Profile Photo</h2> <br>      Select image to upload: <strong>Max file size 500KB </strong>
    <input type="file" name="fileToUpload2" id="fileToUpload2">
	  <h2> Name</h2> <br> <input type="text" placeholder="Name" name="name"/>
      <h2> Biography</h2> <br>
	   <textarea rows="4" cols="31" name="biography" placeholder = "Biography">
     </textarea>
	   <h2> Your Location</h2> <br>
	   <select name="yourlocation">
	   <option value="choose">Choose country</option>
    <option value="nigeria">Nigeria</option>
	</select>
	<br>
	   <br>
		<h2> Website</h2> <br>
	   <input type="url"  placeholder="http://yourwebsite.com/" name="website" pattern ="https?://.+" required/>
      <button name="signup_button">Save and continue</button>

	  <!--<p class="message1">Forgot Password? <a href="#">Forgot Password</a></p> -->
    </form>

	</div>

</div>
<?php require 'logged-in-footer.php';?>
</body>
</html>
