var _validFileExtensions = [".jpg"];
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
	           if( document.myForm.firstName.value == "" ){
            errors.push( "Please fill in your first name!" );


         }
	           if( document.myForm.Surname.value == "" ){
            errors.push( "Please fill in Surname!" );


         }
	           if( document.myForm.emailAddress.value == "" ){
            errors.push( "Please fill in email address!" );


         }

	           if( document.myForm.phoneNumber.value == "" ){
            errors.push( "Please fill in phone number" );
			   }
            		else if(isNaN( document.myForm.phoneNumber.value )){
				errors.push( "Please type in a number for phone number!" );
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
