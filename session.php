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
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection, "select user_emailaddress, user_id  from user where user_emailaddress='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
// variables saved for use on any page with session
$login_session =$row['user_emailaddress'];
$login_id =$row['user_id']; 
if(!isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: login.php'); // Redirecting To Home Page
}
?>