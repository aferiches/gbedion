<!-- remove-->
<!DOCTYPE html>
<html>
<head>
<title> Frequently Asked Questions | Gbedion | Crowdfunding for Africans </title>
<link href="https://fonts.googleapis.com/css?family=Roboto" type="text/css" rel="stylesheet" >
<link type="text/css" rel="stylesheet" href="stylesheet.css" />
<script src="jquery.js"></script>



</head>
<body>

<!--require for the nav var-->
<?php require 'navbar.php';?>

<!--<div id= "upperbody"> &nsbp  -->


<!--<button id="hide">Hide</button> -->
<p id ="showWrapper"><button id="show">ADD NEW REWARD</button> (Another reward form will be added below once this button is clicked) </p>

<div id= "profileupperbody">
<!-- </div> -->
<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button type="button" onclick="payWithPaystack()"> Pay </button>
</form>

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_test_86d32aa1nV4l1da7120ce530f0b221c3cb97cbcc',
      email: 'customer@email.com',
      amount: 10000,
      ref: "UNIQUE TRANSACTION REFERENCE HERE",
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "+2348012345678"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
</script>
	</div>
<!-- page footer-->
<?php require 'footer.php';?>

</body>

</html>
