function validate() {
	var errors = [];

	           if( document.myForm.title.value == "" ){
            errors.push( "Please fill in your  title!" );
            
            
         }
	           if( document.myForm.pledgeAmount.value == "" ){
            errors.push( "Please fill in pledge amount!" );
            
            
         }
            		else if(isNaN( document.myForm.pledgeAmount.value )){
				errors.push( "Please type in a number for pledge amount!" );  
				   }
				   
	           if( document.myForm.description.value == "" ){
            errors.push( "Please fill in your project description!" );
            
            
         }
	           if( document.myForm.deliverytime.value == "selectMonth" ){
            errors.push( "Please fill in your delivery time!" );
            
            
         }
	           if( document.myForm.deliveryyear.value == "selectYear" ){
            errors.push( "Please fill in your delivery year!" );
            
            
         }
	           if( document.myForm.shippingdetails.value == "selectAnOption" ){
            errors.push( "Please fill in shipping details!" );
            
            
         }
	           if( document.myForm.reward1No.value == "" ){
            errors.push( "Please fill in number of rewards!" );
			   }
            		else if(isNaN( document.myForm.reward1No.value )){
				errors.push( "Please type in a number for number of rewards!" );  
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