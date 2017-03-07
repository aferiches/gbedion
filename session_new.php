<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require('databaseConnect.php');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Selecting Database
require('databaseSelect.php');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User (MYSQL Inner Join used here) took hours to learn
$ses_sql=mysqli_query($connection, "select user.user_emailaddress, user.user_fullname, user.user_id, fullprojectdetails.fileToUpload, fullprojectdetails.projecttitle,
fullprojectdetails.projectcreated, fullprojectdetails.projectcategory, fullprojectdetails.projectcountry, fullprojectdetails.projectdetails,
fullprojectdetails.fundTime, fullprojectdetails.fundinggoal, fullprojectdetails.fileToUpload2, fullprojectdetails.name, fullprojectdetails.biography,
fullprojectdetails.yourlocation, fullprojectdetails.website, fullprojectdetails.fileToUpload3, fullprojectdetails.projectdetails2, fullprojectdetails.accountName, fullprojectdetails.bankName, fullprojectdetails.accountType,
 fullprojectdetails.accountNo,fullprojectdetails.user_id, fullprojectdetails.projectid from user inner join fullprojectdetails on user.user_id=fullprojectdetails.user_id  where user.user_emailaddress='$user_check'");
 //saving variables to be used in every page with session_new included
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['user_emailaddress'];
$login_fullname =$row['user_fullname'];
$login_id =$row['user_id'];
$login_projectTittle = $row['projecttitle'];
$login_projectLocation = $row['yourlocation'];
$login_projectCategory = $row['projectcategory'];
$login_projectFundGoal = $row['fundinggoal'];
$login_projectSummary = $row['projectdetails'];
$login_projectWebsite = $row['website'];
$login_projectVideo = $row['fileToUpload3'];
$login_Pic = $row['fileToUpload2'];
$login_projectID = $row['projectid'];
$login_projectPic = $row['fileToUpload'];
$login_projectFullDet = $row['projectdetails2'];
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}
?>
