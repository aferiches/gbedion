//code that came with the form
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

// my code
function validate() {
	var errors = [];

	           if( document.myForm.username.value == "" ){
            errors.push( "Please fill in your  email!" );

            
         }


	           if( document.myForm.password.value == "" ){
            errors.push( "Please fill in your password!" );
            
            
         }
	          

            
		 
		 if (errors.length > 0){
			 var msg = "ERRORS:\n\n";
			 for (var i = 0; i<errors.length; i++) {
				 msg+=errors[i] + "\n";
			 }
			 alert(msg);
			 return false;
		 }
  
    return true;
}