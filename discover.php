<?php
include('session_new.php');
?>
<!DOCTYPE html>
<html>
<head>
<title> Discover | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
</head>
<body>

<!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>

<div id= "upperbodyproject">
<div id="discoverCentralize">
  <?php

  // code to select content form database and display dynamically in a div
    $query = "SELECT * FROM fullprojectdetails";
  if ($result=mysqli_query($connection,$query)){
    if($count = mysqli_num_rows($result)){
      /*  because of the mysqli_fetch_object function the variables have to be $rowe->title (as an object) */
      while($row = mysqli_fetch_object($result)){
        ?>

        <?php require 'projectDetailsReocurring.php';?>
        <?php
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
