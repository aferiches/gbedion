function validate() {
	var errors = [];

	           if( document.myForm.accountName.value == "" ){
            errors.push( "Please fill in your  account name!" );
            
            
         }
	           if( document.myForm.bankName.value == "" ){
            errors.push( "Please fill in bank name!" );
            
            
         }
	           if( document.myForm.accountType.value == "selectType" ){
            errors.push( "Please fill in your account type!" );
            
            
         }
	           if( document.myForm.accountNo.value == "" ){
            errors.push( "Please fill in your account number!" );
            
            
         }
	          
            		else if(isNaN( document.myForm.accountNo.value )){
				errors.push( "Please type in numbers for account number!" );  
				   }
				   else if (document.myForm.accountNo.value.length != 10) {
				errors.push( "Your account number should be 10 digits!" );   
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