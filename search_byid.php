<?php
include('session_new.php');
?>
<!DOCTYPE html>
<html>
<head>
<title> Search | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<style type="text/css" media="screen">
ul li{
  list-style-type:none;
}
</style>
</head>

<body>
  <!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>

<div id= "upperbodyproject">
<div id="discoverCentralize">

<?php
if(isset($_POST['submit'])){
if(isset($_GET['go'])){
if(preg_match("/^[a-zA-Z]+/", $_POST['title'])){
$title=$_POST['title'];

//connect to the database
require 'databaseConnect.php';

//-select the database to use
require 'databaseSelect.php';

//-query the database table
$sql="SELECT * FROM fullprojectdetails WHERE projecttitle LIKE '%" . $title . "%'";

//-run the query against the mysql query function
$result=mysqli_query($connection,$sql);

//-count results

$numrows=mysqli_num_rows($result);

echo "<p>" .$numrows . " results found for " . stripslashes($title) . "</p>";

//-create while loop and loop through result set
while($row = mysqli_fetch_object($result)){
  ?>
<?php require 'projectDetailsReocurring.php';?>

<?php
}
}
}
}
 ?>
</div>
</div>
<!-- page footer-->
<?php require 'footer.php';?>
</body>
</html>
