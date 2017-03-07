<div id="logoholder">
  <div id="logoleft">
    <a href="profile.php">
	  <img src="images/gbedion-new-logo-cropped.png" />
	  <figcaption>Gbedion</figcaption>
	</a>
  </div>

     <div id="logoright">
	   <ol>

         <li><a href="discover.php">DISCOVER</a></li>
		 <li><form method="post" action="search_byid.php?go" id="searchform">
     <input type="text" name="title">
     <input type="submit" name="submit" value="Search">
     </form>

		 </li>
		 <li><a  href="editprofile.php"> Hi <?php echo $login_session; ?> </a></li>
		 <li><a href="logout.php">LOG OUT</a></li>
       </ol>
	 </div>
 <div id="clearer"></div>
 </div>
