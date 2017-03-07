<?php
include('session.php');

//validate your sessions
if (isset($_GET['projectid']) && isset($_GET['projecttitle'])) {

    $currentProjectID = urldecode(base64_decode($_GET['projectid']));
    $projectTitle     = $_GET['projecttitle'];
?>
<!DOCTYPE html>
<html>
<head>
<title> Project | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
</head>
<body>

<!--require for the nav var-->
<?php require 'logged-in-nav-bar.php';?>

<div id= "upperbodyproject">
	<div id= "projectheader">
	<h2>   <?php echo $projectTitle; //from the query string ?><h2>
		<?php
			 $query = "SELECT * FROM fullprojectdetails WHERE projectid=$currentProjectID";
			 if ($result=mysqli_query($connection,$query)){
				 if($count = mysqli_num_rows($result)){

					 /*  because of the mysqli_fetch_object function the variables have to be $rowe->title (as an object) */
					 while($rowe = mysqli_fetch_object($result)){
// Continue your staff then

?>
	</div>
		<!-- video and funder div-->
			<div id = "vidFundCont">
			<div id = "video">
			<video width='100%' height='100%' controls> <source src="<?php echo $rowe ->fileToUpload3; ?>" type='video/mp4'>Your browser does not support the video tag.</source></video>
			</div>
			<div id = "funders">
			<p> <strong> 20 </strong> <br> <br><span>funders </span>  </p> <br> <br> <br>
			<p> <strong>  N70,000</strong></p><br>
			<p> <span>funded of N<?php echo $rowe ->fundinggoal ; ?> </span><p><br> <br> <br>
			<p><strong> 15 </strong> <br> <span> <br> days left </span></p><br> <br> <br>
			<button id = "projectPageButton"><a href = "fund.php"> Fund This Project </a></button>
			</div>
			<div id = "clearer"></div>
			</div>
			<!-- location and project condition -->
				<div id = "location">
				<p> Location: <?php echo $rowe ->yourlocation; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Category:<?php echo $rowe ->projectcategory ; ?> </p>
				</div>
				<div id ="projectconditions">
				<p> This project will only be funded if N<?php echo $rowe ->fundinggoal ; ?> is funded before the project deadline</p>
				</div>
				<div id = "clearer"> </div>
				<!--project summary and profile -->
					<div id = "nutshell">
					<p><?php echo $rowe ->projectdetails ; ?> </p> <br> <br>
					<span>Share:</span> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp<a href =# ><img src="images/1484370173_facebook.png" alt="facebook logo" height="42" width="42"> </a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					<a href =# ><img src="images/1484370205_twitter.png" alt="twitter logo" height="42" width="42"></a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					<a href =# ><img src="images/1484370192_instagram.png" alt="instagram logo" height="42" width="42"></a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					</div>
					<div id = "projProfile">
						<div id = "projProfileTop">
						<img src="<?php echo $rowe ->fileToUpload2 ; ?>" width = "50%" height = "100%">
						</div>
							<div id ="projProfileBottom">
							<br>
							<p id = "profileNameStyle"> Name: <?php echo $rowe ->name; ?>  </p> <br>
							<p> Website: <?php echo $rowe ->website ; ?>   </p> <br>
							<p> Email: <?php echo $login_session; ?>  </p>
							</div>
					</div>
					<div id = "clearer"> </div>
					<!-- about and reward title -->
						<div id = "aboutProjH">
						<h2> About This Project </h2>
						</div>
						<div id = "rewardH">
						<h2> Rewards For Supporting This Project</h2>
						</div>
						<div id = "clearer"> </div>
						<!--project pic and dynamic rewards-->
							<div id = "projPic">
							<img src="<?php echo $rowe ->fileToUpload;?>" width = "100%" height = "100%">
							</div>

							<div id = "projPicRight">
								<br>
							<p><h2>Rewards are a way for the project owner to give back something in return for your donation(s).
								 Its helps give that feeling of money well spent. Feel free to choose any reward you want.
								 You can also make a donation without collecting a reward if you choose to. </h2></p>
							</div>
										<div id = "clearer"> </div>


							<!-- project details and empty divs -->

								<div id = "projDet">
<span><?php echo $rowe ->projectdetails2; ?> </span>
								</div>

								<?php

								// code to select content form database and display dynamically in a div
									$query = "SELECT * FROM reward WHERE user_id=$login_id";
								if ($result=mysqli_query($connection,$query)){
									if($count = mysqli_num_rows($result)){
										/*  because of the mysqli_fetch_object function the variables have to be $rowe->title (as an object) */
										while($row = mysqli_fetch_object($result)){
											?>
											<section id = "rewardDet">
												<br>
												<p> <h2><?php echo "N".$row->pledgeAmount. " " . "or more"; ?></h2></p> <br>
												<p><span> <br><?php echo $row ->title; ?></span></p> <br>

												<p> <span><?php echo $row ->description; ?></span></p> <br>
												<p> <span>Estimated Delivery Time: <br> <?php echo $row ->deliverytime . " ". $row ->deliveryyear; ?></span></p> <br>
												<p> <span><?php echo $row ->shippingdetails; ?></p></span> <br>
												<p> <span>Number of Rewards Available: <br><?php echo $row ->reward1No; ?></span></p>

											</section>
											<?php
										}
										/* mysqli_free_result frees p the result in the variable ths allowing for a new one each time */
									}
								}

			?>
								<!--<div id = "bsideProjDet">
								</div> -->
								<div id = "clearer"> </div>

									<div id = "reportProj">
									<button id = "projectPageButton"> Report This Project To Gbedion</button>
									</div>
									<!--<div id = "bsideReportProj"> </div>-->
									<div id = "clearer"> </div>
		<!-- </div> -->


<?php
}
}
}
} else {

    echo "could not find project id";
}
?>

<!-- page footer-->
<?php require 'logged-in-footer.php';?>
</body>

</html>
