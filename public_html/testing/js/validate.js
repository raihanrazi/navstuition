// JavaScript Document

function recaptchaCallback() {
	document.getElementById("myformsubmitbtn").disabled = false;
	document.getElementById("myformsubmitbtn").style.display="block";
	document.getElementById("myformsubmitbtn_greyed").style.display="none";
};


function captchabox(){
	alert("Please tick the checkbox before submitting form.");
}


function validateForm(){
	/**
	if(grecaptcha.getResponse() == ""){
		alert("Please tick the checkbox before submitting form.");
		return false;		
	}

	else{
		enquiryform.action="submit.php";
		document.enquiryform.submit();
	}
	
	enquiryform = document.enquiryform ;
	var message=document.getElementById('message').value;
	
	if (message==null || message==""){
		alert("Please enter your message.");
		document.getElementById('message').focus();
	}
	else{
		enquiryform.action="submit.php";
		document.enquiryform.submit();
	}
	**/	
	//alert("all good");
	//return true;	
}


function numbersonly(myfield, e, dec){
var key;
var keychar;
if (window.event)
	key = window.event.keyCode;
else if (e)
	key = e.which;
else
	return true;
	
keychar = String.fromCharCode(key);
if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) )
	return true;

else if ((("0123456789").indexOf(keychar) > -1))
	return true;

else if (dec && (keychar == ".")){
	myfield.form.elements[dec].focus();
	return false;
}
else
	return false;
}