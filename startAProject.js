var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function validate() {
	var errors = [];
    var arrInputs = document.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            /*if (sFileName.length > 0) { */
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    errors.push("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                   
              //  }
            }
        }
    }
	           if( document.myForm.projecttitle.value == "" ){
            errors.push( "Please fill in your project title!" );
            
            
         }
	           if( document.myForm.projectcreated.value == "" ){
            errors.push( "Please fill in project created date!" );
            
            
         }
	           if( document.myForm.projectcategory.value == "choose" ){
            errors.push( "Please fill in your project category!" );
            
            
         }
	           if( document.myForm.projectcountry.value == "choose" ){
            errors.push( "Please fill in your project country!" );
            
            
         }
	           if( document.myForm.projectdetails.value == "" ){
            errors.push( "Please fill in your project details!" );
            
            
         }
	           if( document.myForm.fundTime.value == "" ){
            errors.push( "Please fill in funding duration!" );
            
            
         }
	           if( document.myForm.fundinggoal.value == "" ){
            errors.push( "Please fill in funding goal!" );
			   }
            		else if(isNaN( document.myForm.fundinggoal.value )){
				errors.push( "Please type in a number for funding goal!" );  
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