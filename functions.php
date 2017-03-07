<!-- not use full code -->
<? php
require ('session.php');

 function getUsersData($user_id)
 {
	 $array = array();
	 $query = mysqli_query($connection, "select * from user where `user_id`=" .$user_id );
	 while ($row = mysqli_fetch_assoc($query);) {
		 $array['user_id'] = $row['user_id'];
		 $array['user_emailaddress'] = $row['user_emailaddress'];
		 $array['user_fullname'] = $row['user_fullname'];
		 $array['user_agree'] = $row['user_agree'];
	 }
	 return $array;  
 }
 
 function getId($user_emailaddress) {
	 $query = mysqli_query($connection, "select `user_id` from user where `user_emailaddress`='" .$user_emailaddress."'" );
	 while ($row = mysqli_fetch_assoc($query);) {
		 return $row['user_id'];
	 }
 }
?>