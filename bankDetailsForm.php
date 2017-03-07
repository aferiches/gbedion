<?php
include('session_new.php');

//  inserting data from dynamic reward form to database
$number = count($_POST["title"]);
$number1 = count($_POST["pledgeAmount"]);
$number2 = count($_POST["description"]);
$number3 = count($_POST["deliverytime"]);
$number4 = count($_POST["deliveryyear"]);
$number5 = count($_POST["shippingdetails"]);
$number6 = count($_POST["reward1No"]);
$number7 = count($login_id);
if($number > 0){
	for ($i=0; $i<$number; $i++){
		if(trim($_POST["title"][$i] !='' )){
			$sql= "INSERT INTO reward (title,pledgeAmount,description,deliverytime,deliveryyear,shippingdetails,reward1No, user_id)
			 VALUES('".mysqli_real_escape_string($connection, $_POST["title"][$i])."','".mysqli_real_escape_string($connection, $_POST["pledgeAmount"][$i])."',
			'".mysqli_real_escape_string($connection, $_POST["description"][$i])."','".mysqli_real_escape_string($connection, $_POST["deliverytime"][$i])."',
			'".mysqli_real_escape_string($connection, $_POST["deliveryyear"][$i])."','".mysqli_real_escape_string($connection, $_POST["shippingdetails"][$i])."',
			'".mysqli_real_escape_string($connection, $_POST["reward1No"][$i])."',$login_id)";
			mysqli_query($connection,$sql);
		}
	}
	echo "Data insert successful";
}
else{
	echo "Enter Reward title";
}
?>


<!DOCTYPE html>
<html>
<head>
<title> Bank Details | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<script type="text/javascript" src="bankDetailsForm.js"></script>
</head>
<body>

<!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>
<div id= "profileupperbody">
<br><br><br>
<div class="form" >
   <h4> Start here </h4> <br>
    <form class="register-form" method="post" name="myForm" action= "finalResponseForm.php" enctype="multipart/form-data" onsubmit="return(validate());">

<span id="last_page_error"> <div id="startprojecterror">
<!---- Initializing Session for errors --->
  <?php
 if (!empty($_SESSION['error_page5'])) {
 echo $_SESSION['error_page5'];
 unset($_SESSION['error_page5']);
 }
  ?>
 </div></span>
<h2> Bank Details: This is necessary so you can receive funds from successful campaigns. </h2>
	<br> <br><br>
	  <h2> Account Name</h2> <br> <input type="text" placeholder="Account Name" name="accountName"/>
      <h2> Bank Name</h2> <br> <input type="text" placeholder="Bank Name " name="bankName"/>
      	   <br>
	   <br>
	   <h2> Account Type</h2> <br>
	   <select name="accountType">
	   <option value="selectType">Select Type</option>
    <option value="current">Current</option>
	<option value="savings">Savings</option>
	</select>
	<br>
	<br>

		<h2> Account Number</h2> <br>
	   <input type="text" placeholder="Account Number " name="accountNo"/>
	   <br>
	<br>

      <button name="signup_button">Submit</button>

    </form>

	</div>

</div>
<?php require 'logged-in-footer.php';?>
</body>
</html>
