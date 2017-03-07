var _validFileExtensions = [".jpg", ".jpeg", ".png", ".gif"];    
function validate() {
	var errors = [];
    var arrInputs = document.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
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
                   
            }
        }
    }
	           if( document.myForm.name.value == "" ){
            errors.push( "Please fill in your name!" );
            
            
         }
	           if( document.myForm.biography.value == "" ){
            errors.push( "Please fill in your biography!" );
            
            
         }
	           if( document.myForm.yourlocation.value == "choose" ){
            errors.push( "Please fill in your location!" );
            
            
         }
	           if( document.myForm.website.value == "" ){
            errors.push( "Please fill in your website name!" );
            
            
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