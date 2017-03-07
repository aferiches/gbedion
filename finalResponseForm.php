<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title> Form Response | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
</head>
<body>

<!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>
<div id= "profileupperbody">
<br><br><br>

<?php
// Checking fifth page values for empty,If it finds any blank field then redirected to first page.
	if (isset($_POST['signup_button'])){
 if (empty($_POST['bankName'])
 || empty($_POST['accountType'])
 || empty($_POST['accountName'])
 || empty($_POST['accountNo'])){
 // Setting error message
 $_SESSION['error_page5'] = " Please fill all fields to continue";
 header("location: bankDetailsForm.php"); // Redirecting to former page
 } else {
$accountName=$_POST['accountName'];
$bankName=$_POST['bankName'];
$accountType=$_POST['accountType'];
$accountNo=$_POST['accountNo'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require('databaseConnect.php');
 // To protect MySQL injection for Security purpose

 //sanitizing variables
$accountName=stripslashes($accountName);
$bankName=stripslashes($bankName);
$accountType=stripslashes($accountType);
$accountNo=stripslashes($accountNo);

$_SESSION['accountName']=mysqli_real_escape_string($connection,$accountName);
$_SESSION['bankName']=mysqli_real_escape_string($connection,$bankName);
$_SESSION['accountType']=mysqli_real_escape_string($connection,$accountType);
$_SESSION['accountNo']=mysqli_real_escape_string($connection,$accountNo);


require('databaseSelect.php'); // Storing values in database.

 // SQL query to fetch information of project details, also note the {} and the sessions they go together for sessions. It caused serious issues before
$sql= "INSERT INTO fullprojectdetails (fileToUpload,projecttitle,projectcreated,projectcategory,projectcountry,projectdetails,fundTime,
fundinggoal,fileToUpload2,name,biography,yourlocation,website,fileToUpload3,projectdetails2,accountName,bankName,accountType,accountNo,user_id)
VALUES('{$_SESSION['fileToUpload']}',
'{$_SESSION['projecttitle']}','{$_SESSION['projectcreated']}','{$_SESSION['projectcategory']}','{$_SESSION['projectcountry']}',
'{$_SESSION['projectdetails']}','{$_SESSION['fundTime']}','{$_SESSION['fundinggoal']}','{$_SESSION['fileToUpload2']}','{$_SESSION['name']}',
'{$_SESSION['biography']}','{$_SESSION['yourlocation']}','{$_SESSION['website']}','{$_SESSION['fileToUpload3']}',
'{$_SESSION['projectdetails2']}','{$_SESSION['accountName']}','{$_SESSION['bankName']}','{$_SESSION['accountType']}','{$_SESSION['accountNo']}',$login_id)";
 $query = mysqli_query($connection, $sql);
 //"insert into fullprojectdetails ('fileToUpload','projecttitle','projectcreated','projectcategory','projectcountry','projectdetails','fundTime','fundinggoal','fileToUpload2','biography','yourlocation','website','fileToUpload3','projectdetails2','title','pledgeAmount','description','deliverytime','deliveryyear','shippingdetails','reward1No','accountName','bankName','accountType','accountNo') values ('$_SESSION['fileToUpload']','$_SESSION['projecttitle']','$_SESSION['projectcreated']','$_SESSION['projectcategory']','$_SESSION['projectcountry']','$_SESSION['projectdetails']','$_SESSION['fundTime']','$_SESSION['fundinggoal']','$_SESSION['fileToUpload2']','$_SESSION['biography']','$_SESSION['yourlocation']','$_SESSION['website']','$_SESSION['fileToUpload3']','$_SESSION['projectdetails2']','$_SESSION['title']','$_SESSION['pledgeAmount']','$_SESSION['description']','$_SESSION['deliverytime']','$_SESSION['deliveryyear']','$_SESSION['shippingdetails']','$_SESSION['reward1No']','$accountName','$bankName','$accountType','$accountNo')");
 if ($query) {
 echo '<p><span id="success">Form Submitted successfully..!!</span></p>';
 } else {
	// echo mysql_error();
 echo '<p><span>Form Submission Failed..!!</span></p>';
 }
 unset($_SESSION['post']);  // Destroying session.
 }

}
else {
 header("location: startaproject.php"); // Redirecting to first page.
 }

?>

</div>
<?php require 'logged-in-footer.php';?>
</body>
</html>
