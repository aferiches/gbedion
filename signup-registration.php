<?php
session_start(); // Starting Session


 // define variables and set to empty values
  $fullnameErr = $emailaddressErr = $passwordErr = $agreeErr = "";
$fullname = $emailaddress= $password = $agree = "";
//$error=''; // Variable To Store Error Message
if (isset($_POST['signup_button'])) {

	   $valid = true; //Your indicator for your condition, actually it depends on what you need. I am just used to this method.

   if (empty($_POST["fullname"])) {
      $fullnameErr = "Full name is required";
      $valid = false; //false
   }
   else {
      $fullname = test_input($_POST["fullname"]);
	   // check if fullname is well-formed
    if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
      $fullnameErr = "Invalid username format";
    }
   }
   if (empty($_POST["emailaddress"])) {
      $emailaddressErr = "Email is required";
      $valid = false;
   }
   else {
      $emailaddress = test_input($_POST["emailaddress"]);
	  // check if e-mail address is well-formed
    if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
      $emailaddressErr = "Invalid email format";
    }
   }

       if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
	$valid = false;
  } else {
    $password = $_POST["password"];

  }

    if (empty($_POST["agree"])) {
    $agreeErr = "You need to accept terms to proceed";
	$valid = false;
  } else {
    $agree = test_input($_POST["agree"]);
  }

  //if valid then redirect
  if($valid){

// Define $username and $password
$fullname=$_POST['fullname'];
$emailaddress=$_POST['emailaddress'];
$password=$_POST['password'];
$agree=$_POST['agree'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require('databaseConnect.php');
// To protect MySQL injection for Security purpose
$fullname = stripslashes($fullname);
$emailaddress = stripslashes($emailaddress);
$password = stripslashes($password);
$fullname = mysqli_real_escape_string($connection,$fullname);
$emailaddress = mysqli_real_escape_string($connection,$emailaddress);
$password = mysqli_real_escape_string($connection,$password);
$password = md5($password);
//$password= hashword($password, $salt);
// Selecting Database
require('databaseSelect.php');
// SQL query to fetch information of registerd users and finds user match.
$sql="INSERT INTO user(user_emailaddress,user_password,user_fullname,user_agree) VALUES('$emailaddress','$password','$fullname','$agree')";
$query = mysqli_query($connection, $sql);
//$rows = mysqli_num_rows($query);
//if ($rows == 1) {
$_SESSION['login_user']=$emailaddress; // Initializing Session
$_SESSION['login_fullname']=$fullname;
header("location: profile.php"); // Redirecting To Other Page
//} else {
//$error = "Username or Password is invalid";
/*} */
mysqli_close($connection); // Closing Connection
}
/*} */
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
