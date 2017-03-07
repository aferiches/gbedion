<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}

else
{
	
	//$salt = md5('thevoice');
//encrypt
/*function encrypt($string, $key) {
	$string = rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $string, MCRYPT_MODE_ECB)));
} */
//decrypt
/*function decrypt ($string, $key){
	$string = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_encode($string), MCRYPT_MODE_ECB));
}

function hashword ($string, $salt){
	$string = crypt($string, '$1$' . $salt. '$');
} */
	
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require('databaseConnect.php');
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
$password = md5($password);
//$password= hashword($password, $salt);
// Selecting Database
require('databaseSelect.php');
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query($connection, "select * from user where user_password='$password' AND user_emailaddress='$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$username; // Initializing Session
header("location: profile.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>
  
