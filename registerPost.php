<?php
session_start();

if(!isset($_SESSION['count']))
{
   $_SESSION['count'] = 1;
   $_SESSION['first'] = time();
}
else
{
   // Increase the Count
   $_SESSION['count']++;
   // Reset every so often
   if($_SESSION['first'] < (time() - 500))
   {
      $_SESSION['count'] = 1;
      $_SESSION['first'] = time();
   }
   // Die if they have viewed the page too many times
   if($_SESSION['count'] > 4)
   {
      die("You have submitted to many times");
   }
}
// Checking first page values for empty,If it finds any blank field then redirected to first page.

?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit_button"])) {
	if ($_FILES["fileToUpload"]["tmp_name"] == "") {
	$_SESSION['imageError'] = "Please add your project image to continue";
	header("location: register.php");
	} else {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

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
if($imageFileType != "jpg" ) {
    $_SESSION['imageError'] =  "Sorry, only JPG allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
   // $_SESSION['imageError'] = "Sorry, your file was not uploaded.";
	 header("location: register.php");//redirecting to first page
// if everything is ok, try to upload file
} else {
		$url = "http://AdioConsult/";
	$TargetPath=$url.$target_file;
	/*$TargetPath=time().$target_file; */
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		 // Write Mysql Query Here to insert this $QueryInsertFile
		$QueryInsertFile="INSERT INTO registerdetails SET fileToUpload='$TargetPath'";
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
<title> Adio Consult </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
</head>
<body>

<!--require for the nav var-->
<?php require 'navbar2.php';?>
<div id= "profileupperbody">
<br><br><br>

<?php



if (isset($_POST['firstName'])){
 if (empty($_POST['Surname'])
 || empty($_POST['phoneNumber'])
 || empty($_POST['emailAddress'])){
 // Setting error message
 $_SESSION['error'] = " Please fill all fields to continue";
 header("location: register.php"); // Redirecting to first page
 } else {
 // unsanitized values
 $firstName = $_POST['firstName'];
 $Surname = $_POST['Surname'];
 $phoneNumber = $_POST['phoneNumber'];
 $emailAddress = $_POST['emailAddress'];


 $firstName=stripslashes($firstName);
$Surname=stripslashes($Surname);
$phoneNumber=stripslashes($phoneNumber);
$emailAddress=stripslashes($emailAddress);


// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require('databaseConnect.php');
 // To protect MySQL injection for Security purpose


require('databaseSelect.php'); // Storing values in database.

 // SQL query to fetch information of project details, also note the {} and the sessions they go together for sessions. It caused serious issues before
$sql= "INSERT INTO registerdetails (firstName,Surname,phoneNumber,emailAddress,fileToUpload)
VALUES('$firstName','$Surname','$phoneNumber','$emailAddress','{$_SESSION['fileToUpload']}')";
 $query = mysqli_query($connection, $sql);

 //"insert into fullprojectdetails ('fileToUpload','projecttitle','projectcreated','projectcategory','projectcountry','projectdetails','fundTime','fundinggoal','fileToUpload2','biography','yourlocation','website','fileToUpload3','projectdetails2','title','pledgeAmount','description','deliverytime','deliveryyear','shippingdetails','reward1No','accountName','bankName','accountType','accountNo') values ('$_SESSION['fileToUpload']','$_SESSION['projecttitle']','$_SESSION['projectcreated']','$_SESSION['projectcategory']','$_SESSION['projectcountry']','$_SESSION['projectdetails']','$_SESSION['fundTime']','$_SESSION['fundinggoal']','$_SESSION['fileToUpload2']','$_SESSION['biography']','$_SESSION['yourlocation']','$_SESSION['website']','$_SESSION['fileToUpload3']','$_SESSION['projectdetails2']','$_SESSION['title']','$_SESSION['pledgeAmount']','$_SESSION['description']','$_SESSION['deliverytime']','$_SESSION['deliveryyear']','$_SESSION['shippingdetails']','$_SESSION['reward1No']','$accountName','$bankName','$accountType','$accountNo')");
 if ($query) {
   header("location: profile.php");
 echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
 } else {
	// echo mysql_error();
 echo '<p><span>Form Submission Failed..!!</span></p>';
 }



}
}

else {
 header("location: register.php"); // Redirecting to first page.
 }

?>

</div>
<?php require 'footer.php';?>
</body>
</html>
